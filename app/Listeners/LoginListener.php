<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Repository\Contracts\TemperatureRepositoryInterface;

class LoginListener
{

    /**
     * @var TemperatureRepositoryInterface $temperatureRepository
    */
    private $temperatureRepository;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(TemperatureRepositoryInterface $temperatureRepository){
        $this->temperatureRepository    = $temperatureRepository;
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $this->temperatureRepository->createUserTemperature();
    }
}
