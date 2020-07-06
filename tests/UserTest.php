<?php

use PHPUnit\Framework\TestCase;

/**
 * Created by PhpStorm.
 * User: tadeo
 * Date: 7/6/20
 * Time: 10:04 AM
 */

class UserTest extends TestCase
{
    public function testReturnsFullName() {

        $user = new User;

        $user->first_name = 'Alice';
        $user->surname = 'Wonderlands';

        $this->assertEquals('Alice Wonderlands', $user->getFullName());
    }

    public function testFullNameIsEmptyByDefault() {

        $user = new User;

        $this->assertEquals('', $user->getFullName());
    }
}