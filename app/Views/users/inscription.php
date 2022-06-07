<form class="sign-up" method="post">
        <h2 class="title-rubrique">Inscription</h2>
        <?= $form->input('nom', 'text', $option= [], $placeholder="Nom"); ?>
        <?= $form->input('penom', 'text', $option= [], $placeholder="Prénom"); ?>
        <?= $form->input('adresse', 'textarea', $option= [], $placeholder="Adresse"); ?>
        <?= $form->input('email', 'Email', $option= [], $placeholder="E-mail"); ?>
        <?= $form->input('password', 'Mot de passe', ['type' => 'password'], $placeholder="Mot de passe"); ?>
        <button type="submit" class="btn-form btn-primary">S'inscrire</button>
</form>