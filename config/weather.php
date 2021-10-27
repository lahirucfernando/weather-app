<?php


return [
    'cities' => [
        [
           'id'  => 1,
           'name' => 'Colombo',
           'latitude' => 6.927079,
           'longitude' => 79.861244,
        ],
        [
           'id'  => 2,
           'name' => 'Melbourne',
           'latitude' => -37.840935,
           'longitude' => 144.946457,
        ]
    ],
    'weather_app_key' => env('WHETHER_API_KEY', ''),
    'weather_app_url' => env('WHETHER_API_URL', ''),
];
