<section class="admin-section dashboard">
    <h1>PRODUITS</h1>
    <form method="post">
        <?= $form->input("nom", "Nom", ["type" => "text"], "Nom du produit") ?>
        <?= $form->input("descriptions", "Description", ["type" => "textarea"], "Description") ?>
        <?= $form->input("prix", "Prix", ["type" => "text"], "Prix") ?>
        <?= $form->input("quantite", "Quantité", ["type" => "text"], "Quantité") ?>
        <?= $form->input("publier", "Publier ?", ["type" => "radio"]) ?>
        <?= $form->input("categorie_id", "Catégorie", ["type" => "select"]) ?>
        <p>
    <a href="?p=admin.produits.add" class="btn btn-success">Ajouter</a>
</p>
    </form>
</section>

<table class="table">
    <thead>
    <tr>
        <td>ID</td>
        <td>Nom</td>
        <td>Descriptions</td>
        <td>Prix</td>
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
            <td>
                <a class="btn btn-primary" href="?p=admin.produits.edit&id=<?= $produit->id; ?>">Editer</a>
                <form action="?p=admin.produits.delete" method="post" style="display: inline;">
                    <input type="hidden" name="id" value="<?= $produit->id ?>">
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
