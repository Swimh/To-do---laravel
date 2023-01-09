<?php

namespace App\General\Concretes\Enums;

use App\General\Abstracts\Enum;

class TaskStatus extends Enum
{
    public const CREATED = 'created';
    public const PENDING = 'pending';
    public const FINISHED = 'finished';

    public const CREATED_ID = 0;
    public const PENDING_ID = 1;
    public const FINISHED_ID = 2;

    public static function getEnum(): array
    {
        return [
            self::CREATED => self::CREATED_ID,
            self::PENDING => self::PENDING_ID,
            self::FINISHED => self::FINISHED_ID
        ];
    }  
}