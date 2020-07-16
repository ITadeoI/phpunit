<?php

use PHPUnit\Framework\TestCase;

/**
 * Created by PhpStorm.
 * User: tadeo
 * Date: 7/16/20
 * Time: 9:15 AM
 */

class MailerTest extends TestCase
{
    protected $mailer;

    public function setUp(): void
    {
        $this->mailer = new Mailer;
    }

    public function testSendMessageWithMock() {

        $mock = $this->createMock(Mailer::class);

        $mock->expects($this->once())
            ->method('sendMessage')
            ->with('Hellow')
            ->willReturn(true);

        $this->assertTrue($mock->sendMessage('Hellow'));
    }

    public function testSendMessageWithoutMock()
    {
        $this->mailer->setEmail('bruce@wayne.com');

        $this->assertTrue($this->mailer->sendMessage(null));
    }
}