<?php
namespace App\Table;

use Core\Table\Table;

class UserTable extends Table{

    protected $table = 'users';
    
    public function threeLast(){
        return $this->query('SELECT * FROM users ORDER BY id DESC LIMIT 5');
    }

    public function userExist(){
        return $this->query('SELECT * FROM users WHERE email = ?', [$_POST["email"]]);
    }

    public function editFind($id){
        return $this->query("SELECT nom, prenom, email, telephone, adresse, role FROM {$this->table} WHERE id = ?", [$id], true);
    }

}