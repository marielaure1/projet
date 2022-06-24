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
        $this->loadModel('Category');
        $this->loadModel('SousCategory');
        $this->loadModel('Produit');
        $this->loadModel('Favoris');
        $this->loadModel('Image');
    }

    public function index(){
        $categories = $this->Category->all();
        $favoris = $this->Favoris->all();
        $nouveautes = $this->Produit->nouveaute();
        $form = new Form($_POST);
        $images = $this->Image->all();
        $this->render('posts.index', compact('images', 'nouveautes', 'categories', 'form', "favoris"));
    }

    public function category(){

        $url = new CategoryEntity();
        $categorie = $this->Category->find($_GET['id']);
        if($categorie === false){
            $this->notFound();
        }

        $allProduits = $this->Produit->all();

        if(isset($_GET['souscategories'])){
            $produits = $this->Produit->lastBySousCategory($_GET['souscategories']);
        } else {
            $produits = $this->Produit->produitCategory($_GET["id"]);
        }

        if(isset($_SESSION["auth"])){
            $favoris = $this->Favoris->findFavoris($_SESSION["auth"]);
        } else{
            $favoris = "";
        }

        $souscategories = $this->SousCategory->allByCategory($_GET['id']);
        $categories = $this->Category->all();
        
        $images = $this->Image->all();

        $this->render('posts.category', compact('allProduits', 'produits', 'categories', 'categorie', 'favoris', 'images', "souscategories", "url"));
    }

    public function show(){
        $categories = $this->Category->all();
        if(isset($_SESSION["auth"])){
            $favoris = $this->Favoris->findFavoris($_SESSION["auth"]);
        } else{
            $favoris = "";
        }
        $favoris = $this->Favoris->all();
        $images = $this->Image->produitImage($_GET["id"]);
        $produit = $this->Produit->find($_GET["id"]);
        $this->render('posts.show', compact('images', "produit", "favoris", "categories"));
    }

    

    public function inspirations(){
        $categories = $this->Category->all();
        $this->render('posts.inspirations', compact("categories"));
    }

    public function error(){
        $categories = $this->Category->all();
        $this->render('posts.error', compact("categories"));
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

        $this->render('posts.contact', compact("form", "display", "errors", "categories"));
    }

    public function errorpage(){
        $categories = $this->Category->all();
        $this->render('posts.errorpage', compact("categories"));
    }
    
}