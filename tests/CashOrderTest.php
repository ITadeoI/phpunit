<?php

use PHPUnit\Framework\TestCase;

/**
 * Created by PhpStorm.
 * User: tadeo
 * Date: 7/16/20
 * Time: 6:38 PM
 */

class CashOrderTest extends TestCase
{
    public function tearDown(): void
    {
        Mockery::close();
    }

    public function testOrderIsProcessedUsingAMock()
    {
        $cashOrder = new CashOrder(3,1.99);

        $this->assertEquals(5.97, $cashOrder->amount);

        $gateway = Mockery::mock('PaymentGateway');

        $gateway->shouldReceive('charge')
            ->once()
            ->with(5.97);

        $cashOrder->process($gateway);
    }

    public function testOrderIsProcessedUsingSpy()
    {
        $cashOrder = new CashOrder(3,1.99);

        $this->assertEquals(5.97, $cashOrder->amount);

        $gateway = Mockery::spy('PaymentGateway');

        $gateway->process($gateway);

        $gateway->shouldHaveReceived('charge')
            ->once()
            ->with(5.97);
    }

}