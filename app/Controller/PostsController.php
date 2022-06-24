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

    public function errorpage(){
        $categories = $this->Category->all();
        $this->render('posts.errorpage', compact("categories"));
    }
    
}