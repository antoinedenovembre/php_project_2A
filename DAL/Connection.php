<?php

class Connection extends PDO
{

	private PDOStatement $stmt;

    /**
     * @param string $dsn
     * @param string $username
     * @param string $password
     */
	public function __construct(string $dsn, string $username, string $password)
    {
		parent::__construct($dsn,$username,$password);
		$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

    /**
     * @param string $query
     * @param array $parameters
     * @return bool
     */
	public function executeQuery(string $query, array $parameters = []) : bool
    {
		$this->stmt = $this->prepare($query);
		foreach ($parameters as $name => $value) {
			$this->stmt->bindValue($name, $value[0], $value[1]);
		}

		return $this->stmt->execute();
	}

    /**
     * @return array
     */
	public function getResults() : array
    {
		return $this->stmt->fetchall();
	}
}
