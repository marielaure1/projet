<main class="category">
<?php
$unwanted_array = array(    'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' );

?>
    <?php $img = $categorie->nom;
          $categorie_dossier = $categorie->nom;
    ?>
    <section class="banner background-images" style="background-image: url('../public/images/<?= str_replace(" ", "-", strtr($img, $unwanted_array)) ?>/<?= $categorie->images ?>');">
        <div class="block">
            <h2><?= $categorie->nom ?></h2>
            <p><?= $categorie->descriptions ?></p>
        </div>
    </section>
     <section  class="sous-categories">
            <a class="filtre-nom active" href="index.php?p=posts.category&id=<?= $_GET["id"] ?>">Tout</a>
        <?php foreach($souscategories as $souscat){ ?>
            <a class="filtre-nom" href="index.php?p=posts.category&id=<?= $_GET["id"] ?>&souscategories=<?= $souscat->id ?>"><?= $souscat->nom ?></a>
             <?php } ?>
     </section>
   
    
    <section class="produits-categorie">
        <div class="grid-produits">

        <?php
        foreach ($produits as $produit): ?>
            <div class="produit">
            <?php foreach ($images as $image): 
                if($image->id_produits == $produit->id && $image->image_principale == true){ ?>
                    <img src="../public/images/<?= str_replace(" ", "-", strtr($categorie_dossier, $unwanted_array)) ?>/<?= $image->fichier ?>" alt="" class="produit-img">
                <?php } endforeach; ?>
                <div class="produit-description">
                    <h2 class="titre-produit"><a href="index.php?p=posts.show&id=<?= $produit->id ?>'"><?= $produit->nom; ?></a></h2>
                    <div class="icon-favoris"> 
                        <a href="index.php?p=users.favorisApplication&user=<?=$_SESSION["auth"]?>&produit=<?=$produit->id?>">
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