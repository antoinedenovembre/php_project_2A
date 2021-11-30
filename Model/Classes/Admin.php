<?php

class Admin
{
    private string $mail;
    private string $username;
    private string $password;

    /**
     * @param string $mail
     * @param string $username
     * @param string $password
     */
    public function __construct(string $mail, string $username, string $password)
    {
        $this->mail = $mail;
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getMail(): string
    {
        return $this->mail;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }
}