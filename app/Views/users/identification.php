
<section class="identification">


    <form class="login" method="post" action="index.php?p=users.login">
        <h2 class="title-rubrique">Connexion</h2>
        <?= $form->input('email', 'Email', $option= [], $placeholder="E-mail"); ?>
        <?= $form->input('password', 'Mot de passe', ['type' => 'password'], $placeholder="Mot de passe"); ?>
        <button class="btn-form btn-primary">Se connecter</button>
    </form>

    <form class="sign-up" method="post" action="index.php?p=users.inscription">
        <h2 class="title-rubrique">Inscription</h2>
        <?= $form->input('nom', 'text', $option= [], $placeholder="Nom"); ?>
        <?= $form->input('prenom', 'text', $option= [], $placeholder="Prénom"); ?>
        <?= $form->input('adresse', 'textarea', $option= [], $placeholder="Adresse"); ?>
        <?= $form->input('email', 'Email', $option= [], $placeholder="E-mail"); ?>
        <?= $form->input('password', 'Mot de passe', ['type' => 'password'], $placeholder="Mot de passe"); ?>
        <button type="submit" class="btn-form btn-primary">S'inscrire</button>
    </form>

   
</section>