<?php

/**
 * User
 *
 * A user of the system
 */
class User
{
    public $firstName;

    public $surname;

    public $mailer;


    /**
     * User constructor.
     * @param string $firstName
     * @param string $surname
     * @param Mailer $mailer
     */
    public function __construct(string $firstName = null, string $surname = null, Mailer $mailer = null)
    {
        $this->firstName = $firstName;
        $this->surname = $surname;
        $this->mailer = $mailer;
    }


    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }


    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }


    /**
     * @return string
     */
    public function getSurname(): string
    {
        return $this->surname;
    }


    /**
     * @param string $surname
     */
    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }


    /**
     * Get the user's full name from their first name and surname
     *
     * @return string The user's full name
     */
    public function getFullName(): string
    {
        return trim("$this->firstName $this->surname");
    }

    /**
     * @param Mailer $mailer
     */
    public function setMailer(Mailer $mailer): void
    {
        $this->mailer = $mailer;
    }


    /**
     * @param string $message
     * @return bool
     */
    public function notify(string $message): bool
    {

        return $this->mailer->sendMessage($message);
    }
}