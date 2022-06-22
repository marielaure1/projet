<?php

namespace App\Controller;

use Core\Controller\Controller;
use \App;

class NewsletterController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('Newsletter');

    }

    public function index(){
        $newsletters = $this->Newsletter->all();
        
        $this->render('newsletter.index', compact('newletters'));
    }
    

    public function category(){
        $categorie = $this->Category->find($_GET['id']);
        if($categorie === false){
            $this->notFound();
        }
        $produits = $this->Produit->lastByCategory($_GET['id']);
        $categories = $this->Category->all();
        $this->render('new', compact('newletters'));
    }

    public function show(){

        $produit = $this->Produit->findWithCategory($_GET['id']);
        App::getInstance()->title = $produit->titre;

        $this->render('produits.show', compact('produit'));
    }
}