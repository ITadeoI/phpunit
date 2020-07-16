<?php

use PHPUnit\Framework\TestCase;

/**
 * Created by PhpStorm.
 * User: tadeo
 * Date: 7/16/20
 * Time: 6:02 PM
 */

class WeatherMonitorTest extends TestCase
{
    public function tearDown(): void
    {
        Mockery::close();
    }

    public function testCorrectAverageIsReturned()
    {
        $service = $this->createMock(TemperatureService::class);

        $map = [
            ['12:00', 20],
            ['14:00', 26]
        ];

        $service->expects($this->exactly(2))
            ->method('getTemperature')
            ->will($this->returnValueMap($map));

        $weather = new WeatherMonitor($service);

        $this->assertEquals(23,$weather->getAverageTemparture('12:00', '14:00'));
    }

    public function testCorrectAverageIsReturnedWithMockey()
    {
        $service = Mockery::mock('TemperatureService');

        $service->shouldReceive('getTemperature')->once()->with('12:00')->andReturn(20);

        $service->shouldReceive('getTemperature')->once()->with('14:00')->andReturn(26);

        $weather = new WeatherMonitor($service);

        $this->assertEquals(23,$weather->getAverageTemparture('12:00', '14:00'));

    }
}