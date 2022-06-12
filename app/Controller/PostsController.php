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
        $categorie = $this->Category->find($_GET['id']);
        if($categorie === false){
            $this->notFound();
        }
        $produits = $this->Post->lastByCategory($_GET['id']);
        $categories = $this->Category->all();
        $favoris = $this->Favoris->all();
        $images = $this->Image->all();

        $this->render('posts.category', compact('produits', 'categories', 'categorie', 'favoris', 'images'));
    }

    public function show(){
        $article = $this->Post->findWithCategory($_GET['id']);
        $this->render('posts.show', compact('article'));
    }

    public function favoris(){
        $form = new Form($_POST);
        $favoris = $this->Favoris->all();

        if(!empty($_POST)){
            foreach($favoris as $fav){
                if($fav->id_users == $_POST['id_users'] && $fav->id_produits == $_POST['id_produits'] ){
                    $this->Favoris->delete($_POST['id_users']);
                } else {
                    $this->Favoris->create([
                        'id_users' => $_POST['id_users'],
                        'id_produits' => $_POST['id_produits']
                    ]);
                }
            }
        }

        $this->render('posts.favoris', compact('form', 'favoris'));
    }

    public function favorisAction(){
        $favoris = $this->Favoris->all();
        $images = $this->Image->all();

        if(count($favoris) > 0){
            foreach($favoris as $fav){
                if($fav->id_users == $_POST['id_users'] && $fav->id_produits == $_POST['id_produits'] ){
                    $this->Favoris->delete($fav->id);
                } else {
                    $this->Favoris->create([
                        'id_users' => $_POST['id_users'],
                        'id_produits' => $_POST['id_produits']
                    ]);
                }
            }
        } else {
            $this->Favoris->create([
                'id_users' => $_POST['id_users'],
                'id_produits' => $_POST['id_produits']
            ]);
        }

        $this->render('posts.category', compact('produits', 'categories', 'categorie', 'favoris', 'images'));
    }
}