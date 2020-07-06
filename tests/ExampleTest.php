<?php

use PHPUnit\Framework\TestCase;

/**
 * Created by PhpStorm.
 * User: tadeo
 * Date: 7/6/20
 * Time: 9:52 AM
 */

class ExampleTest extends TestCase
{
    public function testAddingTwoPlusTwoResultsInFour() {

        $this->assertEquals(4, (2+2));

    }

}