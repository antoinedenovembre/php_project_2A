<?php

class News {

    private string $site;
    private string $titre;
    private string $dateGet;
    private string $lien;
    private bool $isfrench;

    /**
     * @param string $lien
     * @param string $site
     * @param string $titre
     * @param string $dateGet
     * @param bool $isfrench
     */
    public function __construct(string $lien, string $site, string $titre, string $dateGet, bool $isfrench)
    {
        $this->lien = $lien;
        $this->site = $site;
        $this->titre = $titre;
        $this->dateGet = $dateGet;
        $this->isfrench = $isfrench;
    }

    /**
     * @return string
     */
    public function getLien(): string
    {
        return $this->lien;
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
	    $year = substr($this->dateGet, 0, -6);
	    $month = substr($this->dateGet, 5, -3);
	    $day = substr($this->dateGet, -2);

		return "$day-$month-$year";
    }

    /**
     * @return bool
     */
    public function isFrench(): bool
    {
        return $this->isfrench;
    }
}