<?php

namespace Core;
class Validator
{
    /*
     * STATIC FUNKCIJE
     * -----------------------------------------
     * ako su funkcije "ciste", ne ovise o stateu, mozemo ih uciniti staticnima
     * to nam omogucava da te funkcije pozivamo direktno (bez instanciranja njihove klase)
     * */
    public static function string($value, $min = 1, $max = INF)
    {
        $value = trim($value);
        return strlen($value) >= $min && strlen($value) <= $max;
    }
    public static function email($value)
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}