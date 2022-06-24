<section class="admin-section produits">
    <h1>Produits</h1>
    <div class="form-bg">
        <form method="post" enctype="multipart/form-data">
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
            <div>
                <?= $form->btnSubmit('btn-editer', "Editer") ?>
                <?php if(isset($displaySuccess) || isset($displayWarning)) {
                        if($displaySuccess === true){ ?>
                            <p class="success">L'utisateur a été modifié avec succès.</p>
                   <?php }else if($displayWarning === true){ ?>
                            <p class="warning">Un compte est déjà associé à cette email.</p>
                    <?php } 
                    }?>
            </div>
        </form>
    </div>
</section>