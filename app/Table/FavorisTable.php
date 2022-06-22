<?php
namespace App\Table;

use Core\Table\Table;

class FavorisTable extends Table{

    protected $table = "favoris";

    public function findFavoris($id_user){
        return $this->query("
            SELECT favoris.id, favoris.id_users, favoris.id_produits
            FROM favoris
            LEFT JOIN users ON id_users = users.id
            WHERE favoris.id_users = ? ", [$id_user]);
    }

    public function lastBySousCategory($sous_category_id){
        return $this->query("
            SELECT produits.nom, produits.descriptions, produits.details, produits.caracteristiques, produits.prix, produits.quantite, produits.publier, produits.id
            FROM produits
            LEFT JOIN sous_categories ON id_sous_categories = sous_categories.id
            WHERE produits.id_sous_categories = ?
            ORDER BY produits.id DESC", [$sous_category_id]);
    }

}