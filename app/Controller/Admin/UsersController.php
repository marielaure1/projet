<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;

class UsersController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('User');
    }

    public function index(){
        $users = $this->User->all();
        $form = new BootstrapForm($_POST);
        $this->render('admin.users.index', compact('users', 'form'));
    }

    public function add(){
        $users = $this->User->all();
        if (!empty($_POST)) {

            $result = $this->User->create([
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'role' => "ROLE_ADMIN"
            ]);
            if($result){
                return $this->index();
            }
        }
        $form = new BootstrapForm($_POST);
        $this->render('admin.users.add', compact('users', 'form'));
    }

    public function edit(){
        $user = $this->User->find($_GET['id']);

        if (!empty($_POST)) {
            $result = $this->Produit->update($_GET['id'], [
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'email' => $_POST['email'],
                'password' => $_POST['password']
            ]);
                
            if($result){
                return $this->index();
            }
        }
        $form = new BootstrapForm($user);
        $this->render('admin.users.edit', compact('users', 'form'));
    }

    public function delete(){
        if (!empty($_POST)) {
            $result = $this->User->delete($_POST['id']);
            return $this->index();
        }
    }

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
        $this->render('admin.users.inscription', compact('form', 'errors', 'messageError'));
    }

    public function registration($donnees){
        if (!empty($donnees)) {
            $result = $this->User->create([
                'prenom' => $_POST['prenom'],
                'nom' => $_POST['nom'],
                'email' => $_POST['email'],
                'role' => 'ROLE_ADMIN',
                'password' => sha1($_POST['password']),
            ]);
            if($result){
                header('Location: index.php?p=admin.users.inscription');
            }
        }
    }
}