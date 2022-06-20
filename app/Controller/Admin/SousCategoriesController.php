<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;

class SousCategoriesController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('SousCategory');
        $this->loadModel('Category');
    }

    public function index(){
        $souscategories = $this->SousCategory->all();
        $form = new BootstrapForm($_POST);
        $categories = $this->Category->extract('id', 'nom');
        $this->render('admin.souscategories.index', compact('souscategories', 'categories', 'form'));
    }

    public function add(){
        if (!empty($_POST)) {
            $result = $this->SousCategory->create([
                'nom' => $_POST['nom'],
                'id_categories' => $_POST['id_categories']
            ]);
            return $this->index();
        }
        $form = new BootstrapForm($_POST);
        $this->render('admin.souscategories.edit', compact('form'));
    }

    public function edit(){
        if (!empty($_POST)) {
            $result = $this->Category->update($_GET['id'], [
                'nom' => $_POST['nom'],
                'id_categories' => $_POST['id_categories']
            ]);
            return $this->index();
        }
        $souscategories = $this->SousCategory->all();
        $form = new BootstrapForm($_POST);
        $this->render('admin.souscategories.edit', compact('form', "souscategories"));
    }

    public function delete(){
        if (!empty($_POST)) {
            $result = $this->SousCategory->delete($_POST['id']);
            return $this->index();
        }
    }

}