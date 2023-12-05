<?php

namespace Gideon\Test;

class Validation
{
    /**
     * @param string $string
     * @param int $min
     * @return bool
     */
    public static function string(string $string, int $min = 1): bool
    {
        if (gettype($string) !== 'string') return false;
        if (!strlen($string) >= $min) return false;

        return true;
    }

    /**
     * Make sure the password is 8 chars long, has 1 uppercase letter
     * and has one special character.
     *
     * @param string $password
     * @return bool
     */
    public static function password(string $password): bool
    {
        $pattern = '/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/m';
        preg_match_all($pattern, $password,$matches);

        if(count($matches[0]) === 0) return false;

        return true;
    }
}