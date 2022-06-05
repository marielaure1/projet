<?php
namespace App\Table;

use Core\Table\Table;

class UserTable extends Table{

    protected $table = 'users';

    /**
     * Récupère les derniers article
     * @return array
     */
    public function last(){
        return $this->query("
            SELECT produits.id, produits.titre, produits.description, produits.date
            FROM articles
            ORDER BY produits.date DESC");
    }

    /**
     * Récupère les derniers produits de la category demandée
     * @param $category_id int
     * @return array
     */
    public function lastByCategory($category_id){
        return $this->query("
            SELECT produits.id, produits.titre, produits.contenu, produits.date
            FROM produits
            ORDER BY produits.date DESC");
    }

    /**
     * Récupère un produit en liant la catégorie associée
     * @param $id int
     * @return \App\Entity\ProduitEntity
     */
    public function findWithCategory($id){
        return $this->query("
            SELECT produits.id, produits.titre, produits.contenu, produits.date
            FROM produits");
    }
}