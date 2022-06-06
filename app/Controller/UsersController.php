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
            if($auth->login($_POST['email'], $_POST['password'])){
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
            if(empty($_POST['prenom']) || 
               empty($_POST['nom']) || 
               empty($_POST['email']) ||
               empty($_POST['password'])
               ){
                $errors = true;
                $messageError = "Veuillez remplir tous les champs";
            }else{

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
                'prenom' => $_POST['prenom'],
                'nom' => $_POST['nom'],
                'email' => $_POST['email'],
                'is_admin' => 'ROLE_USER',
                'password' => sha1($_POST['password']),
            ]);
            if($result){
                header('Location: index.php?p=users.login');
            }
        }
    }

}