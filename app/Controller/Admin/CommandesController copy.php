<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;

class CommandesController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('Commande');
    }

    public function index(){
        if($_SESSION['user']->role != 'ROLE_ADMIN'){
            header('Location: index.php');
        }

        $produits = $this->Produit->all();
        $this->render('admin.commandes.index', compact('produits'));
    }

    public function add(){
        if($_SESSION['user']->role != 'ROLE_ADMIN'){
            header('Location: index.php');
        }

        if (!empty($_POST)) {
            //Enregistrement de l'image
            $image = $this->uploadImage();

            $result = $this->Produit->create([
                'titre' => $_POST['titre'],
                'description' => $_POST['description'],
                'date' => date('Ymd'),
                'img' => ($image)? $image : null, 
                'prix' => $_POST['prix'],
                'category_id' => $_POST['category_id'],
                'sous_category_id' => $_POST['sous_category_id']
            ]);
            if($result){
                return $this->index();
            }
        }

        $this->loadModel('Category');
        $this->loadModel('SousCategory');

        $categories = $this->Category->extract('id', 'titre');
        $sousCategories = $this->SousCategory->extract('id', 'titre');

        $form = new BootstrapForm($_POST);
        $this->render('admin.commandes.edit', compact('categories', 'sousCategories', 'form'));
    }



}