<?php
namespace App\Entity;

use Core\Entity\Entity;

class FavorisEntity extends Entity{

    public function getUrl(){
        return 'index.php?p=posts.favoris&id=' . $this->id;
    }

}