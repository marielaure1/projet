<header class="moncompte">
    <h1 class="title-user">Mon Compte</h1>
    <div class="filtre-user">
        <a href="index.php?p=users.account">Mes informations</a>
        <a class="active" href="index.php?p=users.commandes">Mes achats</a>
    </div>
</header>

<main id="commandes">
    <section class="tableau">
        <div class="title-tab">
            <p>Date</p>
            <p>Adresse</p>
            <p>Total</p>
            <p>Détails</p>
        </div>
        <div class="commandes">

            <?php foreach($commandes as $commande){ ?>
                <div class="commande-ligne">
                    <p>Date</p>
                    <p></p>
                    <p><?= $commande->prix_total?> €</p>
                    <a href="">Voir plus</a>
                </div>
        <?php } ?>
            
            <div class="tableau-commande-details">
                <div>
                    <p>Produits</p>
                    <p>Prix unitaire</p>
                    <p>Quantité</p>
                    <p>Total</p>
                    <p>Détails</p>
                </div>
                <div>
                    <p>04/06/22</p>
                    <p>12 rue de Lorem ipsum, 75019 Paris</p>
                    <p>300 €</p>
                    <a href="">Voir plus</a>
                </div>
            </div>
            <div class="commande-ligne">
                <p>04/06/22</p>
                <p>12 rue de Lorem ipsum, 75019 Paris</p>
                <p>300 €</p>
                <a href="">Voir plus</a>
            </div>
            <div class="tableau-commande-details">
                <div>
                    <p>Date</p>
                    <p>Adresse</p>
                    <p>Total</p>
                    <p>Détails</p>
                </div>
                <div>
                    <p>04/06/22</p>
                    <p>12 rue de Lorem ipsum, 75019 Paris</p>
                    <p>300 €</p>
                    <a href="">Voir plus</a>
                </div>
                <div>
                    <p>04/06/22</p>
                    <p>12 rue de Lorem ipsum, 75019 Paris</p>
                    <p>300 €</p>
                    <a href="">Voir plus</a>
                </div> <div>
                    <p>04/06/22</p>
                    <p>12 rue de Lorem ipsum, 75019 Paris</p>
                    <p>300 €</p>
                    <a href="">Voir plus</a>
                </div> <div>
                    <p>04/06/22</p>
                    <p>12 rue de Lorem ipsum, 75019 Paris</p>
                    <p>300 €</p>
                    <a href="">Voir plus</a>
                </div>
            </div><div class="commande-ligne">
                <p>04/06/22</p>
                <p>12 rue de Lorem ipsum, 75019 Paris</p>
                <p>300 €</p>
                <a href="">Voir plus</a>
            </div>
            <div class="tableau-commande-details">
                <div>
                    <p>Date</p>
                    <p>Adresse</p>
                    <p>Total</p>
                    <p>Détails</p>
                </div>
                <div>
                    <p>04/06/22</p>
                    <p>12 rue de Lorem ipsum, 75019 Paris</p>
                    <p>300 €</p>
                    <a href="">Voir plus</a>
                </div>
            </div>
        </div>
    </section>
</main>