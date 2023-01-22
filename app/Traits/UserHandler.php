<?php

namespace App\Traits;

use App\Family;
use App\Services\ResponseService;
use Exception;
use Illuminate\Support\Facades\Auth;

trait UserHandler
{

    public function updateUserInformation($name, $family, $country, $passport_id, $birthday, $bio, $phone_no)
    {
        $user = Auth::user();
        $user->update([
            'name' => $name,
            'family' => $family,
            'country' => $country,
            'pass_id' => $passport_id,
            'birthday' => $birthday,
            'bio' => $bio,
            'phone' => $phone_no
        ]);
    }

    public function clearUserAvatar()
    {
        $user = Auth::user();
        if ($user->img) {
            unlink(substr($user->img, 1));
        }
        $user->img = null;
        $user->save();
    }

    public function emailVerify403()
    {
        return ResponseService::jsonRes(false, false, 'Email Not Verify', '', 403);
    }

    public function checkUserPrivacy()
    {
        $user = Auth::user();
        $user->check_privacy = 1;
        $user->save();
    }

    public function setUserAvatar($path)
    {
        $user = Auth::user();
        $user->img = $path;
        $user->save();
    }

    public function deleteFamilyHandler($family_id){
        Family::where('id',$family_id)->delete();
    }
}