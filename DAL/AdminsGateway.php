<?php

class AdminsGateway
{
    private Connection $con;

    /**
     * @param $con
     */
    public function __construct($con)
    {
        $this->con = $con;
    }

    /**
     * @param string $username
     * @param string $hashPass
     * @return int
     */
    public function insertAdmin(string $username, string $hashPass) : int
    {
        $query = "INSERT INTO admins VALUES (:username, :password)";
        $this->con->executeQuery($query, [
            ':username' => array($username, PDO::PARAM_STR),
            ':password' => array($hashPass, PDO::PARAM_STR)
        ]);

        return $this->con->lastInsertId();
    }

    /**
     * @param string $username
     * @return string|null
     */
    public function selectAdmin(string $username) : ?string
    {
        $query = "SELECT password FROM admins WHERE username = :username";
        $this->con->executeQuery($query, [
            ':username' => array($username, PDO::PARAM_STR)
        ]);

        $result = $this->con->getResults();
        if (empty($result)) {
            return null;
        }

        return $result[0]['password'];
    }
}