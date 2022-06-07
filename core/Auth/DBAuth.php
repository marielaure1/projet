<?php
namespace Core\Auth;

use Core\Database\Database;

/**
 * Class DBAuth
 * Préparer la session de l'utilisateur
 */
class DBAuth {

    private $db;

    public function __construct(Database $db){
        $this->db = $db;
    }
    
    /**
     * getUserId = Récupérer l'id de l'utilisateur
     * 
     */
    public function getUserId(){
        if($this->logged()){
            return $_SESSION['auth'];
        }
        return false;
    }

    /**
     * @param $username
     * @param $password
     * @return boolean
     */
    public function login($email, $password){
        $user = $this->db->prepare('SELECT * FROM users WHERE email = ?', [$email], null, true);
        var_dump(sha1($password));
        // Vérifier que l'email existe
        if($user){
            // Vérifier que le mot de passe associé à l'email dans la bdd correspond à celui donner par l'utilisateur
            if($user->password === sha1($password)){
                $_SESSION['auth'] = $user->id;
                $_SESSION['user'] = $user;
                return true;
            }
        }
        return false;
    }
    
    /**
     * logged() = Vérifier si un utilisateur est connecter
     */
    public function logged(){
        return isset($_SESSION['auth']);
    }

}