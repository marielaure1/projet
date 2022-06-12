<section class="admin-form" action="index.php?p=admin.produits.add">
    <h1>PRODUITS</h1>
    <form method="post">
        <?= $form->input("nom", "Nom", ["type" => "text"], "Nom du produit") ?>
        <?= $form->input("descriptions", "Description", ["type" => "textarea"], "Description") ?>
        <?= $form->input("prix", "Prix", ["type" => "text"], "Prix") ?>
        <?= $form->input("quantite", "Quantité", ["type" => "text"], "Quantité") ?>
        <?= $form->select("id_categories", "Catégorie", $categories) ?>
        <div class="form-check form-switch">
            <label class="form-check-label" for="publier">Publier ? </label>
            <input class="form-check-input" data-label-on="1" data-label-off="0" type="checkbox" role="switch" name="publier">
            <button class="btn btn-success">Ajouter</button>
        </div>
    </form>
</section>
<section class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <td>ID</td>
            <td>Nom</td>
            <td>Descriptions</td>
            <td>Prix</td>
            <td>Categories</td>
            <td>Publier</td>
            <td>Actions</td>
        </tr>
        </thead>
        <tbody>
            <?php foreach($produits as $produit): ?>
            <tr>
                <td><?= $produit->id; ?></td>
                <td><?= $produit->nom; ?></td>
                <td><?= $produit->descriptions; ?></td>
                <td><?= $produit->prix; ?></td>
                <td><?= $produit->id_categories; ?></td>
                <td><?= $produit->publier; ?></td>
                <td>
                    <a class="btn btn-primary" href="?p=admin.produits.edit&id=<?= $produit->id; ?>">Editer</a>
                    <form action="?p=admin.produits.deleteProduit" method="post" style="display: inline;">
                        <input type="hidden" name="id" value="<?= $produit->id ?>">
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</section>
