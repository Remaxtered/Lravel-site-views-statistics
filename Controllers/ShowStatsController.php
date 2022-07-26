<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\City;
use App\Models\Country;
use Illuminate\Support\Facades\DB;

class ShowStatsController extends Controller
{
    public function stats () {
        $data = [];
        $keys = ["countries", "areas", "cities"];
        $timeKeys = ['day', 'week', 'month', 'year', 'all_time'];

        foreach($keys as $key) {
            $innerArray = [];
            $firstdLvl = DB::table($key)->get();
            foreach ($firstdLvl as $firstdLvlItem) {
                if($key == 'countries'){
                    $countryArr = [];
                    $timeArr = [];
                    foreach($timeKeys as $timeKey) {
                        if ($timeKey == 'day') {
                            $secondLvl = DB::table('statistics')
                                ->where('country', '=', $firstdLvlItem->country)
                                ->where($timeKey, '=', date('d'))
                                ->count();
                            $timeArr[$timeKey] = $secondLvl;
                        } elseif ($timeKey == 'week') {
                            $secondLvl = DB::table('statistics')
                                ->where('country', '=', $firstdLvlItem->country)
                                ->where('day', '>=', date('d')-7)
                                ->count();
                            $timeArr[$timeKey] = $secondLvl;
                        } elseif ($timeKey == 'month') {
                            $secondLvl = DB::table('statistics')
                                ->where('country', '=', $firstdLvlItem->country)
                                ->where($timeKey, '=', date('m'))
                                ->count();
                            $timeArr[$timeKey] = $secondLvl;
                        } elseif ($timeKey == 'year') {
                            $secondLvl = DB::table('statistics')
                                ->where('country', '=', $firstdLvlItem->country)
                                ->where($timeKey, '=', date('y'))
                                ->count();
                            $timeArr[$timeKey] = $secondLvl;
                        } elseif ($timeKey == 'all_time') {
                            $secondLvl = DB::table('statistics')
                                ->where('country', '=', $firstdLvlItem->country)
                                ->count();
                            $timeArr[$timeKey] = $secondLvl;
                        }
                    }
                    $countryArr[$firstdLvlItem->country] = $timeArr;
                    $innerArray[$key] = $countryArr;

                } elseif ($key == 'areas') {
                    $areaArr = [];
                    $timeArr = [];
                    foreach($timeKeys as $timeKey) {
                        if ($timeKey == 'day') {
                            $secondLvl = DB::table('statistics')
                                ->where('area', '=', $firstdLvlItem->area)
                                ->where($timeKey, '=', date('d'))
                                ->count();
                            $timeArr[$timeKey] = $secondLvl;
                        } elseif ($timeKey == 'week') {
                            $secondLvl = DB::table('statistics')
                                ->where('area', '=', $firstdLvlItem->area)
                                ->where('day', '>=', date('d') - 7)
                                ->count();
                            $timeArr[$timeKey] = $secondLvl;
                        } elseif ($timeKey == 'month') {
                            $secondLvl = DB::table('statistics')
                                ->where('area', '=', $firstdLvlItem->area)
                                ->where($timeKey, '=', date('m'))
                                ->count();
                            $timeArr[$timeKey] = $secondLvl;
                        } elseif ($timeKey == 'year') {
                            $secondLvl = DB::table('statistics')
                                ->where('area', '=', $firstdLvlItem->area)
                                ->where($timeKey, '=', date('y'))
                                ->count();
                            $timeArr[$timeKey] = $secondLvl;
                        } elseif ($timeKey == 'all_time') {
                            $secondLvl = DB::table('statistics')
                                ->where('area', '=', $firstdLvlItem->area)
                                ->count();
                            $timeArr[$timeKey] = $secondLvl;
                        }
                        $areaArr[$firstdLvlItem->area] = $timeArr;
                        $innerArray[$key] = $areaArr;
                    }

                } elseif ($key == 'cities') {
                    $cityArr = [];
                    $timeArr = [];
                    foreach($timeKeys as $timeKey) {
                        if ($timeKey == 'day') {
                            $secondLvl = DB::table('statistics')
                                ->where('city', '=', $firstdLvlItem->city)
                                ->where($timeKey, '=', date('d'))
                                ->count();
                            $timeArr[$timeKey] = $secondLvl;
                        } elseif ($timeKey == 'week') {
                            $secondLvl = DB::table('statistics')
                                ->where('city', '=', $firstdLvlItem->city)
                                ->where('day', '>=', date('d')-7)
                                ->count();
                            $timeArr[$timeKey] = $secondLvl;
                        } elseif ($timeKey == 'month') {
                            $secondLvl = DB::table('statistics')
                                ->where('city', '=', $firstdLvlItem->city)
                                ->where($timeKey, '=', date('m'))
                                ->count();
                            $timeArr[$timeKey] = $secondLvl;
                        } elseif ($timeKey == 'year') {
                            $secondLvl = DB::table('statistics')
                                ->where('city', '=', $firstdLvlItem->city)
                                ->where($timeKey, '=', date('y'))
                                ->count();
                            $timeArr[$timeKey] = $secondLvl;
                        } elseif ($timeKey == 'all_time') {
                            $secondLvl = DB::table('statistics')
                                ->where('city', '=', $firstdLvlItem->city)
                                ->count();
                            $timeArr[$timeKey] = $secondLvl;
                        }
                    }
                    $cityArr[$firstdLvlItem->city] = $timeArr;
                    $innerArray[$key] = $cityArr;
                }
            }
            array_push($data, $innerArray);
        }

        $countries = Country::all();
        $areas = Area::all();
        $cities = City::all();

        return view('statistics', [
            'data' => $data,
            'countries' => $countries,
            'areas' => $areas,
            'cities' => $cities,
        ]);
    }
}
