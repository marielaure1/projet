
<main class="show">
    <section class="fiche">
        <div class="slider-produit scroll"> <?php
            foreach($images as $image){ ?>
                <img src="../public/images/salon/<?= $image->fichier ?>" alt=""> <?php
                if($image->image_principale == true){ ?>_
                    <img src="<?= $image->fichier ?>" alt="">
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
            
           <div class="block2">
                <p class="prix"><?= $produit->prix ?> €</p>
                <div class="quantite">
                    <p class="moins">-</p>
                    <p class="nombre">1</p>
                    <p class="plus">+</p>
                </div>
                <form class="panier-produit" action="">
                    <input type="hidden" value="id">
                    <input type="submit" value="Ajouter au panier">
                </form>
           </div>
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
        <div class="produit">
            <img src="../public/images/salon/iona-meridienne2.jpg" alt="" class="produit-img">
            <div class="produit-description">
                <h2 class="titre-produit">IONA</h2>
                <div class="icon-favoris"> 
                    <a href="index.php?p=users.favorisApplication&user=<?=$_SESSION["auth"]?>&produit=<?=$produit->id?>">
                        <img class='icon icon-fav active' src='../public/icon/icon-favoris-off.svg' alt='icon heart'>
                    </a>
                </div>
                <h3 class="description-produit">Méridienne,  orange</h3>
                <p class="prix-produit">200 €</p>
            </div> 
        </div> <div class="produit">
            <img src="../public/images/salon/iona-meridienne2.jpg" alt="" class="produit-img">
            <div class="produit-description">
                <h2 class="titre-produit">IONA</h2>
                <div class="icon-favoris">
                    <img class="icon icon-fav" src="../public/icon/icon-favoris-off.svg" alt="icon heart">
                </div>
                <h3 class="description-produit">Méridienne,  orange</h3>
                <p class="prix-produit">200 €</p>
            </div> 
        </div> <div class="produit">
            <img src="../public/images/salon/iona-meridienne2.jpg" alt="" class="produit-img">
            <div class="produit-description">
                <h2 class="titre-produit">IONA</h2>
                <div class="icon-favoris">
                    <img class="icon icon-fav" src="../public/icon/icon-favoris-off.svg" alt="icon heart">
                </div>
                <h3 class="description-produit">Méridienne,  orange</h3>
                <p class="prix-produit">200 €</p>
            </div> 
        </div> <div class="produit">
            <img src="../public/images/salon/iona-meridienne2.jpg" alt="" class="produit-img">
            <div class="produit-description">
                <h2 class="titre-produit">IONA</h2>
                <div class="icon-favoris">
                    <img class="icon icon-fav" src="../public/icon/icon-favoris-off.svg" alt="icon heart">
                </div>
                <h3 class="description-produit">Méridienne,  orange</h3>
                <p class="prix-produit">200 €</p>
            </div> 
        </div>
        </div>
    </section>
</main>

<script defer> 
    const btnCaract = document.querySelector(".btn-caract")
    const TextCaract = document.querySelector(".text-caract")

    btnCaract.addEventListener("click", () => {
        btnCaract.classList.toggle("active")
        TextCaract.classList.toggle("active")
    })
</script>
