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

	    $result =  (new NewsGateway(new Connection($dsn, $user, $pass)))->selectNews($page, $order, $type);
        $news = [];
        foreach ($result as $row) {
            $news[] = new News($row['url'], $row['title'], $row['description'], $row['date'], $row['websiteUrl'], $row['website'], $row['french']);
        }

        return $news;
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