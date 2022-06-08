<form class="sign-up" method="post" action="index.php?p=users.inscription">
        <?= $form->input('nom', 'text', $option= [], $placeholder="Nom"); ?>
        <?= $form->input('penom', 'text', $option= [], $placeholder="Prénom"); ?>
        <?= $form->input('email', 'Email', $option= [], $placeholder="E-mail"); ?>
        <?= $form->input('password', 'Mot de passe', ['type' => 'password'], $placeholder="Mot de passe"); ?>
        <button type="submit" class="btn-form btn-primary">S'inscrire</button>
</form>