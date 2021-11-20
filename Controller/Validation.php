<?php

class Validation
{
    /**
     * @param string $str
     */
    public static function validString(string & $str) : void
    {
        if (!isset($str) || empty($str = filter_var($str, FILTER_SANITIZE_STRING))) {
            $str = "";
        }
    }

    /**
     * @param string $mail
     */
    public static function validMail(string & $mail) : void
    {
        if (!isset($mail) || empty($mail = filter_var($mail, FILTER_SANITIZE_EMAIL)) ||
            !filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $mail = "";
        }
    }

    /**
     * @param string $int
     */
    public static function validInt(string & $int) : void
    {
        if (!isset($int) || empty($int = filter_var($int, FILTER_SANITIZE_NUMBER_INT))) {
            $int = 0;
        } else {
            $int = filter_var($int, FILTER_VALIDATE_INT);
        }
    }

    /**
     * @param bool $b
     */
    public static function validBool(bool & $b) : void
    {
        if (!isset($b)) {
            $b = false;
        } else {
            $b = filter_var($b, FILTER_VALIDATE_BOOL);
        }
    }
}