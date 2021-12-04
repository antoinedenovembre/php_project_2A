<?php

class AdminModel
{
    public function __construct()
    {
    }

    /**
     * @return array
     */
    public function connectionAdmin(string $username, string $password) : bool
    {
        global $dsn, $user, $pass;

        $gw = new AdminsGateway(new Connection($dsn, $user, $pass));
		$a = new Admin($username, $password);

        return $a == $gw->getByUsername($username);
    }

	public function isActor() : string
	{
		return "Admin";
	}
}