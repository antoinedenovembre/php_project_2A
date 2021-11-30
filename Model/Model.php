<?php

class Model
{

    public function __construct()
    {
    }

    /**
     * @return array
     */
    public function getNews() : array
    {
        global $dsn, $user, $pass;

        $gw = new NewsGateway(new Connection($dsn, $user, $pass));
        return $gw->selectAll();
    }
}