<?php

class News {

    private $id;
    private $site;
    private $titre;
    private $dateGet;
    private $lien;
    private $isfrench;

    /**
     * @param $id
     * @param $site
     * @param $titre
     * @param $dateGet
     * @param $lien
     * @param $isfrench
     */
    public function __construct($id, $site, $titre, $dateGet, $lien, $isfrench)
    {
        $this->id = $id;
        $this->site = $site;
        $this->titre = $titre;
        $this->dateGet = $dateGet;
        $this->lien = $lien;
        $this->isfrench = $isfrench;
    }

}