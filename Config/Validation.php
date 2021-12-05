<?php

class Validation
{
    /**
     * @param string $str
     * @return string
     */
    public static function validString(string $str) : string
    {
        if (!isset($str) || empty($clean_str = filter_var($str, FILTER_SANITIZE_STRING))) {
            throw new InvalidArgumentException($str . ' is not a valid string');
        }

        return $clean_str;
    }

    /**
     * @param string $mail
     * @return string
     */
    public static function validMail(string $mail) : string
    {
        if (!isset($mail) || empty($clean_mail = filter_var($mail, FILTER_SANITIZE_EMAIL)) ||
            !filter_var($clean_mail, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException($mail . ' is not a valid mail');
        }

        return $clean_mail;
    }

    /**
     * @param string $date
     * @return string
     */
    public static function validDate(string $date) : string
    {
        if (!isset($date) || empty($clean_date = filter_var($date, FILTER_SANITIZE_STRING))) {
            throw new InvalidArgumentException($date . ' is not a valid date');
        }

        $tmp = date_parse_from_format('Y-m-d', $clean_date);
        if ($tmp['error_count'] > 0) {
            throw new InvalidArgumentException($date . ' is not a valid date');
        }

        return $clean_date;
    }

    /**
     * @param bool $boolean
     * @return bool
     */
    public static function validBool(bool $boolean) : bool
    {
        if (!isset($boolean)) {
            return false;
        }

        return filter_var($boolean, FILTER_VALIDATE_BOOL);
    }

    /**
     * @param string $page
     * @param int $nbPage
     * @return int
     */
    public static function validePage(string $page, int $nbPage) : int
    {
        if (!isset($page) || empty($clean_page = filter_var($page, FILTER_SANITIZE_NUMBER_INT))) {
            throw new InvalidArgumentException($page . ' is not a valid integer');
        }

        if(!$clean_page = filter_var($clean_page, FILTER_VALIDATE_INT)) {
            throw new InvalidArgumentException($page . ' is not a valid integer');
        }

        $clean_page = (int)abs($clean_page);
        if ($clean_page < 1 || $clean_page > $nbPage) {
            throw new InvalidArgumentException($page . ' is not a valid page');
        }

        return $clean_page;
    }
}