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
        $success = false;
        $displaySuccess = false;
        $displayWarning = false;
        $errors = array();

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $success = true;

            if(empty($_POST["nom"])){
                $errors["nomError"] = "Veuillez saisir votre nom.";
                $success = false;
            } else if(preg_match("/[0-9\[^\'£$%^&*()}{@:\'#~?><>,;@\|\=\_+\¬\`\]]/", $_POST["nom"])){
                $errors["nomError"] = "Veuillez saisir un nom valide.";
            }

            if(empty($_POST["prenom"])){
                $errors["prenomError"] = "Veuillez saisir votre prénom.";
                $success = false;
            } else if(preg_match("/[0-9\[^\'£$%^&*()}{@:\'#~?><>,;@\|\=\_+\¬\`\]]/", $_POST["prenom"])){
                $errors["prenomError"] = "Veuillez saisir un prénom valide.";
            }

            if(!empty( $_POST["telephone"]) && (!filter_var( $_POST["telephone"]) || strlen( $_POST["telephone"]) != 10)){
                $errors["telephoneError"] = "Veuillez un numéro valide.";
                $success = false;
            }

            if(empty($_POST["email"])){
                $errors["emailError"] = "Veuillez saisir votre e-mail.";
                $success = false;
            } else if(!empty($_POST["email"]) && !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
                    $errors["emailError"] = "Veuillez saisir un email valide.";
                    $success = false;
            }

            if(empty($_POST["password"])){
                $errors["passwordError"] = "Veuillez saisir votre mot de passe.";
                $success = false;
            } else if(!preg_match('@[A-Z]@', $_POST["password"]) || !preg_match('@[a-z]@', $_POST["password"]) || !preg_match('@[0-9]@', $_POST["password"]) || !strlen($_POST["password"]) >= 8){
                $errors["passwordError"] = "Votre mot de passe doit contenir: au moins 8 caractères, au moins une lettre majuscule et au moins une lettre miniscule";
                $success = false;
            }

            if(empty($_POST["adresse"])){
                $errors["adresseError"] = "Veuillez saisir votre adresse.";
                $success = false;
            }

            $userExist = $this->User-> userExist();


            if($userExist){
                $success = false;
                $displayWarning = true;
            }

            if($success){
                $result = $this->User->create([
                    'nom' => $_POST['nom'],
                    'prenom' => $_POST['prenom'],
                    'email' => $_POST['email'],
                    'password' => sha1($_POST['password']),
                    'telephone' => $_POST['telephone'],
                    'adresse' => $_POST['adresse'],
                    'role' => $_POST['role']
                ]);
                $displaySuccess = true;
            }
        }

        $form = new BootstrapForm($_POST);
        $this->render('admin.users.index', compact('$success', 'users', 'form', "errors", "displaySuccess", "displayWarning"));
    }

    public function edit(){
        $errors = false;
        $users = $this->User->all();

        if (!empty($_POST)) {

            if(empty($_POST['nom']) || 
            empty($_POST['prenom']) || 
            empty($_POST['email']) ||
            empty($_POST['role']) ||
            empty($_POST['adresse'])
               ){
                $errors = true;
            }

            if(preg_match("/[0-9\[^\'£$%^&*()}{@:\'#~?><>,;@\|\-=\-_+\-¬\`\]]/", $_POST["nom"])){
                $errors = true;
            }
            
            if(preg_match("/[0-9\[^\'£$%^&*()}{@:\'#~?><>,;@\|\=\_+\¬\`\]]/", $_POST["prenom"])){
                $errors = true;
            }
             
            if(preg_match("/[a-zA-z\[^\'£$%^&*()}{@:\'#~?><>,;@\|\=\_+\¬\`\]]/", $_POST["telephone"])){
                $errors = true;
            }

            if(!empty($_POST["password"]) && (!preg_match('@[A-Z]@', $_POST["password"]) || !preg_match('@[a-z]@', $_POST["password"]) || !preg_match('@[0-9]@', $_POST["password"]) || !strlen($_POST["password"]) >= 8)){
                $errors = true;
            }

            if(!$errors){
                $result = $this->Produit->update($_GET['id'], [
                    'nom' => $_POST['nom'],
                    'prenom' => $_POST['prenom'],
                    'email' => $_POST['email'],
                    'password' => sha1($_POST['password']),
                    'telephone' => $_POST['telephone'],
                    'adresse' => $_POST['adresse'],
                    'role' => $_POST['role']
                ]);
            }
        }
        $user = $this->User->editFind($_GET['id']);
        $form = new BootstrapForm($user);
        $this->render('admin.users.edit', compact('form'));
    }

    public function delete(){
        if (!empty($_POST)) {
            $result = $this->User->delete($_POST['id']);
            return $this->index();
        }
    }
}