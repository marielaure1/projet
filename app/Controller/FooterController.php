<?php

namespace App\Controller;

use Core\Controller\Controller;
use \App;
use Core\HTML\Form;

class FooterController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('Category');
    }

    public function mentionslegales(){

        $this->render('footer.mentionslegales');
    }
    public function cgv(){

        $this->render('footer.cgv');
    }
    public function protectiondonnee(){

        $this->render('footer.protectiondonnee');
    }

    public function contact(){
        $categories = $this->Category->all();
        $success = false;
        $display = "none";
        $contentMail = "";
        $errors = array();

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $success = true;

            if(empty($_POST["nom"])){
                $errors["nomError"] = "Veuillez saisir votre nom.";
                $success = false;
            } else if(preg_match("/[0-9\[^\'£$%^&*()}{@:\'#~?><>,;@\|\-=\-_+\-¬\`\]]/", $_POST["nom"])){
                $errors["nomError"] = "Veuillez saisir un nom valide.";
            } else {
                $contentMail .= "Nom: ".$_POST["nom"]."\n";
            }

            if(empty($_POST["prenom"])){
                $errors["prenomError"] = "Veuillez saisir votre prénom.";
                $success = false;
            } else if(preg_match("/[0-9\[^\'£$%^&*()}{@:\'#~?><>,;@\|\-=\-_+\-¬\`\]]/", $_POST["prenom"])){
                $errors["prenomError"] = "Veuillez saisir un prénom valide.";
            } else {
                $contentMail .= "Prénom: ".$_POST["prenom"]."\n";
            }

            if(!empty( $_POST["telephone"]) && (!filter_var( $_POST["telephone"]) || strlen( $_POST["telephone"]) != 10)){
                $errors["telephoneError"] = "Veuillez un numéro valide.";
                $success = false;
            } else {
                $contentMail .= "Téléphone: ". $_POST["telephone"]."\n";
            }

            if(empty($_POST["email"])){
                $errors["emailError"] = "Veuillez saisir votre e-mail.";
                $success = false;
            } else if(!empty($_POST["email"]) && !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
                    $errors["emailError"] = "Veuillez saisir un email valide.";
                    $success = false;
            } else {
                $contentMail .= "E-mail: ".$_POST["email"]."\n";
            }

            if(empty($_POST["sujet"])){
                $errors["sujetError"] = "Veuillez saisir votre sujet.";
                $success = false;
            } else {
                $contentMail .= "Message: ".$_POST["sujet"]."\n";
            }
            if(empty($_POST["message"])){
                $errors["messageError"] = "Veuillez saisir votre message.";
                $messageError = "Veuillez saisir votre message.";
                $success = false;
            } else {
                $contentMail .= "Message: ".$_POST["message"]."\n";
            }
            
            if($success){
                $display = "block";
                mail("edjour.marielaure@gmail.com", "Cocoonut - Contact", $contentMail);
            }
        }

        $form = new Form($_POST);

        $this->render('footer.contact', compact("form", "display", "errors", "categories"));
    }

}