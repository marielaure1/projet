<main class="contact">
    <div class="coords background-images">
        <div class="block">
            <p><img src="../public/icon/icon-localisation.svg" alt=""><span>19 Rue Yves Toudic, 75010 Paris</span></p>
            <p><img src="../public/icon/icon-telephone.svg" alt=""><span>01 23 45 67 89</span></p>
            <p><img src="../public/icon/icon-mail.svg" alt=""><span>edjour.marielaure@gmail.com</span></p>
        </div>
    </div>
    <div class="formulaire">
        <form action="" method="POST" role="form">
            <h1>Contactez-nous</h1>
            <div>
                <?= $form->input("nom", "", "type => text", "Nom *", isset($errors["nomError"]) ? $errors["nomError"] : "") ?>
                <?= $form->input("prenom","", "type => text", "Prénom *",isset($errors["prenomError"]) ? $errors["prenomError"] : "") ?>
                <?= $form->input("telephone","", "type => tel", "Téléphone",isset($errors["telephoneError"]) ? $errors["telephoneError"] : "") ?>
                <?= $form->input("email","", "type => email", "Email *",isset($errors["emailError"]) ? $errors["emailError"] : "") ?>
                <?= $form->input("sujet","", "type => sujet", "Sujet *",isset($errors["sujetError"]) ? $errors["sujetError"] : "") ?>
                <?= $form->input("message","", "type => message", "Message *",isset($errors["messageError"]) ? $errors["messageError"] : "") ?>
                <div class="form-submit">
                    <input type="submit" class="btn-form" value="Envoyer">
                    <p class="success" style="display: <?=$display?>">Votre message a bien été envoyé.</p>
                </div> 
            </div>
        </form>
    </div>
</main>