<section class="admin-section categories">
    <h1>Catégories</h1>
    <div class="form-bg">
        <form method="post" enctype="multipart/form-data" action="index.php?p=admin.categories.index">
            <?= $form->input("nom", "Nom", $option = ["type" => "text"], "Nom du produit") ?>
            <?= $form->input("descriptions", "Description", $option = ["type" => "textarea"], $placeholder = "Description de la catégorie") ?>
            <?= $form->input("images", "Images", $option = ["type" => "file"]) ?>
            <div>
                <?= $form->btnSubmit('btn-editer', "Editer") ?>
            </div>
        </form>
    </div>
</section>