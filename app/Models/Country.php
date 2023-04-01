<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = "country";

    protected $fillable = [
        'name', 'img', 'title', 'short_name', 'abstract','show_on_map','points_map','video','cover_img','slug'
    ];

    public static function getShortCountries(): array
    {
        $countries = [];
        if (File::exists(public_path('xmls/countries.xml'))) {
            $xmldata = simplexml_load_file(public_path('xmls/countries.xml'));
            foreach ($xmldata as $country){
                $countries[] = $country;
            }
        }
        return $countries;
    }


    public function getUrl(): string
    {
        return '/country-visa/' . $this->slug;
    }

    public function editUrl(): string
    {
        return '/admin/country/' . $this->id . '/edit';
    }

    public function service(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Service');
    }

    public function forms(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany('App\Form','country_id','id');
    }

    public function group(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\SGroup');
    }

    public function admin(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Admin');
    }

    public function partners() {
        return $this->belongsToMany('App\Partner', 'partners_country','country_id','parent_id');
    }

}