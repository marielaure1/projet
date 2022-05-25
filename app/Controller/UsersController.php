<?php

namespace App\Controller;

use Core\Auth\DBAuth;
use Core\HTML\BootstrapForm;
use \App;

class UsersController extends AppController {

    public function login(){
        $errors = false;


        if(!empty($_POST)){
            $auth = new DBAuth(App::getInstance()->getDb());
            if($auth->login($_POST['username'], $_POST['password'])){
                header('Location: index.php?p=admin.posts.index');
            } else {
                $errors = true;
            }
        }
        $form = new BootstrapForm($_POST);
        $this->render('users.login', compact('form', 'errors'));
    }

    /*
    * function de suppression de l'utilisateur connecté
    */

    public function logout(){
        $this->render("users.logout");
    }
    /*
    * function d'inscription de l'utilisateur
    */

    public function inscription(){
        $this->render("users.inscription");
    }

}