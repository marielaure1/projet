<section class="admin-section users">
    <h1>Users</h1>
    <div class="form-bg">
        <form method="post" enctype="multipart/form-data" action="index.php?p=admin.users.index">
            <?= $form->input("nom", "Nom", $option = ["type" => "text"], $placeholder = "Nom de l'utilisateur") ?>
            <?= $form->input("prenom", "Prénom", $option = ["type" => "text"], $placeholder = "Prénom de l'utilisateur") ?>
            <?= $form->input("email", "E-mail", $option = ["type" => "email"], $placeholder = "Email") ?>
            <?= $form->input("password", "Mot de Passe", $option = ["type" => "password"], $placeholder = "Mot de Passe") ?>
            <?= $form->input("telephone", "Téléphone", $option = ["type" => "tel"], $placeholder = "Téléphone") ?>
            <div class="form-group-radio">
                <div>
                    <h3>Role ? </h3>
                </div>
                <div>
                    <label for="roleuser">User</label>
                    <input type="radio" id="roleuser" name="role" value="ROLE_USER" class="form-control" checked>
                </div>
                <div>
                    <label for="roleadmin">Admin</label>
                    <input type="radio" id="roleadmin" name="role" value="ROLE_ADMIN" class="form-control">
                </div>
            </div>
            <?= $form->input("adresse", "Adresse", $option = ["type" => "textarea"], $placeholder = "Adresse") ?>
            <div>
                <?= $form->btnSubmit('btn-editer', "Editer") ?>
            </div>
        </form>
    </div>
</section>