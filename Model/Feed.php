<?php

class Feed {
    private string $title;
    private string $feedUrl;

    /**
     * @param string $title
     * @param string $feedUrl
     */
    public function __construct(string $title, string $feedUrl)
    {
        $this->title = $title;
        $this->feedUrl = $feedUrl;
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
    public function getFeedUrl(): string
    {
        return $this->feedUrl;
    }
}