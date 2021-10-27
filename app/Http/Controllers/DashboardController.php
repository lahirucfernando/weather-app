<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Repository\Contracts\TemperatureRepositoryInterface;

class DashboardController extends Controller
{
    /**
     * @var TemperatureRepositoryInterface $temperatureRepository
    */
    private $temperatureRepository;

     /**
     * @param TemperatureRepositoryInterface $temperatureRepository
     */
    public function __construct(TemperatureRepositoryInterface $temperatureRepository){
        $this->temperatureRepository    = $temperatureRepository;
    }


    public function index()
    {
       $cities = config('weather.cities');

       foreach($cities as $city){
            $history[] = [
                'city_name' => $city['name'],
                'list' => $this->temperatureRepository->getTemperaturesByCityId($city['id'])
            ];
       }

       return Inertia::render('Dashboard', [ 'history' => $history]);

    }


}
