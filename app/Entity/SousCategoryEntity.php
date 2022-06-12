<?php
namespace App\Entity;

use Core\Entity\Entity;

class SousCategoryEntity extends Entity{

    public function getUrl(){
        return 'index.php?p=posts.souscategory&id=' . $this->id;
    }

}