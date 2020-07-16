<?php
/**
 * Created by PhpStorm.
 * User: tadeo
 * Date: 7/16/20
 * Time: 9:11 AM
 */

class Mailer
{
    public $email;

    public $message;

    /**
     * Mailer constructor.
     * @param string|null $email
     * @param string|null $message
     */
    public function __construct(string $email = 'alice@wonderland', string $message = null)
    {
        $this->email = $email;
        $this->message = $message;
    }


    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param string|null $message
     */
    public function setMessage(?string $message): void
    {
        $this->message = $message;
    }


    /**
     * @param string|null $message
     * @return bool
     */
    public function sendMessage(?string $message): bool
    {
        // Use mail() or PHPMailer for example
        sleep(3);

        if (empty($message)) {

            echo "send $this->message to $this->email";

            return true;
        }

        echo "send $message to $this->email";

        return true;
    }
}