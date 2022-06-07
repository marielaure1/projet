<section class="identification">
    <?php if($errors): ?>
        <div class="alert-error">
            Identifiants incorrects
        </div>
    <?php endif; ?>

    <form class="login" method="post">
        <h2 class="title-rubrique">Connexion</h2>
        <?= $form->input('email', 'Email', $option= [], $placeholder="E-mail"); ?>
        <?= $form->input('password', 'Mot de passe', ['type' => 'password'], $placeholder="Mot de passe"); ?>
        <button class="btn-form btn-primary">Se connecter</button>
    </form>

    <?php include_once ROOT . '/app/Views/users/inscription.php'; ?>

   
</section>