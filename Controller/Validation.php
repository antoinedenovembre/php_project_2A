<?php

class Validation
{
    /**
     * @param $str
     */
    public static function validString(string & $str) : void
    {
        if (!isset($str) || empty($str = filter_var($str, FILTER_SANITIZE_STRING)))
        {
            $str = "stringError";
        }
    }

    /**
     * @param $mail
     */
    public static function validMail(string & $mail) : void
    {
        if (!isset($mail) || empty($mail = filter_var($mail, FILTER_SANITIZE_EMAIL)) ||
            !filter_var($mail, FILTER_VALIDATE_EMAIL))
        {
            $mail = "mail@example.com";
        }
    }

    /**
     * @param $int
     */
    public static function validInt(string & $int) : void
    {
        if (!isset($int) || empty($int = filter_var($int, FILTER_SANITIZE_NUMBER_INT)))
        {
            $int = 0;
        }
        else
        {
            $int = filter_var($int, FILTER_VALIDATE_INT);
        }
    }
}