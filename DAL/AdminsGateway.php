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
     * @param string $mail
     * @param string $password
     */
    public function update(string $mail, string $password): void
    {
        $query = 'UPDATE admins
                    SET password = :password
                    WHERE email = :mail';

        $params = array(
            ':password' => array($password, PDO::PARAM_STR),
            ':mail' => array($mail, PDO::PARAM_STR)
        );

        $this->con->executeQuery($query, $params);
    }

    /**
     * @return array
     */
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