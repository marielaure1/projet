<?php

// ProduitTable

public function threeProduits(){
    return $this->query("
        SELECT *
        FROM produits
        ORDER BY id DESC 3");
}

// CategorieTable

public function threeCategories(){
    return $this->query("
        SELECT *
        FROM categories
        ORDER BY id DESC 3");
}

// PostsController

public function index(){
    $produits = $this->Produit->threeProduits();
    $produits = $this->Category->threeCategories();
    $this->render('posts.index', compact('images', 'nouveautes', 'categories','souscategories','produits', 'form', "favoris"));
}

// Page Index

foreach($categories as $categorie){ ?>
    <h2 ><?= $categorie->nom?></h2>
    <?php foreach($produits as $produit){ 
     if($produit->id_categories == $categorie->id){ ?>
         <div class="grid-produits">
    <div class="produit">
        <img src="" alt="" class="produit-img">
        <div class="produit-description">
            <h2 class="titre-produit"><?= $produit->nom ?></h2>
            <div class="icon-favoris">
                <img class="icon icon-fav" src="../public/icon/icon-favoris-off.svg" alt="icon heart">
            </div>
            <h3 class="description-produit"><?= $produit->descriptions ?></h3>
            <p class="prix-produit"><?= $produit->prix ?> €</p>
        </div>
    </div>
</div>
<?php } } } ?>

