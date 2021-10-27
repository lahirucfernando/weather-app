<?php

namespace App\Repository\Contracts;

interface TemperatureRepositoryInterface
{
    /**
     * @return void
     */
    public function createUserTemperature();

    /**
     * @param string $cityId
     * @return Collection
     */
    public function getTemperaturesByCityId($cityId);

}
