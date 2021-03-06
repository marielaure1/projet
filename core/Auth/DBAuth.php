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
        var_dump(password_hash($password, PASSWORD_DEFAULT));
        if($user){
            if(password_verify($password,$user->password )){
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
        if(isset($_SESSION["user"])){
            if($_SESSION['user']->role === 'ROLE_ADMIN'){
                return isset($_SESSION['auth']);
            }
        }
    }

}