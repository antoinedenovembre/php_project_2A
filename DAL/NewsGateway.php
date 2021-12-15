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
     * @param string $feed
     * @return int
     */
    public function insertWebSite(string $url, string $title, bool $isFrench, string $feed) : int {
        $query = 'INSERT INTO newswebsite VALUES (:url, :title, :isFrench, :feed)';
        $params = array(
            ':url' => array($url, PDO::PARAM_STR),
            ':title' => array($title, PDO::PARAM_STR),
            ':isFrench' => array($isFrench, PDO::PARAM_BOOL),
            ':feed' => array($feed, PDO::PARAM_STR)
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
		 * @param string $order
		 * @param string $type
		 * @return array
		 */
    public function selectNews(string $page, string $order, string $type) : array
    {
        global $nbElements;

        $query = "SELECT * FROM news ORDER BY $type $order LIMIT :page, :nbElements";
	    $this->con->executeQuery($query,[
		    ':page' => array((($page -1) * $nbElements), PDO::PARAM_INT),
		    ':nbElements' => array($nbElements, PDO::PARAM_INT)
//            ':type' => array($type, PDO::PARAM_STR)
	    ]);

        $result = $this->con->getResults();
        foreach ($result as &$row) {
            $query = 'SELECT title, french FROM newswebsite WHERE url = :url';
            $this->con->executeQuery($query, [
                ':url' => array($row['websiteUrl'], PDO::PARAM_STR)
            ]);
            $res = $this->con->getResults();
            $row['website'] = $res[0]['title'];
            $row['french'] = $res[0]['french'];
        }

        return $result;
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