<?php

namespace App\General\Abstracts;

use App\General\Interfaces\IEnum;

abstract class Enum implements IEnum
{
    public static function getValueById(int $id)
    {
        return array_search($id, static::getEnum());
    }

    public static function getIdByValue(string $key)
    {
        return static::getEnum()[$key];
    }

    abstract static function getEnum():array;
}