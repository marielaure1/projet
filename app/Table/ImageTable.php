<?php
namespace App\Table;

use Core\Table\Table;

class ImageTable extends Table{

    protected $table = 'produits_images';
    
    public function produitImage($produit_id){
        return $this->query("
            SELECT *
            FROM produits_images
            LEFT JOIN produits ON id_produits = produits.id
            WHERE produits.id_produits = ? ", [$produit_id]);
    }
}