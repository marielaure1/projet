<?php

namespace App\Controller;

use Core\Controller\Controller;
use \App;

class FavorisController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('Favoris');
        $this->loadModel('Produit');
        $this->loadModel('Users');
    }

    public function index(){
        $produits = $this->Produit->last();
        $categories = $this->Category->all();
        
        $this->render('produits.index', compact('produits', 'categories'));
    }
    

    public function category(){
        $categorie = $this->Category->find($_GET['id']);
        if($categorie === false){
            $this->notFound();
        }
        $produits = $this->Produit->lastByCategory($_GET['id']);
        $categories = $this->Category->all();
        $this->render('posts.category', compact('produits', 'categories', 'categorie'));
    }

    public function show(){

        $produit = $this->Produit->findWithCategory($_GET['id']);
        App::getInstance()->title = $produit->titre;

        $this->render('produits.show', compact('produit'));
    }

}