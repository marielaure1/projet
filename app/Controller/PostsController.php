<?php

namespace App\Controller;

use Core\Controller\Controller;
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
        $this->loadModel('Produit');
    }

    public function index(){
        $posts = $this->Post->last();
        $categories = $this->Category->all();
        $form = new Form($_POST);
        $this->render('posts.index', compact('posts', 'categories', 'form'));
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
        $article = $this->Post->findWithCategory($_GET['id']);
        $this->render('posts.show', compact('article'));
    }

}