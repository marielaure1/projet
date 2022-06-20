<?php
namespace App\Table;

use Core\Table\Table;

class ProduitTable extends Table{

    protected $table = 'produits';

    /**
     * Récupère les derniers produits
     * @return array
     */
    public function last(){
        return $this->query("
            SELECT *
            FROM produits
            ORDER BY id DESC");
    }

    /**
     * Récupère les derniers produits de la category demandée
     * @param $category_id int
     * @return array
     */
    public function lastBySousCategory($sous_category_id){
        return $this->query("
            SELECT produits.nom, produits.descriptions, produits.details, produits.caracteristiques, produits.prix, produits.quantite, produits.publier, produits.id
            FROM produits
            LEFT JOIN sous_categories ON id_sous_categories = sous_categories.id
            WHERE produits.id_sous_categories = ?
            ORDER BY produits.id DESC", [$sous_category_id]);
    }

    /**
     * Récupère un produit en liant la catégorie associée
     * @param $id int
     * @return \App\Entity\ProduitEntity
     */
    public function findWithCategory($id){
        return $this->query("
            SELECT *
            FROM produits
            WHERE produits.id = ?", [$id], true);
    }
}