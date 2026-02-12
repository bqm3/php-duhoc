<?php
// app/core/Config.php

class Config
{
    private static $config = null;

    public static function load()
    {
        if (self::$config === null) {
            $path = __DIR__ . '/../config/config.php';
            if (file_exists($path)) {
                self::$config = require $path;
            } else {
                self::$config = [];
            }
        }
    }

    public static function get($name, $default = null)
    {
        self::load();

        $parts = explode('.', $name);
        $current = self::$config;

        foreach ($parts as $part) {
            if (is_array($current) && isset($current[$part])) {
                $current = $current[$part];
            } else {
                return $default;
            }
        }

        return $current;
    }
}
