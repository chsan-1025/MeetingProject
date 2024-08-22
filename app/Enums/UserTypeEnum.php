<?php

namespace App\Enums;

enum UserTypeEnum :string
{
    case Admin = 'admin';
    case Employee = 'employee';

    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }
}
