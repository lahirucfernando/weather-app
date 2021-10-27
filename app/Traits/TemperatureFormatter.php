<?php

namespace App\Traits;

trait TemperatureFormatter {

    public static function convertKelvinToCelsius($value)
    {
      return number_format(($value - 273.15));
    }


    public static function convertKelvinToFahrenheit($value)
    {
      return number_format((($value - 273.15) * 9/5 + 32 ));
    }

}
