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
     * @param string $password
     */
    public function update(string $username, string $password): void
    {
        $query = 'UPDATE admins
                    SET username = :username, password = :password
                    WHERE username = :username';

        $params = array(
            ':username' => array($username, PDO::PARAM_INT),
            ':password' => array($password, PDO::PARAM_STR)
        );

        $this->con->executeQuery($query, $params);
    }

    public function selectAll() : array
    {
        $query = 'SELECT * FROM admins';
        $this->con->executeQuery($query);

        $res = $this->con->getResults();
        $tabN = array();
        foreach ($res as $row) {
            $tabN[] = new Admin($row['email'], $row['username'], $row['password']);
        }

        return $tabN;
    }
}