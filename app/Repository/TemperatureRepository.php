<?php

namespace App\Repository;

use App\Models\UserTemperature;
use App\Traits\TemperatureFormatter;
use Illuminate\Support\Facades\Http;
use App\Repository\Contracts\TemperatureRepositoryInterface;


class TemperatureRepository implements TemperatureRepositoryInterface
{

    /**
     * {@inheritDoc}
     */
    public function createUserTemperature()
    {
        try {
            $user = \Auth::user();
            $cities = config('weather.cities');

            foreach($cities as $city){
                $temperature = $this->getTemperatureData($city);
                if($temperature){
                    $payload = [
                        'user_id' => $user->id,
                        'city_id' => $city['id'],
                        'celsius' => TemperatureFormatter::convertKelvinToCelsius($temperature),
                        'fahrenheit' => TemperatureFormatter::convertKelvinToFahrenheit($temperature),
                    ];

                    UserTemperature::create($payload);
                }
            }

        } catch (\Throwable $th) {
            logger()->error($th);
        }
    }


    /**
     * @param array $cityData
     */
    private function getTemperatureData($cityData)
    {
        try {
            $urlParam = 'lat='.$cityData['latitude'].'&lon='.$cityData['longitude'].'&appid='.config('weather.weather_app_key');

            $response = Http::get(config('weather.weather_app_url').$urlParam);
            $jsonData = $response->json();
            return $jsonData['current']['temp'];

            return $this->response->error($response->response->message, 500);
        } catch (\Throwable $th) {
            logger()->error($th);
            return false;
        }

    }


    /**
     * {@inheritDoc}
    */
    public function getTemperaturesByCityId($cityId)
    {
        $user = \Auth::user();
        $orderBy = isset(request()->orderBy) ? request()->orderBy : null;
        $list = UserTemperature::select('city_id','celsius','fahrenheit','created_at')
                         ->where('user_id', $user->id)
                         ->where('city_id', $cityId);

        if($orderBy === 'hottest'){
            $list = $list->orderBy('celsius', 'DESC');
        }else{
            $list = $list->orderBy('created_at');
        }

        return $list->get();

    }
}
