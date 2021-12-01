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
	 * @param string $pseudo
	 * @param string $password
	 */
    public function update(string $pseudo, string $password): void
    {
        $query = 'UPDATE admins
                    SET password = :password
                    WHERE username = :pseudo';

        $params = array(
            ':password' => array($password, PDO::PARAM_STR),
            ':pseudo' => array($pseudo, PDO::PARAM_STR)
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
            $tabN[] = new Admin($row['username'], $row['password']);
        }

        return $tabN;
    }

	/**
	 * @param string $username
	 * @return Admin
	 */
	public function getByUsername(string $username) : Admin
	{
		$query =    'SELECT * FROM admins
					WHERE username = :username';

		$params = array(
			':username' => array($username, PDO::PARAM_STR)
		);

		$this->con->executeQuery($query, $params);

		$res = $this->con->getResults();
		$tabN = array();
		foreach ($res as $row) {
			$tabN[] = new Admin($row['username'], $row['password']);
		}

		return $tabN[0];
	}
}