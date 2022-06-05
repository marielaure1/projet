<?php

namespace App\Controller;

use Core\Controller\Controller;
use \App;

/**
 * Class AppController = class enfant de Controller
 * Permet de choisir un template et un viewPath
 */
class AppController extends Controller{

    protected  $template = 'default';

    public function __construct(){
        $this->viewPath = ROOT . '/app/Views/';
    }
    // Quoi?
    protected function loadModel($model_name){
        $this->$model_name = App::getInstance()->getTable($model_name);
    }

}