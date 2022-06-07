<?php
namespace App\Entity;

use Core\Entity\Entity;

class ProduitEntity extends Entity{

    public function getUrl(){
        return 'index.php?p=produits.show&id=' . $this->id;
    }

    public function getExtrait(){
        $html = '<p>' . substr($this->description, 0, 100) . '...</p>';
        $html .= '<p><a href="' . $this->getURL() . '">Voir la suite</a></p>';
        return $html;
    }

}