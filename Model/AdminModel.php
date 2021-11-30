<?php

class AdminModel
{
    public function __construct()
    {
    }

    /**
     * @return array
     */
    public function connectionAdmin(Admin $a) : bool
    {
        global $dsn, $user, $pass;

        $gw = new AdminsGateway(new Connection($dsn, $user, $pass));

        return in_array($a, $gw->selectAll(), true);
    }
}