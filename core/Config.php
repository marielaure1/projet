<?php

namespace Core;

/**
 * Class Config
 * Quoi?
 */
class Config{

    private $settings = [];
    private static $_instance;

    /**
     * getInstance() = va créer automatiquement une instance d'une class si elle est appelé mais qu'elle n'existe pas encore
     * is_null = Indique si une variable vaut null
     */
    public static function getInstance($file)
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new Config($file);
        }
        return self::$_instance;
    }

    public function __construct($file)
    {
        $this->settings = require($file);
    }

    public function get($key)
    {
        if (!isset($this->settings[$key])) {
            return null;
        }
        return $this->settings[$key];
    }

}