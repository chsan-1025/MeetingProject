<?php

namespace App\Enums;

enum DepartmentEnum:string
{
    case BackendDeveloper = 'backend_developer';
    case FrontEndDeveloper = 'frontend_developer';
    case Designer = 'designer';

    public static function getValues(): array
    {
        return array_column(self::cases(), 'value');
    }
}