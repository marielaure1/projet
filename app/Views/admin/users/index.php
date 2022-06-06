<h1>Administrer les produits</h1>

<p>
    <a href="?p=admin.produits.add" class="btn btn-success">Ajouter</a>
</p>

<table class="table">
    <thead>
    <tr>
        <td>ID</td>
        <td>Image</td>
        <td>Titre</td>
        <td>Actions</td>
    </tr>
    </thead>
    <tbody>
        <?php foreach($produits as $produit): ?>
        <tr>
            <td><?= $produit->id; ?></td>
            <td><img src="../public/img/upload/<?= $produit->img; ?>" style="width: 10%;"></td>
            <td><?= $produit->titre; ?></td>
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

