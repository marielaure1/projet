<?php
namespace App\Entity;

use Core\Entity\Entity;

class CategoryEntity extends Entity{

    public function getUrl(){
        return 'index.php?p=posts.category&id=' . $this->id;
    }

    public function getUrls($id){
        return 'index.php?p=posts.category&id=' . $id;
    }

    public function getTitre(){
        $html = '<p>...</p>';
        return $html;
    }

}