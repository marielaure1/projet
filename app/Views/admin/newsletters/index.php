<section class="admin-section newsletter">
    <div class="block">
        <form action="">
            <?= $form->input("email", "E-mail", $option = ["type" => "email"], $placeholder = "Email", isset($errors["emailError"]) ? $errors["emailError"] : "") ?>
            <?= $form->input("password", "Mot de Passe", $option = ["type" => "password"], $placeholder = "Mot de Passe", isset($errors["passwordError"]) ? $errors["passwordError"] : "") ?>
            <?= $form->btnSubmit('btn-ajouter', "Envoyer") ?>
        </form>
    </div>
</section>