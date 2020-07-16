<?php
/**
 * Created by PhpStorm.
 * User: tadeo
 * Date: 7/16/20
 * Time: 5:55 PM
 */

class WeatherMonitor
{
    protected $service;

    public function __construct(TemperatureService $service)
    {
        $this->service = $service;
    }

    public function getAverageTemparture(string $start, string $end)
    {
        $startTemp = $this->service->getTemperature($start);

        $endTemp = $this->service->getTemperature($end);

        return ($startTemp + $endTemp) / 2;
    }


}