<form method="post" enctype="multipart/form-data">

    <?= $form->input('titre', 'Titre de l\'article'); ?>

    <?= $form->input('img', 'image du produit', ['type' => 'file']); ?>

    <?= $form->input('description', 'description', ['type' => 'textarea']); ?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>