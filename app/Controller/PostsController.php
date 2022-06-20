<?php

namespace App\Controller;

use Core\Controller\Controller;
use App\Entity\CategoryEntity;
use Core\HTML\Form;

/**
 * Class PostsController = class enfant de AppController
 * Permet de quoi?
 */
class PostsController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Category');
        $this->loadModel('SousCategory');
        $this->loadModel('Produit');
        $this->loadModel('Favoris');
        $this->loadModel('Image');
    }

    public function index(){
        $posts = $this->Post->last();
        $categories = $this->Category->all();
        $favoris = $this->Favoris->all();
        $form = new Form($_POST);
        $this->render('posts.index', compact('posts', 'categories', 'form', "favoris"));
    }

    public function category(){
        $url = new CategoryEntity();
        $categorie = $this->Category->find($_GET['id']);
        if($categorie === false){
            $this->notFound();
        }

        if(isset($_GET['souscategories'])){
            $produits = $this->Produit->lastBySousCategory($_GET['souscategories']);
        } else {
            $produits = $this->Produit->all();
        }
        if(isset($_SESSION["auth"])){
            $favoris = $this->Favoris->findFavoris($_SESSION["auth"]);
        } else{
            $favoris = "";
        }

        
        $souscategories = $this->SousCategory->allByCategory($_GET['id']);
        $categories = $this->Category->all();
        
        $images = $this->Image->all();

        $this->render('posts.category', compact('produits', 'categories', 'categorie', 'favoris', 'images', "souscategories", "url"));
    }

    public function show(){
        if(isset($_SESSION["auth"])){
            $favoris = $this->Favoris->findFavoris($_SESSION["auth"]);
        } else{
            $favoris = "";
        }
        $favoris = $this->Favoris->all();
        $images = $this->Image->produitImage($_GET["id"]);
        $produit = $this->Produit->find($_GET["id"]);
        $this->render('posts.show', compact('images', "produit", "favoris"));
    }

    

    public function inspirations(){
        $this->render('posts.inspirations');
    }

    public function error(){
        $this->render('posts.error');
    }

    public function contact(){
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

        $this->render('posts.contact', compact("form", "display", "errors"));
    }

    public function errorpage(){
        $this->render('posts.errorpage');
    }
    
}