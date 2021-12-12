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

    public function insertAdmin(string $username, string $hashPass) : int
    {
        $query = "INSERT INTO admins VALUES (:username, :password)";
        $this->con->executeQuery($query, [
            ':username' => array($username, PDO::PARAM_STR),
            ':password' => array($hashPass, PDO::PARAM_STR)
        ]);

        return $this->con->lastInsertId();
    }


    public function selectAdmin(string $username, string $password) : ?Admin
    {
        $query = "SELECT password FROM admins WHERE username = :username";
        $this->con->executeQuery($query, [
            ':username' => array($username, PDO::PARAM_STR)
        ]);

        $result = $this->con->getResults()[0];
        if (empty($result) || !password_verify($password, $result['password'])) {
            return null;
        }
        return new Admin('admin', $username);
    }
}