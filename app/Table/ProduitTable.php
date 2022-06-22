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

    public function produitCategory($category_id){
        return $this->query("
            SELECT produits.nom, produits.descriptions, produits.details, produits.caracteristiques, produits.prix, produits.quantite, produits.publier, produits.id
            FROM produits
            LEFT JOIN sous_categories ON id_sous_categories = sous_categories.id
            LEFT JOIN categories ON id_categories = categories.id
            WHERE sous_categories.id_categories = ?
            ORDER BY produits.id DESC", [$category_id]);
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

    public function nouveaute(){
        return $this->query('SELECT * FROM produits ORDER BY id DESC LIMIT 4');
    }

    // public function tendance(){
    //     return $this->query('SELECT * FROM produits ORDER BY id DESC LIMIT 8');
    // }


    public function suggestions($sous_category_id){
        return $this->query("
            SELECT *
            FROM produits
            LEFT JOIN sous_categories ON id_sous_categories = sous_categories.id
            WHERE sous_categories.id = ?
            ORDER BY sous_categories.id DESC LIMIT 4", [$sous_category_id]);
    }
}