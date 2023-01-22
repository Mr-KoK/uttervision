<?php
namespace App\Services;

use App\Country;
use App\Service;
use Exception;
class CountryService extends Service{
    /**
     * @throws Exception
     */
    public static function updateCountryShowOnMap(int $country_id, int $status): bool
    {
        try {
            $country = Country::find($country_id);
            $country->show_on_map = $status;
            $country->save();
            return true;
        }catch (Exception $exception){
            throw new Exception($exception);
        }
    }
}
