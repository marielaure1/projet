<?php

namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;

class NewslettersController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('User');
    }

    public function index(){
        $users = $this->User->all();
        $form = new BootstrapForm($_POST);
        $this->render('admin.newsletters.index', compact('users', 'form'));
    }

 

}