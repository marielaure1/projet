<main class="category">
    <section class="banner background-images" style="background-image: url('../public/images/<?= $categorie->images ?>');">
        <div class="block">
            <h2><?= $categorie->nom ?></h2>
            <p><?= $categorie->descriptions ?></p>
        </div>
    </section>
     <section id="filtre" class="sous-categories">
            <a class="filtre-nom active" href="index.php?p=posts.category&id=<?= $_GET["id"] ?>&#filtre">Tout</a>
        <?php foreach($souscategories as $souscat){ 
            $produitss = $this->Produit->lastBySousCategory($souscat->id);
                if(count($produitss) > 0){ ?>
                    <a class="filtre-nom" href="index.php?p=posts.category&id=<?= $_GET["id"] ?>&souscategories=<?= $souscat->id ?>&#filtre"><?= $souscat->nom ?></a>
                <?php } } ?>
     </section>
   
    
    <section class="produits-categorie">
        <div class="grid-produits">

        <?php
        // spacedesk

        foreach ($produits as $produit): ?>
            <div class="produit">
            <?php foreach ($images as $image): 
                if($image->id_produits == $produit->id && $image->image_principale == true){ ?>
                    <img src="../public/images/<?= $image->fichier ?>" alt="" class="produit-img">
                <?php } endforeach; ?>
                <div class="produit-description">
                    <h2 class="titre-produit"><a href="index.php?p=posts.show&id=<?= $produit->id ?>"><?= $produit->nom; ?></a></h2>
                    <div class="icon-favoris">
                        <a onClick="ajoutFavoris(<?= $_SESSION["auth"] ?>, <?= $produit->id ?>)">
                            <img class='icon icon-fav active' src='../public/icon/icon-favoris-off.svg' alt='icon heart'>
                        </a>
                    </div>
                    <h3 class="description-produit"><?= $produit->descriptions; ?></h3>
                    <p class="prix-produit"><?= $produit->prix; ?> €</p>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </section>
    
</main>

<!--  && $fav->id_produits == $produit->id -->
<!-- $fav->id_users == $_SESSION["auth"] &&  -->