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

    public function selectAdmin(string $username, string $password) : ?Admin
    {
        $query = "SELECT * FROM admins WHERE username = :username AND password = :password";
        $this->con->executeQuery($query, [
            ':username' => array($username, PDO::PARAM_STR),
            ':password' => array($password, PDO::PARAM_STR)
        ]);

        $result = $this->con->getResults();
        if (empty($result)) {
            return null;
        }
        return new Admin('admin', $result[0]['username']);
    }
}