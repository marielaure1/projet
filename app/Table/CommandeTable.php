<?php
namespace App\Table;

use Core\Table\Table;

class CommandeTable extends Table{

    protected $table = "commandes";

    public function threeLast(){
        return $this->query('SELECT * FROM commandes ORDER BY id DESC LIMIT 5');
    }

}