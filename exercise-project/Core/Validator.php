<?php

namespace Core;

class Validator
{
    public static function string($value, $min = 1, $max = INF): bool
    {
        $value = trim($value);
        return strlen($value) >= $min && strlen($value) <= $max;
    }

    public static function email($value): bool
    {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }

    public static function number($value, $min = null, $max = null): bool
    {
        if (!is_numeric($value)) {
            return false;
        }

        if ($min !== null && $value < $min) {
            return false;
        }

        if ($max !== null && $value > $max) {
            return false;
        }

        return true;
    }

    public static function required($value): bool
    {
        return $value !== null && $value !== '';
    }
}