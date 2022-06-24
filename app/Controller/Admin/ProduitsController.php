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
        $produits = $this->Produit->extractProduit('id', 'nom', "descriptions");
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
        }
        $form = new BootstrapForm($_POST);
        $this->render('admin.produits.indexProduit', compact('produits', 'form'));
    }

    public function addImage(){
        $produits = $this->Produit->extract('id', 'nom');
        $images = $this->Image->all();
        if (!empty($_POST)) {
            foreach($images as $image){
                if($image->id_produits == $_POST["id_produits"] && $image->image_principale == true){
                    $id = $image->id;
                    $this->Image->update($id, [
                        'image_principale' => 0
                    ]);
                }
            }

            $result = $this->Image->create([
                'id_produits' => $_POST['id_produits'],
                'fichier' => $_POST['fichier'],
                'image_principale' => $_POST['image_principale'],
                'publier' => $_POST['publier']
            ]);
        }
        $form = new BootstrapForm($_POST);
        $this->render('admin.produits.indexImage', compact('form', 'images', "produits"));
    }

    public function editProduit(){
        $success = false;
        $produit = $this->Produit->find($_GET['id']);

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $success = true;

            if($success){
                $result = $this->Produit->update($_GET['id'], [
                    'nom' => $_POST['nom'],
                    'descriptions' => $_POST['descriptions'],
                    'details' => $_POST['details'],
                    'caracteristiques' => $_POST['caracteristiques'],
                    'prix' => $_POST['prix'],
                    'quantite' => $_POST['quantite'],
                    'publier' => $_POST['publier'],
                    'id_sous_categories' => $_POST['id_sous_categories']
                ]);
            }
        }
        $souscategories = $this->SousCategory->extract('id', 'nom');
        

        $form = new BootstrapForm($produit);
        $this->render('admin.produits.editProduit', compact('souscategories', 'form'));
    }
    public function editImage(){
        $success = false;
        $image = $this->Image->find($_GET['id']);
        $produits = $this->Produit->extractProduit('id', 'nom', "descriptions");
        

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $success = true;
            
            if($success){
                $result = $this->Image->update($_GET['id'], [
                    'id_produits' => $_POST['id_produits'],
                    'fichier' => empty($_POST['fichier']) ? $image->fichier : $_POST['fichier'],
                    'image_principale' => $_POST['image_principale'],
                    'publier' => $_POST['publier']
                ]);
            }
        }

        $form = new BootstrapForm($image);
        $this->render('admin.produits.editImage', compact('form', 'image', 'produits'));
    }

    public function deleteProduit(){
        if (!empty($_POST)) {
            $images = $this->Image->produitImage($_POST['id']);
            foreach($images as $image){
                $deleteImage = $this->Image->delete($image->id);
            }
            $result = $this->Produit->delete($_POST['id']);
            return $this->indexProduit();
        }
    }
    public function deleteImage(){
        if (!empty($_POST)) {
            $result = $this->Image->delete($_POST['id']);
            return $this->indexImage();
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