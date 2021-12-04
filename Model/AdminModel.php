<?php

class AdminModel
{
    public function __construct()
    {
    }

	/**
	 * @param string $username
	 * @param string $password
	 * @return bool
	 */
    public function connectionAdmin(string $username, string $password) : bool
    {
        global $dsn, $user, $pass;

        $gw = new AdminsGateway(new Connection($dsn, $user, $pass));
		$a = new Admin($username, $password);

        return $a === $gw->getByUsername($username);
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
	 * @return array
	 */
	public function getFeeds() : array
	{
		global $dsn, $user, $pass;

		return (new FeedsGateway(new Connection($dsn, $user, $pass)))->selectAll();
	}

	/**
	 * @return int
	 */
	public function getNbFeeds() : int
	{
		global $dsn, $user, $pass;

		return (new FeedsGateway(new Connection($dsn, $user, $pass)))->getNbFeeds();
	}

	/**
	 * @return string
	 */
	public function isActor() : string
	{
		return "Admin";
	}
}