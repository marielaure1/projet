<section class="admin-section souscategories">
    <h1>Sous Catégories</h1>
    <div class="form-bg">
        <form method="post" action="index?p=admin.souscategories.add">
            <?= $form->input("nom", "Nom", $option = ["type" => "text"], $placeholder = "Nom de l'utilisateur") ?>
            <?= $form->select('id_categories', 'Catégorie', $categories) ?>
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
                        <td>ID Categories</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($souscategories as $souscategorie): ?>
                    <tr>
                        <td><?= $souscategorie->id; ?></td>
                        <td><?= $souscategorie->nom; ?></td>
                        <td><?= $souscategorie->id_categories; ?></td>
                        <td class="btns-actions">
                            <a class="btn btn-editer" href="?p=admin.souscategories.edit&id=<?= $souscategorie->id; ?>">Editer</a>
                            <form action="?p=admin.souscategories.delete" method="post" style="display: inline;">
                                <input type="hidden" name="id" value="<?= $souscategorie->id ?>">
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