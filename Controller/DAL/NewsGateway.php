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

        $this->con->executeQuery($query, $params);

        return $this->con->lastInsertId();
    }

    public function update(int $id, string $site, string $titre, string $dateGet, string $lien, bool $isfrench)
    {
        $query =    'UPDATE News 
                    SET site = :site, titre = :titre, dateGet = :dateGet, lien = :lien, isfrench = :isfrench
                    WHERE id = :id';

        Validation::validString($site);
        Validation::validString($titre);
        Validation::validString($dateGet);
        Validation::validString($lien);

        $params = array(
            ':id' => array($id, PDO::PARAM_INT),
            ':site' => array($site, PDO::PARAM_STR),
            ':titre' => array($titre, PDO::PARAM_STR),
            ':dateGet' => array($dateGet, PDO::PARAM_STR),
            ':lien' => array($lien, PDO::PARAM_STR),
            ':isfrench' => array($isfrench, PDO::PARAM_BOOL)
        );

        $this->con->executeQuery($query, $params);
    }

    public function delete(int $id)
    {
        // pareil qu'au dessus en delete
    }

    public function FindByDate(str $date) : array
    {
        // recup données côté db (preparation + exec)
        // conversion en objets
        return array();
    }
}