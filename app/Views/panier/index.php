<form class="panier" action="index.php?p=panier.recapitulatif" method="POST">
  <div class="liste-panier scroll">
    <h1 class="title-user">Panier</h1>
    <?php if(!empty($panier)){ ?>
    <div class="tableau">
      <div class="titre-column">
        <p>Produit</p>
        <p>Quantité</p>
        <p>Prix</p>
      </div>
      <?php foreach ($panier as $idProduit => $champs): ?>
      

      <!-- Lignes -->
      <div class="row-produit">
        <!-- INPUT HIDDEN -->
        <input type="hidden" id="produit-id-<?=$idProduit?>" name="produit-id-<?=$idProduit?>"  class="form-control" value="<?= $idProduit?>">
        <input type="hidden" id="produit-<?=$idProduit?>-total" name="produit-<?=$idProduit?>-total" class="form-control" value="<?= $champs['prix']* $champs['nbr']?>">
        <input type="hidden" id="commande-total" name="commande-total" class="form-control" value="<?=$prixTotalCommande?>">
        <div class="produit-panier">
        <?php foreach($images as $image):
                if($image->id_produits == $idProduit && $image->image_principale == true){ ?>
                  <div class="img-panier background-images" style="background-image: url('../public/images/<?= $image->fichier ?>')"></div> 
        <?php } endforeach; ?>
                      
          <div class="text-panier">
              <h2><?= $champs['nom'] ?></h2>
              <h3><?= $champs['descriptions'] ?></h3>
              <input type="text" id="produit-<?=$idProduit?>-unite-disabled" name="produit-<?=$idProduit?>-unite-disabled" class="form-control" value="Prix unitaire: <?=$champs['prix']?> €" readonly="">
          </div>
        </div>
        <div class="quantite-panier">
            <input type="number" id="produit-<?=$idProduit?>-nbr" name="produit-<?=$idProduit?>-nbr" class="form-control produit-nbr" value="<?=$champs['nbr']?>"  data-produit="<?=$idProduit?>" data-prix="<?=$champs['prix']?> " max="20" min="1">
        </div>
        <div class="prix-panier">
            <input type="text" id="produit-<?=$idProduit?>-total-disabled" name="produit-<?=$idProduit?>-total-disabled" class="form-control produit-total" value="<?=$champs['prix']* $champs['nbr']?>€" disabled="disabled">
        </div>
        <a class="delete-panier" href="index.php?p=panier.delete&id=<?= $idProduit?>">
          <img class="icon" src="../public/icon/icon-cross.svg" alt="">
        </a>
      </div> 
      <?php endforeach; ?>
    </div>
    <?php } else { ?>
        <p>Pas de panier</p>
    <?php }  ?>   
  </div> 


         
  <div class="recapitulatif">
      <h3>Récapitulatif</h3>
      <div class="block1">
          <p><span>Total des articles</span><span><input type="text" id="commande-total-disabled" name="commande-total-disabled" class="form-control" value="<?=$prixTotalCommande?> €" disabled="disabled"></span></p>
          <p><span>Frais de livraison</span><span>5 €</span></p>
      </div>
      <p class="total"><span>Total TVA incluse</span><span><input type="text" id="commande-total-disabled" name="commande-total-disabled" class="form-control" value="<?=$prixTotalCommande + 5 ?> €" disabled="disabled"></span></p>
      <button class="btn-commander">Commander</button>
      <h4><img src="../public/icon/icon-security.svg" alt=""><span>Modes de paiements</span></h4>
      <div class="modes-paiements">
          <img src="../public/icon/logos_visa.svg" alt="">
          <img src="../public/icon/logos_mastercard.svg" alt="">
          <img src="../public/icon/logos_paypal.svg" alt="">
      </div>
  </div>
</form>


     

<script>

  var elements = document.getElementsByClassName('produit-nbr');
  var prixCommande = document.getElementById('commande-total');
  var prixCommandeDisabled = document.getElementById('commande-total-disabled');
  var prixTotalCommande = 0;
  if(elements){
    window.addEventListener('change', changePrix)
  }

  function changePrix(){
    prixTotalCommande = 0;
    for (var i = 0; i < elements.length; i++) {

      var valeur = elements[i].value;
      var produit = elements[i].dataset.produit;
      var prix = elements[i].dataset.prix;
     
      var prixUnite = document.getElementById('produit-'+produit+'-total');
      var prixUniteDisabled = document.getElementById('produit-'+produit+'-total-disabled');

      var resulatPrixtotal = prix*valeur;

      prixUniteDisabled.setAttribute('value', resulatPrixtotal+"€")
      prixUnite.setAttribute('value', resulatPrixtotal)

      prixTotalCommande = prixTotalCommande + resulatPrixtotal;

      prixCommandeDisabled.setAttribute('value', prixTotalCommande+"€")
      prixCommande.setAttribute('value', prixTotalCommande)

    }

  }

</script>
