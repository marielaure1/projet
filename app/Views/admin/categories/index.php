<section class="admin-section dashboard">
    <h1>Catégories</h1>

    <form class="form-categorie">
        <?= $form->input('email', 'Email'); ?>
        <?= $form->input('password', 'Mot de passe', ['type' => 'password']); ?>
        <button class="btn btn-primary">Ajouter</button>
    </form>

    <p>
        <a href="?p=admin.categories.add" class="btn btn-success">Ajouter</a>
    </p>

    <table class="table">
        <thead>
        <tr>
            <td>ID</td>
            <td>Titre</td>
            <td>Actions</td>
        </tr>
        </thead>
        <tbody>

            <?php foreach($items as $category): ?>
            <tr>
                <td><?= $category->id; ?></td>
                <td><?= $category->nom; ?></td>
                <td>
                    <a class="btn btn-primary" href="?p=admin.categories.edit&id=<?= $category->id; ?>">Editer</a>
                    <form action="?p=admin.categories.delete" method="post" style="display: inline;">
                        <input type="hidden" name="id" value="<?= $category->id ?>">
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


</section>

