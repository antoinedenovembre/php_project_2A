<?php

class AdminModel
{
    /**
     * @param string $username
     * @param string $password
     * @return Admin|null
     */
    public function getAdmin(string $username, string $password) : ?Admin
    {
        global $dsn, $user, $pass;

        $hasPass = (new AdminsGateway(new Connection($dsn, $user, $pass)))->selectAdmin($username);
        if ($hasPass === null) {
            return null;
        }

        if (password_verify($password, $hasPass)) {
            $_SESSION['role'] = "admin";
            $_SESSION['username'] = $username;
            return new Admin($username, $password);
        }

        return null;
    }

    /**
     * @return Admin|null
     */
    public function isAdmin() : ?Admin
    {
        if(isset($_SESSION['role'], $_SESSION['username'])) {
            $role = Validation::validString($_SESSION['role']);
            $username = Validation::validString($_SESSION['username']);

            return new Admin($role, $username);
        }

        return null;
    }

	/**
	 * @param string $url
	 * @param string $title
	 * @return int
	 */
	public function addRSS(string $url, string $title) : int
	{
		global $dsn, $user, $pass;

		return (new FeedsGateway(new Connection($dsn, $user, $pass)))->insert($title, $url);
	}

	/**
	 * @param string $url
	 * @param string $title
	 * @return void
	 */
	public function updateRSS(string $url, string $title) : void
	{
		global $dsn, $user, $pass;

		$gw = new FeedsGateway(new Connection($dsn, $user, $pass));
		$gw->update($title, $url);
	}

	/**
	 * @param string $url
	 * @return void
	 */
	public function deleteRSS(string $url) : void
	{
		global $dsn, $user, $pass;

		$gw = new FeedsGateway(new Connection($dsn, $user, $pass));
		$gw->delete($url);
	}

    /**
     * @param int $page
     * @return array
     */
	public function getFeeds(int $page) : array
	{
		global $dsn, $user, $pass;

		$feeds = (new FeedsGateway(new Connection($dsn, $user, $pass)))->selectFeeds($page);
        $tabN = array();
        foreach ($feeds as $row) {
            $tabN[] = new Feed($row['title'], $row['url']);
        }

        return $tabN;
	}

	/**
	 * @return int
	 */
	public function getNbPage() : int
	{
		global $dsn, $user, $pass;

		return (new FeedsGateway(new Connection($dsn, $user, $pass)))->getNbPage();
	}
}