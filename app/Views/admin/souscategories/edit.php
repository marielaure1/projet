<section class="admin-section souscategories">
    <h1>Sous Catégories</h1>
    <div class="form-bg">
        <form method="post"  enctype="multipart/form-data">
            <?= $form->input("nom", "Nom", $option = ["type" => "text"], $placeholder = "Nom de l'utilisateur") ?>
            <?= $form->select('id_categories', 'Catégorie', $categories) ?>
            <div>
                <?= $form->btnSubmit('btn-editer', "Editer") ?>
            </div>
        </form>
    </div>
</section>