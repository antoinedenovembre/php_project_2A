<?php

class News {

    private int $id;
    private string $site;
    private string $titre;
    private string $dateGet;
    private string $lien;

    /**
     * @param int $id
     * @param string $site
     * @param string $titre
     * @param string $dateGet
     * @param string $lien
     * @param bool $isfrench
     */
    public function __construct(int $id, string $site, string $titre, string $dateGet, string $lien, bool $isfrench)
    {
        $this->id = $id;
        $this->site = $site;
        $this->titre = $titre;
        $this->dateGet = $dateGet;
        $this->lien = $lien;
        $this->isfrench = $isfrench;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getSite(): string
    {
        return $this->site;
    }

    /**
     * @return string
     */
    public function getTitre(): string
    {
        return $this->titre;
    }

    /**
     * @return string
     */
    public function getDateGet(): string
    {
        return $this->dateGet;
    }

    /**
     * @return string
     */
    public function getLien(): string
    {
        return $this->lien;
    }
    private bool $isfrench;

    /**
     * @return bool
     */
    public function isIsfrench(): bool
    {
        return $this->isfrench;
    }
}