<?php

namespace App\General\Interfaces;

interface IEnum
{
    public static function getValueById(int $id);
    public static function getIdByValue(string $value);
}