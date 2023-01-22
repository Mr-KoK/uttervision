<?php

namespace App;

use App\Enum\FormStatus;
use App\Mail\VerifyUser;
use App\Notifications\WelcomeToUser;
use App\Utility\CodingUtility;
use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Mockery\Exception;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'type', 'active', 'country', 'birthday', 'bio',
        'family' , 'slug' , 'reset_pass', 'verify_code', 'is_active','phone',
        'partner_id', 'username' , 'pass_id' ,'dare_to_active', 'expire_passport',
        'premium_until'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function user()
    {
        return $this->hasMany('App\User', 'partner_id');
    }
     public function cart()
    {
        return $this->hasOne('App\Cart');
    }

    public function forms()
    {
        return $this->hasMany('App\Form', 'user_id','id');
    }

    public function families(){
        return $this->hasMany('App\Family', 'user_id','id');
    }

    public function sendVerifyEmail(){
        try {
            $this->verify_code = str_random(10);
            $this->save();
            Mail::to($this)->queue(new VerifyUser($this->email,$this->name,$this->id,$this->verify_code,$this->getVerifyLink()));
        }catch (Exception $exception){
            throw new Exception($exception);
        }
    }

    public function getVerifyLink(){
        return url('/click/'.CodingUtility::encode($this->id).'?ticket='.$this->verify_code);
    }

    public function getAvatar(){
        return $this->img ?: asset('assets/images/admin/icons/avatar-placeholder.png');
    }

    public function isVerify(){
        return $this->is_active == 1;
    }

    public function userActivate(){
        $this->is_active= 1;
        $this->date_to_active = Carbon::now();
        Notification::send($this, new WelcomeToUser($this));
        $this->save();
    }


    public function getCountVisaAccepted(){
        $completed = 0;
        foreach ($this->forms() as $form){
            if(  $form->status == FormStatus::accept ){
                $completed++;
            }
        }
        return $completed;

    }

}