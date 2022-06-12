<?php
namespace App\Table;

use Core\Table\Table;

class UserTable extends Table{

    protected $table = 'users';
    
    public function threeLast(){
        return $this->query('SELECT * FROM users ORDER BY id DESC LIMIT 5');
    }

}