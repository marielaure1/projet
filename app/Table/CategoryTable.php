<?php
namespace App\Table;

use Core\Table\Table;

class CategoryTable extends Table{

    protected $table = "categories";

    public function editFind($id){
        return $this->query("SELECT nom, descriptions FROM categories WHERE id = ?", [$id], true);
    }


}