<section class="admin-section images">
    <h1>Images</h1>
    <div class="form-bg">
        <form method="post" action="index?p=admin.produits.addImage">
            <?= $form->select("id_produits", "Produits", $produits) ?>
            <?= $form->input("fichier", "Images", $option = ["type" => "file"], $placeholder = "Images") ?>
            <div class="form-group-radio">
                <div>
                    <h3>Image Principale ? </h3>
                </div>
                <div>
                    <label for="oui">Oui</label>
                    <input type="radio" id="oui" name="image_principale" value="1" class="form-control" checked>
                </div>
                <div>
                    <label for="non">Non</label>
                    <input type="radio" id="non" name="image_principale" value="0" class="form-control">
                </div>
            </div>

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
                        <td>Fichier</td>
                        <td>Image Principale</td>
                        <td>Publier</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($images as $image): ?>
                    <tr>
                        <td><?= $image->id; ?></td>
                        <td><?= $image->fichier; ?></td>
                        <td><?php if($image->image_principale == 1){
                                    echo "Oui";
                                } else if($image->image_principale == 0){
                                    echo "Non";
                                } ?>
                        </td>
                        <td><?php if($image->publier == 1){
                                    echo "Oui";
                                } else if($image->publier == 0){
                                    echo "Non";
                                } ?>
                        </td>
                        <td class="btns-actions">
                            <a class="btn btn-editer" href="?p=admin.produits.editImage&id=<?= $image->id; ?>">Editer</a>
                            <form action="?p=admin.produits.deleteImage" method="post" style="display: inline;">
                                <input type="hidden" name="id" value="<?= $image->id ?>">
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