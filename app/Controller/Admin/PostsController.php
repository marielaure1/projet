<?php

namespace App\Controller\Admin;

use Core\HTML\Form;
use Core\Controller\Controller;
use \App;

class PostsController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Produit');
        $this->loadModel('User');
        $this->loadModel('Commande');
    }

    public function index(){
        $posts = $this->Post->all();
        $produits = $this->Produit->all();
        $users = $this->User->all();
        $commandes = $this->Commande->all();
        $lastUsers = $this->User->threeLast();
        $lastCommandes = $this->Commande->threeLast();
        $this->render('admin.posts.index', compact('posts', "produits", "users", "commandes", "lastUsers", "lastCommandes"));
    }
}