<?php

use Core\Config;
use Core\Database\MysqlDatabase;

/**
 * Class App
 * Gestion automatique des class
 */
class App{
    // Title du site
    public $title = "Cocoonut";
    private $db_instance;
    private static $_instance;

    /**
     * getInstance() = va créer automatiquement une instance d'une class si elle est appelé mais qu'elle n'existe pas encore
     * is_null = Indique si une variable vaut null
     */
    public static function getInstance(){
        if(is_null(self::$_instance)){
            self::$_instance = new App();
        }
        return self::$_instance;
    }

    /**
     * load() = Autoloaders
     */
    public static function load(){
        session_start();
        require ROOT . '/app/Autoloader.php';
        App\Autoloader::register();
        require ROOT . '/core/Autoloader.php';
        Core\Autoloader::register();
    }
 
    /**
     * getTable() = va permettre de créer une instance d'une class juste avec le nom de la table
     * exemple = getTable("user") -> '\App\Table\UserTable"
     * ucfirst = Met le premier caractère en majuscule
     */
    public function getTable($name){
        $class_name = '\\App\\Table\\' . ucfirst($name) . 'Table';
        return new $class_name($this->getDb());
    }

    /**
     * getDb() = va permettre d'acceder à la BDD avec config
     */
    public function getDb(){
        $config = Config::getInstance(ROOT . '/config/config.php');
        if(is_null($this->db_instance)){
            $this->db_instance = new MysqlDatabase($config->get('db_name'), $config->get('db_user'), $config->get('db_pass'), $config->get('db_host'));
        }
        return $this->db_instance;
    }

}