<div class="global-mon-compte">
<header class="moncompte">
    <h1 class="title-user">Mon Compte</h1>
    <div class="filtre-user">
        <a class="active" href="index.php?p=users.account">Mes informations</a>
        <a href="index.php?p=users.commandes">Mes achats</a>
    </div>
</header>
<main id="account">
    <section class="modification">
        <div class="profil">
            <h4><span>Mon profil</span> <img class="pencil" src="../public/icon/icon-pencil.svg" alt=""></h4>
            <p>Nom : <?= $user->nom ?></p>
            <p>Prénom : <?= $user->prenom ?></p>
        </div>
        <div class="adresse">
            <h4><span>Adresses</span><img class="pencil" src="../public/icon/icon-pencil.svg" alt=""></h4>
            <p><?= $user->adresse ?></p>
        </div>
        <div class="motdepasse">
            <h4><span>Mot de passe</span><img class="pencil" src="../public/icon/icon-pencil.svg" alt=""></h4>
            <p> </p>
        </div>
        <div class="suppression">
            <a href="">Supprimer mon compte</a>
        </div>

        <div class="block-popup ">
            <div class="popup">
                <img class="cross-popup" src="../public/icon/icon-cross.svg" alt="">
                <h4>Mon profil</h4>
                <form action="index.php?p=users.profilEdit" method="post">
                    <?= $form->input("nom", "Nom", $option = ["type" => "text"], $placeholder = "Nom de l'utilisateur", isset($errors["nomError"]) ? $errors["nomError"] : "") ?>
                    <?= $form->input("prenom", "Prénom", $option = ["type" => "text"], $placeholder = "Prénom de l'utilisateur", isset($errors["prenomError"]) ? $errors["prenomError"] : "") ?>
                    <?= $form->input("telephone", "Téléphone", $option = ["type" => "tel"], $placeholder = "Téléphone", isset($errors["telephoneError"]) ? $errors["telephoneError"] : "") ?>
                    <input type="submit" class="btn-form" value="Envoyer">
                </form>
            </div>
        </div>
        <div class="block-popup">
            <div class="popup">
                <img class="cross-popup" src="../public/icon/icon-cross.svg" alt="">
                <h4>Mon profil</h4>
                <form action="index.php?p=users.adresseEdit" method="post">
                    <?= $form->input("adresse", "Adresse", $option = ["type" => "textarea"], $placeholder = "Adresse") ?>
                    <input type="submit" class="btn-form" value="Envoyer">
                </form>
            </div>
        </div>
        <div class="block-popup">
            <div class="popup">
                <img class="cross-popup" src="../public/icon/icon-cross.svg" alt="">
                <h4>Mon profil</h4>
                <form action="index.php?p=users.identifiantsEdit" method="post">
                    <?= $form->input("email", "E-mail", $option = ["type" => "email"], $placeholder = "Email", isset($errors["emailError"]) ? $errors["emailError"] : "") ?>
                    <?= $form->input("password", "Mot de Passe", $option = ["type" => "password"], $placeholder = "Mot de Passe", isset($errors["passwordError"]) ? $errors["passwordError"] : "") ?>
                    <input type="submit" class="btn-form" value="Envoyer">
                </form>
            </div>
        </div>
    </section>
    <section class="newsletter">
        <h2 class="title-rubrique">Newsletter</h2>
        <div class="newsletter-block">
            <p>Abonnez vous à nos newsletter afin de restez informer de toutes nos nouveautés et profiter de bons plans</p>
            <form method="post" class="newsletter-form">
                <?= $form->input('email', 'Email', $option= [], $placeholder="E-mail"); ?>
                <button type="submit" class="btn-newsletter btn-primary">Souscrire</button>
            </form>
        </div>
    </section>
</main>
</div>

<script>
    $(document).ready(function(){
        $(".pencil").each((i, pen)=>{
            $(pen).click(()=>{
                $(".block-popup").eq(i).addClass("active")
            })

            $(".cross-popup").click(()=>{
                $(".block-popup").eq(i).removeClass("active")
            })
        
        })
    })
</script>

<!-- <form class="sign-up" method="post" action="index.php?p=users.account">
       
            
            <?= $form->input("password", "Mot de Passe", $option = ["type" => "password"], $placeholder = "Mot de Passe", isset($errors["passwordError"]) ? $errors["passwordError"] : "") ?>
            
            
            <div>
            <button type="submit" class="btn-form btn-primary">S'inscrire</button>
                <?php if(isset($displaySuccess) || isset($displayWarning)) {
                        if($displaySuccess === true){ ?>
                            <p class="success">L'utisateur a été modifié avec succès.</p>
                   <?php }else if($displayWarning === true){ ?>
                            <p class="warning">Un compte est déjà associé à cette email.</p>
                    <?php } 
                    }?>
            </div>
    </form> -->