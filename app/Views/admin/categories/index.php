<section class="admin-section">
    <h1>Catégories</h1>
    <form method="post" action="index?p=admin.categories.add">
        <?= $form->input("nom", "Nom", ["type" => "text"], "Nom du produit") ?>
        <?= $form->input("descriptions", "Description", ["type" => "textarea"], "Description") ?>
        <?= $form->input("images", "Image", ["type" => "file"]) ?>
        <button class="btn btn-success">Ajouter</button>
    </form>
</section>
<table class="table">
    <thead>
    <tr>
        <td>ID</td>
        <td>Nom</td>
        <td>Descriptions</td>
        <td>Images</td>
        <td>Actions</td>
    </tr>
    </thead>
    <tbody>
        <?php foreach($categories as $categorie): ?>
        <tr>
            <td><?= $categorie->id; ?></td>
            <td><?= $categorie->nom; ?></td>
            <td><?= $categorie->descriptions; ?></td>
            <td><?= $categorie->images; ?></td>
            <td>
                <a class="btn btn-primary" href="?p=admin.categories.edit&id=<?= $categorie->id; ?>">Editer</a>
                <form action="?p=admin.categories.delete" method="post" style="display: inline;">
                    <input type="hidden" name="id" value="<?= $categorie->id ?>">
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>



