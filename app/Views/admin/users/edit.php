<section class="admin-section users">
    <h1>Users</h1>
    <div class="form-bg">
        <form method="post" enctype="multipart/form-data">
            <?= $form->input("nom", "Nom", $option = ["type" => "text"], $placeholder = "Nom de l'utilisateur", isset($errors["nomError"]) ? $errors["nomError"] : "") ?>
            <?= $form->input("prenom", "Prénom", $option = ["type" => "text"], $placeholder = "Prénom de l'utilisateur", isset($errors["prenomError"]) ? $errors["prenomError"] : "") ?>
            <?= $form->input("email", "E-mail", $option = ["type" => "email"], $placeholder = "Email", isset($errors["emailError"]) ? $errors["emailError"] : "") ?>
            <?= $form->input("password", "Mot de Passe", $option = ["type" => "password"], $placeholder = "Mot de Passe", isset($errors["passwordError"]) ? $errors["passwordError"] : "") ?>
            <?= $form->input("telephone", "Téléphone", $option = ["type" => "tel"], $placeholder = "Téléphone", isset($errors["telephoneError"]) ? $errors["telephoneError"] : "") ?>
            <div class="form-group-radio">
                <div>
                    <h3>Role ? </h3>
                </div>
                <?php if($user->role == "ROLE_ADMIN"){ ?> 
                    <div>
                        <label for="roleuser">User</label>
                        <input type="radio" id="roleuser" name="role" value="ROLE_USER" class="form-control">
                    </div>
                    <div>
                        <label for="roleadmin">Admin</label>
                        <input type="radio" id="roleadmin" name="role" value="ROLE_ADMIN" class="form-control"  checked>
                    </div>
            <?php } else { ?>
                    <div>
                        <label for="roleuser">User</label>
                        <input type="radio" id="roleuser" name="role" value="ROLE_USER" class="form-control" checked>
                    </div>
                    <div>
                        <label for="roleadmin">Admin</label>
                        <input type="radio" id="roleadmin" name="role" value="ROLE_ADMIN" class="form-control">
                    </div>
            <?php } ?>
            </div>
            <?= $form->input("adresse", "Adresse", $option = ["type" => "textarea"], $placeholder = "Adresse") ?>
            <div>
                <?= $form->btnSubmit('btn-editer', "Editer") ?>
                <?php if(isset($displaySuccess) || isset($displayWarning)) {
                        if($displaySuccess === true){ ?>
                            <p class="success">L'utisateur a été modifié avec succès.</p>
                   <?php }else if($displayWarning === true){ ?>
                            <p class="warning">Un compte est déjà associé à cette email.</p>
                    <?php } 
                    }?>
            </div>
        </form>
    </div>
</section>