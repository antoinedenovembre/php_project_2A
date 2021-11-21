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

        Validation::validString($site);
        Validation::validString($titre);
        Validation::validString($dateGet);
        Validation::validString($lien);

        $params = array(
            ':site' => array($site, PDO::PARAM_STR),
            ':titre' => array($titre, PDO::PARAM_STR),
            ':dateGet' => array($dateGet, PDO::PARAM_STR),
            ':lien' => array($lien, PDO::PARAM_STR),
            ':isfrench' => array($isfrench, PDO::PARAM_BOOL)
        );

        if ($site !== "" || $titre !== "" || $dateGet !== "" || $lien !== "") {
            $this->con->executeQuery($query, $params);
            return $this->con->lastInsertId();
        }
        return 0;
        /*
         * en cas de mauvaises informations, pas d'insertion et renvoie de 0 (id null)
         * pour signifier la mauvaise insertion
         */
    }

    /**
     * @param int $id
     * @param string $site
     * @param string $titre
     * @param string $dateGet
     * @param string $lien
     * @param bool $isfrench
     */
    public function update(int $id, string $site, string $titre, string $dateGet, string $lien, bool $isfrench) : void
    {
        $query =    'UPDATE News 
                    SET site = :site, titre = :titre, dateGet = :dateGet, lien = :lien, isfrench = :isfrench
                    WHERE id = :id';

        Validation::validString($site);
        Validation::validString($titre);
        Validation::validString($dateGet);
        Validation::validString($lien);
        Validation::validInt($id);

        $params = array(
            ':id' => array($id, PDO::PARAM_INT),
            ':site' => array($site, PDO::PARAM_STR),
            ':titre' => array($titre, PDO::PARAM_STR),
            ':dateGet' => array($dateGet, PDO::PARAM_STR),
            ':lien' => array($lien, PDO::PARAM_STR),
            ':isfrench' => array($isfrench, PDO::PARAM_BOOL)
        );

        if ($id !== 0 || $site !== "" || $titre !== "" || $dateGet !== "" || $lien !== "") {
            $this->con->executeQuery($query, $params);
        }
    }

    /**
     * @param int $id
     */
    public function delete(int $id) : void
    {
        $query = 'DELETE FROM News WHERE id = :id';

        Validation::validInt($id);

        $params = array(
            ':id' => array($id, PDO::PARAM_INT)
        );

        if ($id !== 0) {
            $this->con->executeQuery($query, $params);
        }
    }

    /**
     * @param string $date
     * @return array
     */
    public function FindByDate(string $date) : array
    {
        // récupère données côté db (preparation + exec grâce à Connection::executeQuery())
        Validation::validString($date);
        if ($date !== "") {
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
        return array();
    }
}