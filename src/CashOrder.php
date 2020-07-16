<?php
/**
 * Created by PhpStorm.
 * User: tadeo
 * Date: 7/16/20
 * Time: 6:34 PM
 */

class CashOrder
{
    public $quantity;

    public $unitPrice;

    public $amount;

    public function __construct(int $quantity, float $unitPrice)
    {
        $this->quantity = $quantity;
        $this->unitPrice = $unitPrice;

        $this->amount = $quantity * $unitPrice;
    }

    public function process(PaymentGateway $gateway)
    {
        $gateway->charge($this->amount);
    }
}