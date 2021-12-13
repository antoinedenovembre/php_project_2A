<?php

class Model
{
	/**
	 * @param int $page
	 * @param string $type
	 * @param string $order
	 * @return array
	 */
    public function getNews(int $page, string $order, string $type) : array
    {
        global $dsn, $user, $pass;

	    return (new NewsGateway(new Connection($dsn, $user, $pass)))->selectNews($page, $order, $type);
    }

	/**
	 * @return int
	 */
	public function getNbPage() : int
	{
		global $dsn, $user, $pass;

        return (new NewsGateway(new Connection($dsn, $user, $pass)))->getNbPage();
	}
}