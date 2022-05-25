<?php if($errors): ?>
    <div class="alert alert-danger">
        <?=$messageError?>
    </div>
<?php endif; ?>

<form method="post">
    <div class="row">
      <div class="col-lg-6 col-12">
        <?= $form->input('firstname', 'Prénom'); ?>
      </div>
      <div class="col-lg-6 col-12">
        <?= $form->input('lastname', 'Nom'); ?>
      </div>
      <div class="col-lg-6 col-12">
        <?= $form->input('email', 'Email', ['type' => 'email']); ?>
      </div>
      <div class="col-lg-6 col-12">
        <?= $form->input('emailVerif', 'Confirmez Email', ['type' => 'email']); ?>
      </div>
      <div class="col-lg-6 col-12">
        <?= $form->input('tel', 'Téléphone', ['type' => 'tel', 'maxlength' => '10']); ?>
      </div>
      <div class="col-lg-6 col-12">
        <?= $form->input('username', 'Pseudo'); ?>
      </div>
      <div class="col-lg-6 col-12">
        <?= $form->input('password', 'Mot de passe', ['type' => 'password']); ?>
      </div>
      <div class="col-lg-6 col-12">
        <?= $form->input('passwordVerif', 'Confirmez Mot de passe', ['type' => 'password']); ?>
      </div>
      <div class="col-lg-2 col-12">
          <button class="btn btn-primary">Envoyer</button>
      </div>
    </div>
</form>