<?php

namespace App\Controller\Admin;

use Core\HTML\Form;

class CategoriesController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('Category');
    }

    public function index(){
        $categories = $this->Category->all();
        $form = new Form($_POST);
        $this->render('admin.categories.index', compact('categories', "form"));
    }

    public function add(){
        if (!empty($_POST)) {
            $result = $this->Category->create([
                'titre' => $_POST['titre'],
            ]);
            return $this->index();
        }
        $form = new Form($_POST);
        $this->render('admin.categories.edit', compact('form'));
    }

    public function edit(){
        if (!empty($_POST)) {
            $result = $this->Category->update($_GET['id'], [
                'titre' => $_POST['titre'],
            ]);
            return $this->index();
        }
        $category = $this->Category->find($_GET['id']);
        $form = new Form($category);
        $this->render('admin.categories.edit', compact('form'));
    }

    public function delete(){
        if (!empty($_POST)) {
            $result = $this->Category->delete($_POST['id']);
            return $this->index();
        }
    }

}