<?php
namespace App\Entity;

use Core\Entity\Entity;

class PostEntity extends Entity{

    public function getUrl(){
        return 'index.php?p=posts.show&id=' . $this->id;
    }

    public function getNom(){
        $html = '<p>' .$this->nom . '...</p>';
        return $html;
    }
    public function getDescriptions(){
        $html = '<p>' .$this->descriptions . '...</p>';
        return $html;
    }
    public function getPrix(){
        $html = '<p>' .$this->prix . '...</p>';
        return $html;
    }

} 