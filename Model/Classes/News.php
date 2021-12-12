<?php

class News
{
    private string $url;
    private string $title;
    private string $desc;
    private string $date;
    private string $websiteUrl;
    private string $website;
    private bool $isFrench;


    /**
     * @param string $url
     * @param string $title
     * @param string $desc
     * @param string $date
     * @param string $websiteUrl
     * @param bool $isFrench
     */
    public function __construct(string $url, string $title, string $desc, string $date, string $websiteUrl, $website ,bool $isFrench)
    {
        $this->url = $url;
        $this->title = $title;
        $this->desc = $desc;
        $this->date = $date;
        $this->websiteUrl = $websiteUrl;
        $this->website = $website;
        $this->isFrench = $isFrench;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDesc(): string
    {
        return $this->desc;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return date('l d F Y', strtotime($this->date));
    }

    /**
     * @return string
     */
    public function getWebsiteUrl(): string
    {
        return $this->websiteUrl;
    }

    /**
     * @return string
     */
    public function getWebsite(): string
    {
        return $this->website;
    }

    /**
     * @return bool
     */
    public function isFrench(): bool
    {
        return $this->isFrench;
    }
}