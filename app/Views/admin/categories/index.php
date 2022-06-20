<section class="admin-section categories">
    <h1>Catégories</h1>
    <div class="form-bg">
        <form method="post" action="index?p=admin.categories.add">
            <?= $form->input("nom", "Nom", $option = ["type" => "text"], $placeholder = "Nom de l'utilisateur") ?>
            <?= $form->input("images", "Images", $option = ["type" => "file"], $placeholder = "Images") ?>
            <?= $form->input("descriptions", "Description", $option = ["type" => "textarea"], $placeholder = "Description de la catégorie") ?>
            <?= $form->btnSubmit('btn-ajouter', "Envoyer") ?>
        </form>
    </div>

    <div class="table-bg listes">
        <div class="liste">
            <h3>Tous les catégories</h3>
            <table class="table">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Nom</td>
                        <td>Description</td>
                        <td>Images</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($categories as $categorie): ?>
                    <tr>
                        <td><?= $categorie->id; ?></td>
                        <td><?= $categorie->nom; ?></td>
                        <td><?= substr($categorie->descriptions, 0, 50); ?>...</td>
                        <td><?= $categorie->images; ?></td>
                        <td class="btns-actions">
                            <a class="btn btn-editer" href="?p=admin.categories.edit&id=<?= $categorie->id; ?>">Editer</a>
                            <form action="?p=admin.categories.delete" method="post" style="display: inline;">
                                <input type="hidden" name="id" value="<?= $categorie->id ?>">
                                <?= $form->btnSubmit('btn-supprimer', "Supprimer") ?>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>