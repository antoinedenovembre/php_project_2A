<?php

require_once('../Validation.php');
require_once('Connection.php');

class NewsGateway
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
     * @param string $site
     * @param string $titre
     * @param string $dateGet
     * @param string $lien
     * @param bool $isfrench
     * @return int
     */
    public function insert(string $site, string $titre, string $dateGet, string $lien, bool $isfrench) : int
    {
        $query = 'INSERT INTO News(site, titre, dateGet, lien, isfrench) VALUES(:site, :titre, :dateGet, :lien, :isfrench)';

        $params = array(
            ':site' => array($site, PDO::PARAM_STR),
            ':titre' => array($titre, PDO::PARAM_STR),
            ':dateGet' => array($dateGet, PDO::PARAM_STR),
            ':lien' => array($lien, PDO::PARAM_STR),
            ':isfrench' => array($isfrench, PDO::PARAM_BOOL)
        );

        $this->con->executeQuery($query, $params);
        return $this->con->lastInsertId();
        /*
         * en cas de mauvaises informations, pas d'insertion et renvoie de 0 (id null)
         * pour signifier la mauvaise insertion
         */
    }

    /**
     * @param string $site
     * @param string $titre
     * @param string $dateGet
     * @param string $lien
     * @param bool $isfrench
     */
    public function update(string $lien, string $site, string $titre, string $dateGet, bool $isfrench) : void
    {
        $query =    'UPDATE News 
                    SET site = :site, titre = :titre, dateGet = :dateGet, isfrench = :isfrench
                    WHERE lien = :lien';

        $params = array(
            ':lien' => array($lien, PDO::PARAM_STR),
            ':site' => array($site, PDO::PARAM_STR),
            ':titre' => array($titre, PDO::PARAM_STR),
            ':dateGet' => array($dateGet, PDO::PARAM_STR),
            ':isfrench' => array($isfrench, PDO::PARAM_BOOL)
        );

        $this->con->executeQuery($query, $params);
    }

    /**
     * @param string $lien
     */
    public function delete(string $lien) : void
    {
        $query = 'DELETE FROM News WHERE lien = :lien';

        $params = array(
            ':lien' => array($lien, PDO::PARAM_STR)
        );

        $this->con->executeQuery($query, $params);
    }

    /**
     * @param string $date
     * @return array
     */
    public function findByDate(string $date) : array
    {
        // récupère données côté db (preparation + exec grâce à Connection::executeQuery())
        $query = 'SELECT * FROM News WHERE dateGet = :dateGet';
        $params = array(
            ':dateGet' => array($date, PDO::PARAM_STR)
        );

        $this->con->executeQuery($query, $params);

        // conversion en objets
        $res = $this->con->getResults();
        $tabN = array();
        foreach ($res as $row) {
            $tabN[] = new News($row['id'], $row['site'], $row['titre'], $row['dateGet'], $row['lien'], $row['isfrench']);
        }
        return $tabN;
    }
}