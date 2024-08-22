<?php

namespace App\Helpers;

use App\Models\Setting;

class SettingsHelper
{
    public static function info()
    {
        return Setting::first();
    }
}
