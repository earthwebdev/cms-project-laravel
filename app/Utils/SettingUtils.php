<?php

namespace App\Utils;

use App\Models\Setting;

class SettingUtils
{
    private static $settings;

    private static function loadSettings(){
        self::$settings = Setting::pluck('value', 'name')->all();
    }

    public static function get($key, $default = NULL){
        if(!isset(self::$settings)){
            self::loadSettings();
        }

        return array_key_exists($key, self::$settings)? self::$settings[$key]: $default;

    }

    public static function set($key, $value){
        if(!isset(self::$settings)){
            self::loadSettings();
        }

        Setting::updateOrCreate(['name' => $key], ['value' => $value]);
        self::$settings[$key] = $value;
        return true;

    }
}