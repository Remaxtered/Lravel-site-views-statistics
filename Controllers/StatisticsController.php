<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\City;
use App\Models\Country;
use App\Models\Statistics;
use Dadata\DadataClient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{

    public static function siteViewed () {

        if (!session()->has('viewed')) {
            function getIp() {
                $keys = [
                    'HTTP_CLIENT_IP',
                    'HTTP_X_FORWARDED_FOR',
                    'REMOTE_ADDR'
                ];

                foreach ($keys as $key) {
                    if(!empty($SERVER[$key])) {
                        $ip =  trim(explode(',', $SERVER[$key]));
                        if (filter_var($ip, FILTER_VALIDATE_IP)) {
                            return $ip;
                        }
                    }
                }
            }

            $token = "someDadataClientToken";
            $secret = 'someDadataClientSecret';
            $dadata = new DadataClient($token, $secret);
            $ip = getIp();
            $res = $dadata->iplocate($ip);


            $new_visit = new Statistics();
            $new_visit->country = $res['data']['country'];
            $new_visit->area = $res['data']['region_with_type'];
            $new_visit->city = $res['data']['city_with_type'];
            $new_visit->year = date('y');
            $new_visit->month = date('m');
            $new_visit->day = date('d');
            $new_visit->save();

            if (!Country::where('country', '=', $res['data']['country'])->exists()) {
                $new_country = new Country();
                $new_country->country = $res['data']['country'];
                $new_country->save();
            }

            if (!Area::where('area', '=', $res['data']['region_with_type'])->exists()) {

                $new_area = new Area();
                $new_area->country_id = $res['data']['country'];
                $new_area->area = $res['data']['region_with_type'];
                $new_area->save();
            }

            if (!City::where('city', '=', $res['data']['city_with_type'])->exists()) {

                $new_city = new City();
                $new_city->area_id = $res['data']['region_with_type'];
                $new_city->city = $res['data']['city_with_type'];
                $new_city->save();
            }

            session(['viewed' => true]);

        } else {
            return;
        }
    }

}
