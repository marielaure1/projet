<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;

class ProduitsController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('Produit');
        $this->loadModel('Image');
        $this->loadModel('Category');
        $this->loadModel('SousCategory');
    }

    public function index(){
        $this->render('admin.produits.index');
    }

    public function indexProduit(){
        $produits = $this->Produit->all();
        $souscategories = $this->SousCategory->extract('id', 'nom');
        $form = new BootstrapForm($_POST);
        $this->render('admin.produits.indexProduit', compact('produits', 'form', "souscategories"));
    }

    public function indexImage(){
        $images = $this->Image->all();
        $produits = $this->Produit->extract('id', 'nom');
        $form = new BootstrapForm($_POST);
        $this->render('admin.produits.indexImage', compact('produits', 'form', 'images'));
    }

    public function addProduit(){
        $produits = $this->Produit->all();
        if (!empty($_POST)) {

            $result = $this->Produit->create([
                'nom' => $_POST['nom'],
                'descriptions' => $_POST['descriptions'],
                'details' => $_POST['details'],
                'caracteristiques' => $_POST['caracteristiques'],
                'prix' => $_POST['prix'],
                'quantite' => $_POST['quantite'],
                'publier' => $_POST['publier'],
                'id_sous_categories' => $_POST['id_sous_categories']
            ]);
            if(empty($_POST["nom"])){
                
            }
            if($result){
                return $this->indexProduit();
            }
        }
        $this->loadModel('Category');
        $categories = $this->Category->extract('id', 'nom');
        $form = new BootstrapForm($_POST);
        $this->render('admin.produits.indexProduit', compact('categories', 'form', "produits"));
    }

    public function edit(){
        $produit = $this->Produit->find($_GET['id']);

        if (!empty($_POST)) {
            //Enregistrement de l'image
            $image = $this->uploadImage();

            $result = $this->Produit->update($_GET['id'], [
                'titre' => $_POST['titre'],
                'description' => $_POST['description'],
                'img' => ($image)? $image : $produit->img,
            ]);
                
            if($result){
                return $this->index();
            }
        }
        
        $this->loadModel('Category');
        $categories = $this->Category->extract('id', 'titre');

        $form = new BootstrapForm($produit);
        $this->render('admin.produits.edit', compact('categories', 'form'));
    }

    public function delete(){
        if (!empty($_POST)) {
            $result = $this->Produit->delete($_POST['id']);
            return $this->indexProduit();
        }
    }

    /*
    * Fonction d'enregistrement d'image 
    */
    public function uploadImage(){
        //Vérifier si le formulaire a été soumis
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            // Vérifie si le fichier a été uploadé sans erreur.
            if(isset($_FILES["img"]) && $_FILES["img"]["error"] == 0){

                $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                $filename = $_FILES["img"]["name"];
                $filetype = $_FILES["img"]["type"];
                $filesize = $_FILES["img"]["size"];
                
                // Vérifie l'extension du fichier
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if(!array_key_exists($ext, $allowed)) die("Erreur : Veuillez sélectionner un format de fichier valide.");

                // Vérifie la taille du fichier - 2Mo maximum
                $maxsize = 2 * 1024 * 1024;
                if($filesize > $maxsize) die("Error: La taille du fichier est supérieure à la limite autorisée 2Mo.");

                // Vérifie le type MIME du fichier
                if(in_array($filetype, $allowed)){
                    move_uploaded_file($_FILES["img"]["tmp_name"], "../public/img/upload/" . $_FILES["img"]["name"]);
                    //echo "Votre fichier a été téléchargé avec succès.";
                    return $filename;
                } else{
                    echo "Error: Il y a eu un problème de téléchargement de votre fichier. Veuillez réessayer."; 
                    return false;
                }
            } else{
                //echo "Error: " . $_FILES["img"]["error"];
                return false;
            }
        }
    }

}