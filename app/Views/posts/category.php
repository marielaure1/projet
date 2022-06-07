<?php
$unwanted_array = array(    'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' );

?>

<main class="category">
    <?php $img = $categorie->nom;?>
    <section class="banner background-images" style="background-image: url('../public/images/<?= str_replace(" ", "-", strtr($img, $unwanted_array)) ?>/<?= $categorie->images ?>');">
        <div class="block">
            <h2><?= $categorie->nom ?></h2>
            <p><?= $categorie->descriptions ?></p>
        </div>
    </section>
    
    <div class="grid-produits">
    <?php foreach ($produits as $produit): ?>
        <div class="produit">
            <img src="../public/images/decorations/tapis/tapis1-hover.jpg" alt="" class="produit-img">
            <div class="produit-description">
                <h2 class="titre-produit"><?= $produit->nom; ?></h2>
                <div class="icon-favoris">
                    <img class="icon" src="../public/icon/icon-like.png" alt="icon heart">
                </div>
                <h3 class="description-produit"><?= $produit->descriptions; ?></h3>
                <p class="prix-produit"><?= $produit->prix; ?></p>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
    
</main>
