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
    protected $user;

    public function setUp(): void
    {
        $this->user = New User;
    }

    public function testReturnsFullName() {

        $this->user->setFirstName('Alice');
        $this->user->setSurname('Wonderlands');

        $this->assertEquals('Alice Wonderlands', $this->user->getFullName());
    }

    public function testFullNameIsEmptyByDefault() {

        $this->assertEquals('', $this->user->getFullName());
    }

    public function testNotificationIsSent() {

        $mockMailer = $this->createMock(Mailer::class);

        $mockMailer->expects($this->exactly(1))
            ->method('sendMessage')
            ->with($this->equalTo('WhatUp'))
            ->willReturn(true);

        $this->user->setMailer($mockMailer);

        $this->assertTrue($this->user->notify('WhatUp'));

    }
}