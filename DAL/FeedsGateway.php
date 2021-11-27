<?php

require_once('../Config/Validation.php');
require_once('Connection.php');

class FeedsGateway
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
     * @param string $title
     * @param string $url
     * @return int
     */
    public function insert(string $title, string $url): int
    {
        $query = 'INSERT INTO feeds(title, url) VALUES(:site, :url)';

        $params = array(
            ':site' => array($title, PDO::PARAM_STR),
            ':url' => array($url, PDO::PARAM_STR)
        );

        $this->con->executeQuery($query, $params);
        return $this->con->lastInsertId();
        /*
         * en cas de mauvaises informations, pas d'insertion et renvoie de 0 (id null)
         * pour signifier la mauvaise insertion
         */
    }

    /**
     * @param string $title
     * @param string $url
     */
    public function update(string $title, string $url): void
    {
        $query = 'UPDATE feeds 
                    SET title = :title, url = :url
                    WHERE url = :url';

        $params = array(
            ':title' => array($title, PDO::PARAM_INT),
            ':url' => array($url, PDO::PARAM_STR)
        );

        $this->con->executeQuery($query, $params);
    }

    /**
     * @param string $url
     */
    public function delete(string $url): void
    {
        $query = 'DELETE FROM feeds WHERE url = :url';

        $params = array(
            ':url' => array($url, PDO::PARAM_INT)
        );

        $this->con->executeQuery($query, $params);
    }

    public function selectAll() : array
    {
        $query = 'SELECT * FROM feeds';
        $this->con->executeQuery($query);

        $res = $this->con->getResults();
        $tabN = array();
        foreach ($res as $row) {
            $tabN[] = new Feed($row['title'], $row['url']);
        }

        return $tabN;
    }
}
