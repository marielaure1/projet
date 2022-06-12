<?php
namespace App\Entity;

use Core\Entity\Entity;

class CommandeEntity extends Entity{

    public function getUrl(){
        return 'index.php?p=commandes.show&id=' . $this->id;
    }

}