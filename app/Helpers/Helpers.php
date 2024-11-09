<?php

namespace App\Helpers;

class Helpers
{

    public static function setData()
    {
        return [1, 2, 3, 4, 5, 'string', ['array']];
    }

    public static function getDataTypes(array $array)
    {
        $types = [];
        foreach ($array as $key => $value) {
            $types[] = gettype($value);
        }

        return $types;
    }

    public static function elementExists($element, array $array)
    {
        foreach ($array as $key => $value) {
            if ($value === $element) {
                return true;
            }
        }

        return false;
    }

    public static function getElementKey($element, array $array)
    {
        foreach ($array as $key => $value) {
            if ($value === $element) {
                return $key;
            }
        }

        return null;
    }
}

