<form method="post">
    <?= $form->input("nom", "Nom", ["type" => "text"], "Nom du produit", $category->nom) ?>
    <?= $form->input("descriptions", "Description", ["type" => "textarea"], "Description") ?>
    <?= $form->input("images", "Image", ["type" => "file"]) ?>
    <button class="btn btn-success">Modifier</button>
</form>