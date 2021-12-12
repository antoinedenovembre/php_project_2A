<?php

class NewsGateway
{
    private Connection $con;

    /**
     * @param Connection $con
     */
    public function __construct(Connection $con)
    {
        $this->con = $con;
    }

    /**
     * @param string $url
     * @param string $title
     * @param bool $isFrench
     * @return int
     */
    public function insertWebSite(string $url, string $title, bool $isFrench) : int {
        $query = 'INSERT INTO newswebsite VALUES (:url, :title, :is_french)';
        $params = array(
            ':url' => array($url, PDO::PARAM_STR),
            ':title' => array($title, PDO::PARAM_STR),
            ':is_french' => array($isFrench, PDO::PARAM_BOOL)
        );

        $this->con->executeQuery($query, $params);
        return $this->con->lastInsertId();
    }

    /**
     * @param string $url
     * @param string $title
     * @param string $desc
     * @param string $date
     * @param string $webSiteUrl
     * @return int
     */
    public function insertNews(string $url, string $title, string $desc, string $date, string $webSiteUrl) : int
    {
        $query = 'INSERT INTO News VALUES(:url, :title, :desc , :date, :webSiteUrl)';

        $params = array(
            ':url' => array($url, PDO::PARAM_STR),
            ':title' => array($title, PDO::PARAM_STR),
            ':desc' => array($desc, PDO::PARAM_STR),
            ':date' => array($date, PDO::PARAM_STR),
            ':webSiteUrl' => array($webSiteUrl, PDO::PARAM_STR)
        );

        $this->con->executeQuery($query, $params);
        return $this->con->lastInsertId();
    }

//    /**
//     * @param string $lien
//     */
//    public function delete(string $lien) : void
//    {
//        $query = 'DELETE FROM News WHERE lien = :lien';
//
//        $params = array(
//            ':lien' => array($lien, PDO::PARAM_STR)
//        );
//
//        $this->con->executeQuery($query, $params);
//    }

    /**
     * @param string $url
     * @return bool
     */
    public function findWebSiteByUrl(string $url) : bool
    {
        $query = 'SELECT url FROM newswebsite WHERE url = :url';

        $params = array(
            ':url' => array($url, PDO::PARAM_STR)
        );

        $this->con->executeQuery($query, $params);
        $res = $this->con->getResults();

        return !empty($res);
    }

    /**
     * @param string $url
     * @return bool
     */
    public function findNewsByUrl(string $url) : bool
    {
        $query = 'SELECT url FROM news WHERE url = :url';

        $params = array(
            ':url' => array($url, PDO::PARAM_STR)
        );

        $this->con->executeQuery($query, $params);
        $res = $this->con->getResults();

        return !empty($res);
    }

    /**
     * @param string $page
     * @return array
     */
    public function selectNews(string $page) : array
    {
        global $nbElements;
        $query = 'SELECT * FROM news LIMIT :page, :nbElements';
        $this->con->executeQuery($query,[
            ':page' => array((($page -1) * $nbElements), PDO::PARAM_INT),
            ':nbElements' => array($nbElements, PDO::PARAM_INT)
        ]);

        $res = $this->con->getResults();
        $tabN = array();
        foreach ($res as $row) {
            $query = 'SELECT * FROM newswebsite WHERE url = :url';
            $this->con->executeQuery($query,[
                ':url' => array($row['websiteUrl'], PDO::PARAM_STR)
            ]);
            $website = $this->con->getResults()[0];
            $tabN[] = new News($row['url'], $row['title'], $row['description'], $row['date'], $row['websiteUrl'], $website['title'], $website['french']);
        }

        return $tabN;
    }

	/**
	 * @return int
	 */
	public function getNbPage() : int
	{
		global $nbElements;

		$query = 'SELECT COUNT(*) FROM news';
		$this->con->executeQuery($query);
		$res = $this->con->getResults();

		return ceil($res[0][0] / $nbElements);
	}
}