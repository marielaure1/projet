
<main class="show">
    <section class="fiche">
        <div class="slider-produit scroll"> <?php
            foreach($images as $image){
                if($image->publier == true){ ?>
                    <img src="../public/images/<?= $image->fichier ?>" alt="">
            <?php  }
            }
       ?> </div>
        <div class="fiche-text">
            <div class="block">
                <div class="block1">
                    <h2><?= $produit->nom ?></h2>
                    <div class="icon-favoris">
                        <img class="icon icon-fav" src="../public/icon/icon-favoris-off.svg" alt="icon heart">
                    </div>
                </div>
                <h3 class="descriptions"><?= $produit->descriptions ?></h3>
                <p class="details"><?= $produit->details ?></p>
            </div>
            <form method="post" action="index.php?p=panier.add">
               <input type="hidden" name="idProduit" value="<?=$_GET['id']?>">
               <input type="hidden" id="prix" name="prix" value="<?= $produit->prix ?>"> 
               <input type="hidden" name="nom" value="<?= $produit->nom ?>"> 
               <input type="hidden" name="descriptions" value="<?= $produit->descriptions ?>">

                <p class="prix"><span class="prixTotal" ><?= $produit->prix ?></span> €</p>
                <div class="quantite">
                    <button type="button" id="moins" class="btn-quantity">-</button>
                    <input type="text" id="nb" name="nbr" readonly="" value="1">
                    <button type="button" id="plus" class="btn-quantity">+</button>
                </div>

                <div class="panier-produit">
                    <input type="submit" value="Ajouter au panier">
                </div>

            </form>
        </div>
    </section>
    <section class="caracteristique">
        <div class="caract">
            <h3><span>Caractéristiques</span><img class="btn-caract" src="../public/icon/plus.svg" alt=""></h3>
            <p class="text-caract"><?= $produit->caracteristiques ?></p>
        </div>
    </section>
    <section class="suggestions">
        <h2 class="title-rubrique">Suggestions</h2>
        <div class="grid-produits">
            <?php
                $suggestions = $this->Produit->suggestions($produit->id_sous_categories);
           
            foreach($suggestions as $suggestion){
                foreach($images as $image){
                    if($image->image_principale == true && $suggestion->id != $_GET["id"] ){ ?>
                        <div class="produit">
                            <img src="../public/images/<?= $image->fichier ?>" alt="" class="produit-img">
                            <div class="produit-description">
                            <h2 class="titre-produit"><?= $suggestion->nom ?></h2>
                            <div class="icon-favoris"> 
                                <a href="index.php?p=users.favorisApplication&user=<?=$_SESSION["auth"]?>&produit=<?=$produit->id?>">
                                    <img class='icon icon-fav active' src='../public/icon/icon-favoris-off.svg' alt='icon heart'>
                                </a>
                            </div>
                            <h3 class="description-produit"><?= $suggestion->descriptions ?></h3>
                            <p class="prix-produit"><?= $suggestion->prix ?> €</p>
                        </div> 
                    </div>
            <?php } } } ?>
        </div>
    </section>
</main>

<script> 
    const btnCaract = document.querySelector(".btn-caract")
    const TextCaract = document.querySelector(".text-caract")

    btnCaract.addEventListener("click", () => {
        btnCaract.classList.toggle("active")
        TextCaract.classList.toggle("active")
    })

</script>
