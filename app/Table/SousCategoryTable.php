<?php
namespace App\Table;

use Core\Table\Table;

class SousCategoryTable extends Table{

    protected $table = "sous_categories";

    public function allByCategory($category_id){
        return $this->query("
            SELECT sous_categories.nom, sous_categories.id
            FROM sous_categories
            LEFT JOIN categories ON id_categories = categories.id
            WHERE sous_categories.id_categories = ?
            ORDER BY sous_categories.id", [$category_id]);
    }

}