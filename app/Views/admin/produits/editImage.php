<section class="admin-section images">
    <h1>Images</h1>
    <div class="form-bg">
        <form method="post" enctype="multipart/form-data">
            <?= $form->select("id_produits", "Produits", $produits) ?>
            <div class="form-group">
                <input type="file" name="fichier" class="form-control">
            </div>
            <div class="form-group-radio">
                <div>
                    <h3>Image Principale ? </h3>
                </div>
                <?php if($image->image_principale == true){ ?>
                    <div>
                        <label for="oui">Oui</label>
                        <input type="radio" id="oui" name="image_principale" value="1" class="form-control" checked>
                    </div>
                    <div>
                        <label for="non">Non</label>
                        <input type="radio" id="non" name="image_principale" value="0" class="form-control">
                    </div>
                <?php } else { ?>
                        <div>
                        <label for="oui">Oui</label>
                        <input type="radio" id="oui" name="image_principale" value="1" class="form-control">
                    </div>
                    <div>
                        <label for="non">Non</label>
                        <input type="radio" id="non" name="image_principale" value="0" class="form-control" checked>
                    </div>
                <?php } ?>
            </div>

            <div class="form-group-radio">
                <div>
                    <h3>Publier ? </h3>
                </div>
                <?php if($image->publier == true){ ?>
                    <div>
                        <label for="oui">Oui</label>
                        <input type="radio" id="oui" name="publier" value="1" class="form-control" checked>
                    </div>
                    <div>
                        <label for="non">Non</label>
                        <input type="radio" id="non" name="publier" value="0" class="form-control">
                    </div>
                <?php } else { ?>
                    <div>
                        <label for="oui">Oui</label>
                        <input type="radio" id="oui" name="publier" value="1" class="form-control">
                    </div>
                    <div>
                        <label for="non">Non</label>
                        <input type="radio" id="non" name="publier" value="0" class="form-control" checked>
                    </div>
                <?php } ?>
            </div>
                <?= $form->btnSubmit('btn-editer', "Editer") ?>
            </div>
        </form>
    </div>
</section>