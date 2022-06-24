<section class="admin-section dashboard">
    <h1>DASHBOARD</h1>

    <div class="choix">
        <div>
            <p>Nombre d'utilisateurs</p>
            <p><?= count($users) ?></p>
        </div>
        <div>
            <p>Nombre de produits</p>
            <p><?= count($produits) ?></p>
        </div>
        <div>
            <p>Nombre de commandes</p>
            <p><?= count($commandes) ?></p>
        </div>
        <div>
            <p>Nombre d'inscrits à la newsletter</p>
            <p><?= count($newsletters) ?></p>
        </div>
    </div>

    <div class="table-bg">
       
    <?php if(count($users) > 0){?>
        <div class="listes">
        <div class="liste">
            <h3>Derniers utilisateurs inscrits</h3>
            <table class="table">
                <thead>
                    <tr>
                        <td>Nom</td>
                        <td>Prénom</td>
                        <td>Email</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($lastUsers as $user): ?>
                        <tr>
                            <td><?= $user->nom; ?></td>
                            <td><?= $user->prenom; ?></td>
                            <td><?= $user->email; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        </div>
    <?php } ?>

    <?php if(count($commandes) > 0){?>
        <div class="listes">
        <div class="liste">
            <h3>Dernières commandes</h3>
            <table class="table">
                <thead>
                    <tr>
                        <td>ID</td>   
                        <td>User</td>   
                        <td>Total</td>       
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($lastCommandes as $commande): ?>
                        <tr>
                            <td><?= $commande->id; ?></td>
                            <td><?= $commande->user_id; ?></td>
                            <td><?= $commande->prix_total; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        </div>
    <?php } ?>
    </div>
</section>



