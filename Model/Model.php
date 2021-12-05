<?php

class Model
{
    /**
     * @param int $page
     * @return array
     */
    public function getNews(int $page) : array
    {
        global $dsn, $user, $pass;

        return (new NewsGateway(new Connection($dsn, $user, $pass)))->selectNews($page);
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