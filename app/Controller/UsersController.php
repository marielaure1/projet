<?php

namespace App\Controller;

use Core\Auth\DBAuth;
use Core\HTML\BootstrapForm;
use \App;

/**
 * Class UsersController = class enfant de AppController
 * Permet de quoi?
 */
class UsersController extends AppController {

    public function __construct(){
        parent::__construct();
        $this->loadModel('User');
    }

    public function login(){
        $errors = false;
        if(!empty($_POST)){
            $auth = new DBAuth(App::getInstance()->getDb());
            if($auth->login($_POST['username'], $_POST['password'])){
                if($_SESSION['user']->role === 'ROLE_ADMIN'){
                    // champ user 'role' administrateur
                    header('Location: index.php?p=admin.posts.index');
                    // champ user 'user'
                }else{
                    header('Location: index.php');
                }
            } else {
                $errors = true;
            }
        }
        $form = new BootstrapForm($_POST);
        $this->render('users.login', compact('form', 'errors'));
    }

    /*
    * fonction de déconnexion de l'utilisateur
    */
    public function logout(){
  
        $this->render('users.logout');
    }


    /*
    * fonction d'inscription de l'utilisateur
    */
    public function inscription(){
        $errors = false;
        $messageError = null;

        if(!empty($_POST)){
            // Vérification des champs de manière générale
            if(empty($_POST['firstname']) || 
               empty($_POST['lastname']) || 
               empty($_POST['email']) ||
               empty($_POST['emailVerif']) ||
               empty($_POST['tel']) ||
               empty($_POST['username']) ||
               empty($_POST['password']) ||
               empty($_POST['passwordVerif'])
               ){
                $errors = true;
                $messageError = "Veuillez remplir tous les champs";
            }else{

                if($_POST['email'] != $_POST['emailVerif']){
                    $errors = true;
                    $messageError = "Les champs d'email sont incorrect";
                }
                if($_POST['password'] != $_POST['passwordVerif']){
                    $errors = true;
                    $messageError = "Les champs de password sont incorrect";
                }

                if(strlen($_POST['tel']) < 10){
                    $errors = true;
                    $messageError = "Le champ de téléphone doit comporter 10 chiffres";
                }

                if(!$errors){
                    $this->registration($_POST);
                }   
            }
        }
        $form = new BootstrapForm($_POST);
        $this->render('users.inscription', compact('form', 'errors', 'messageError'));
    }

    /*
    * fonction d'enregistrement de l'utilisateur
    */
    public function registration($donnees){
        if (!empty($donnees)) {
            $result = $this->User->create([
                'username' => $_POST['username'],
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                'email' => $_POST['email'],
                'tel' => $_POST['tel'],
                'role' => 'ROLE_USER',
                'password' => sha1($_POST['password']),
            ]);
            if($result){
                header('Location: index.php?p=users.login');
            }
        }
    }

}