<?php

namespace App\Console\Command;

use App\Services\WeatherService;
use Illuminate\Console\Command;

class StoreWeatherDataCommand extends Command
{
    protected $signature = 'weather:refresh';

    protected $description = 'Refresh weather data';

    public function handle(): int
    {
        $this->info('Refreshing weather data');
        $result = resolve(WeatherService::class)->storeCityWeather();
        $this->info('Weather data refresh done');

        return $result ? self::SUCCESS : self::FAILURE;
    }

}
