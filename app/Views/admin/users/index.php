<section class="admin-section users">
    <h1>Users</h1>
    <div class="form-bg">
        <form method="post" action="index?p=admin.users.add">
            <?= $form->input("nom", "Nom", $option = ["type" => "text"], $placeholder = "Nom de l'utilisateur", isset($errors["nomError"]) ? $errors["nomError"] : "") ?>
            <?= $form->input("prenom", "Prénom", $option = ["type" => "text"], $placeholder = "Prénom de l'utilisateur", isset($errors["prenomError"]) ? $errors["prenomError"] : "") ?>
            <?= $form->input("email", "E-mail", $option = ["type" => "email"], $placeholder = "Email", isset($errors["emailError"]) ? $errors["emailError"] : "") ?>
            <?= $form->input("password", "Mot de Passe", $option = ["type" => "password"], $placeholder = "Mot de Passe", isset($errors["passwordError"]) ? $errors["passwordError"] : "") ?>
            <?= $form->input("telephone", "Téléphone", $option = ["type" => "tel"], $placeholder = "Téléphone", isset($errors["telephoneError"]) ? $errors["telephoneError"] : "") ?>
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
            <?= $form->input("adresse", "Adresse", $option = ["type" => "textarea"], $placeholder = "Adresse", isset($errors["adresseError"]) ? $errors["adresseError"] : "") ?>
            <div class="result">
            <?= $form->btnSubmit('btn-ajouter', "Envoyer") ?>
            <?php if(isset($displaySuccess) || isset($displayWarning)) {
                        if($displaySuccess === true){ ?>
                            <p class="success">L'utisateur a été ajouté avec succès.</p>
                   <?php }else if($displayWarning === true){ ?>
                            <p class="warning">Un compte est déjà associé à cette email.</p>
                    <?php } 
                    }?>
            </div>
        </form>
    </div>

    <div class="table-bg listes">
        <div class="liste">
            <h3>Tous les utilisateurs</h3>
            <table class="table">
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>Nom</td>
                        <td>Prénom</td>
                        <td>E-mail</td>
                        <td>Rôle</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $user): ?>
                    <tr>
                        <td><?= $user->id; ?></td>
                        <td><?= $user->nom; ?></td>
                        <td><?= $user->prenom; ?></td>
                        <td><?= $user->email; ?></td>
                        <td><?= $user->role; ?></td>
                        <td class="btns-actions">
                            <a class="btn btn-editer" href="?p=admin.users.edit&id=<?= $user->id; ?>">Editer</a>
                            <form action="?p=admin.users.delete" method="post" style="display: inline;">
                                <input type="hidden" name="id" value="<?= $user->id ?>">
                                <?= $form->btnSubmit('btn-supprimer', "Supprimer") ?>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>


<!-- 
<form class="sign-up" method="post" action="index.php?p=users.inscription">
        <?= $form->input('nom', 'text', $option= [], $placeholder="Nom"); ?>
        <?= $form->input('penom', 'text', $option= [], $placeholder="Prénom"); ?>
        <?= $form->input('email', 'Email', $option= [], $placeholder="E-mail"); ?>
        <?= $form->input('password', 'Mot de passe', ['type' => 'password'], $placeholder="Mot de passe"); ?>
        <button type="submit" class="btn-form btn-primary">S'inscrire</button>
</form> -->