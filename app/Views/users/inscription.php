<?php if($errors): ?>
    <div class="alert alert-danger">
        <?=$messageError?>
    </div>
<?php endif;?>



<form method="post">
    <div class="row">
      <h1>INSCRIPTION</h1>
      <div class="col-lg-6 col-12">
        <?= $form->input('prenom', 'Prénom'); ?>
      </div>
      <div class="col-lg-6 col-12">
        <?= $form->input('nom', 'Nom'); ?>
      </div>
      <div class="col-lg-6 col-12">
        <?= $form->input('email', 'Email', ['type' => 'email']); ?>
      </div>
      <div class="col-lg-6 col-12">
        <?= $form->input('password', 'Mot de passe', ['type' => 'password']); ?>
      </div>
      <div class="col-lg-2 col-12">
          <button class="btn btn-primary">Envoyer</button>
      </div>
    </div>
</form>