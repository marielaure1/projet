<?php
namespace App\Entity;

use Core\Entity\Entity;

class NewsletterEntity extends Entity{

    public function getUrl(){
        return 'index.php?p=posts.newsletter&id=' . $this->id;
    }

    public function getId(){
        $html = '<p>' .$this->id . '...</p>';
        return $html;
    }

} 