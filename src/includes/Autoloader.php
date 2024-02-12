<?php

namespace Src\Includes;

class Autoloader
{

    /**
     * @param string $class
     * 
     * @return void
     */
    public static function autoload(string $class): void
    {
        $file = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';

        if (file_exists($file)) {
            require_once $file;
        } else {
            throw new \Src\Exceptions\FileNotFound($file);
        }
    }

    public static function register() {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }
}
