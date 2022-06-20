<?php

namespace App\Controller;

use Core\Auth\DBAuth;
use Core\HTML\Form;
use Core\HTML\BootstrapForm;
use \App;

class UsersController extends AppController {

    public function __construct(){
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Category');
        $this->loadModel('SousCategory');
        $this->loadModel('Produit');
        $this->loadModel('Favoris');
        $this->loadModel('Image');
        $this->loadModel('User');
    }

    public function login(){
        $errors = false;
        if(!empty($_POST)){
            $auth = new DBAuth(App::getInstance()->getDb());
            if($auth->login($_POST['email'], $_POST['password'])){
                if($_SESSION['user']->role === 'ROLE_ADMIN'){
                    // champ user 'role' administrateur
                    header('Location: index.php?p=admin.posts.index');
                    // champ user 'user'
                }else{
                    header('Location: index.php');
                }
            } else {
                $errors = true;
            }
        }
        $form = new Form($_POST);
        $this->render('users.identification', compact('form', 'errors'));
    }

    /*
    * fonction de déconnexion de l'utilisateur
    */
    public function logout(){
  
        $this->render('users.logout');
    }

    public function identification(){
        if(isset($_SESSION["auth"])){
            $this->notFound();
        } else {
            $form = new BootstrapForm($_POST);
            $errors = false;
            $this->render('users.identification', compact('form', 'errors'));
        }
        
    }


    /*
    * fonction d'inscription de l'utilisateur
    */

    public function inscription(){
        $errors = false;
        $messageError = null;

        if(!empty($_POST)){
            // Vérification des champs de manière générale
            if(empty($_POST['prenom']) || 
            empty($_POST['nom']) || 
            empty($_POST['email']) ||
            empty($_POST['adresse'] ) ||
            empty($_POST['password'])
               ){
                $errors = true;
                $messageError = "Veuillez remplir tous les champs";
            } else{
                if(preg_match("/[0-9\[^\'£$%^&*()}{@:\'#~?><>,;@\|\-=\-_+\-¬\`\]]/", $_POST["nom"])){
                    $errors = true;
                }
                
                if(preg_match("/[0-9\[^\'£$%^&*()}{@:\'#~?><>,;@\|\=\_+\¬\`\]]/", $_POST["prenom"])){
                    $errors = true;
                }
                 
                if(isset($_POST["telephone"]) && preg_match("/[a-zA-z\[^\'£$%^&*()}{@:\'#~?><>,;@\|\=\_+\¬\`\]]/", $_POST["telephone"]) || strlen( $_POST["telephone"]) != 10){
                    $errors = true;
                }
    
                if(!preg_match('@[A-Z]@', $_POST["password"]) || !preg_match('@[a-z]@', $_POST["password"]) || !preg_match('@[0-9]@', $_POST["password"]) || !strlen($_POST["password"]) >= 8){
                    $errors = true;
                }
            } 
                  
            if(!$errors){
                $this->registration($_POST);
            } 
        }
        $form = new Form($_POST);
        $this->render('users.identification', compact('form', 'errors', 'messageError'));
    }

    public function registration($donnees){
        if (!empty($donnees)) {
            $result = $this->User->create([
                'prenom' => $_POST['prenom'],
                'nom' => $_POST['nom'],
                'email' => $_POST['email'],
                'adresse' => $_POST['adresse'],
                'telephone' => "",
                'role' => 'ROLE_USER',
                'password' => sha1($_POST['password']),
            ]);
            if($result){
                header('Location: index.php?p=users.inscription');
            }
        }
    }

    public function favoris(){
        $form = new Form($_POST);
        $favoris = $this->Favoris->all();

        $this->render('users.favoris', compact('form', 'favoris'));
    }

    public function favorisApplication(){
        $favoris = $this->Favoris->all();
        $favorisUser = $this->Favoris->findFavoris($_GET["user"]);
        var_dump($_GET);

        if(!empty($_GET)){
            foreach($favorisUser as $fav){
                var_dump($favorisUser);
                if($fav->id_produits == $_GET['produit']){
                    $this->Favoris->delete($fav->id);
                    echo "delete";
                    break;
                } else {
                    $this->Favoris->create([
                        'id_users' => $_GET['user'],
                        'id_produits' => $_GET['produit']
                    ]);
                    echo "create";
                    break;
                }
            }
            if(count($favoris) == 0){
                $this->Favoris->create([
                    'id_users' => $_GET['user'],
                    'id_produits' => $_GET['produit']
                ]);

                echo "create first";
            }
        }

        // if(!empty($_GET)){
        //     var_dump($_GET);

        //     if(count($favoris) > 0){
        //         foreach($favoris as $fav){
        //             if($fav->id_users == $_POST['id_users'] && $fav->id_produits == $_POST['id_produits'] ){
        //                 $this->Favoris->delete($fav->id);
        //                 var_dump("existe deja donc delete");
        //                 return ;
        //             } else {
        //                 $this->favorisAction($_POST);
        //                 var_dump("existe pas donc create");
        //                 return ;
        //             }
        //         }
        //     } else {
        //         $this->favorisAction($_POST);
        //         var_dump($_POST);
        //         var_dump("create premier favoris");
        //         return ;
        //     }
        // }

        // var_dump("vide");
        // header("Location:".$_SERVER[HTTP_REFERER]."");
        // die;
    }

    public function favorisAction($donnees){
        if(!empty($donnees)){
            $result = $this->Favoris->create([
                'id_users' => $_POST['id_users'],
                'id_produits' => $_POST['id_produits']
            ]);
            if($result){
                header('Location: index.php?p=users.favorisApplication');
            }
        }
        
    }

    public function panier(){
        $this->render('users.panier');
    }
    public function account(){
        $this->render('users.account');
    }
}