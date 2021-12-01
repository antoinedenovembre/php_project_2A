<?php

class Validation
{
    /**
     * @param string $str
     */
    public static function validString(string & $str) : void
    {
        if (!isset($str) || empty($str = filter_var($str, FILTER_SANITIZE_STRING))) {
            throw new InvalidArgumentException($str . ' is not a valid string');
        }
    }

    /**
     * @param string $mail
     */
    public static function validMail(string & $mail) : void
    {
        if (!isset($mail) || empty($mail = filter_var($mail, FILTER_SANITIZE_EMAIL)) ||
            !filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException($mail . ' is not a valid mail');
        }
    }

    public static function validDate(string & $date) : void
    {
        if (!isset($date) || empty($date = filter_var($date, FILTER_SANITIZE_STRING))) {
            throw new InvalidArgumentException($date . ' is not a valid date');
        }

        $tmp = date_parse_from_format('Y-m-d', $date);
        if ($tmp['error_count'] > 0) {
            throw new InvalidArgumentException($date . ' is not a valid date');
        }
    }

    /**
     * @param mixed $int
     */
    public static function validInt(string|int & $int) : void
    {
        if (!isset($int) || empty($int = filter_var($int, FILTER_SANITIZE_NUMBER_INT))) {
            throw new InvalidArgumentException($int . ' is not a valid integer');
        }

        $int = filter_var($int, FILTER_VALIDATE_INT);
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

    public static function validePage(string|int & $page, int $nbPage) {
        if (!isset($page) || empty($page = filter_var($page, FILTER_SANITIZE_NUMBER_INT))) {
            throw new InvalidArgumentException($page . ' is not a valid integer');
        }

        if(!$page = filter_var($page, FILTER_VALIDATE_INT)) {
            throw new InvalidArgumentException($page . ' is not a valid integer');
        }

        $page = (int)abs($page);
        if ($page < 1 || $page > $nbPage) {
            throw new InvalidArgumentException($page . ' is not a valid page');
        }
    }
}