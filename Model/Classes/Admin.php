<?php

class Admin
{
    private string $role;
    private string $username;

    /**
     * @param string $role
     * @param string $username
     */
    public function __construct(string $role, string $username)
    {
        $this->role = $role;
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @param string $role
     */
    public function setRole(string $role): void
    {
        $this->role = $role;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }
}

