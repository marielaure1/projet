<section class="admin-section produits">
    <h1>Produits</h1>
    <div class="form-bg">
        <form method="post" action="index?p=admin.produits.addProduit">
            <?= $form->input("nom", "Nom", ["type" => "text"], "Nom du produit") ?>
            <?= $form->input("prix", "Prix", ["type" => "text"], "Prix") ?>
            <?= $form->input("quantite", "Quantité", ["type" => "text"], "Quantité") ?>
            <?= $form->select("id_sous_categories", "Sous Catégorie", $souscategories) ?>
            <?= $form->input("descriptions", "Description", ["type" => "text"], "Description") ?>
            <div class="form-group-radio">
                <div>
                    <h3>Publier ? </h3>
                </div>
                <div>
                    <label for="oui">Oui</label>
                    <input type="radio" id="oui" name="publier" value="1" class="form-control" checked>
                </div>
                <div>
                    <label for="non">Non</label>
                    <input type="radio" id="non" name="publier" value="0" class="form-control">
                </div>
            </div>
            <?= $form->input("details", "Détails", ["type" => "textarea"], "Détails") ?>
            <?= $form->input("caracteristiques", "Caractéristiques", ["type" => "textarea"], "Caractéristiques") ?>
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
                        <td>Descriptions</td>
                        <td>Prix</td>
                        <td>Sous Categories</td>
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
                        <td><?= $produit->prix; ?> €</td>
                        <td><?= $produit->id_sous_categories; ?></td>
                        <td><?php if($produit->publier == 1){
                                    echo "Oui";
                                } else if($produit->publier == 0){
                                    echo "Non";
                                } ?>
                        </td>
                        <td class="btns-actions">
                            <a class="btn btn-editer" href="?p=admin.produits.edit&id=<?= $produit->id; ?>">Editer</a>
                            <form action="?p=admin.produits.delete" method="post" style="display: inline;">
                                <input type="hidden" name="id" value="<?= $produit->id ?>">
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