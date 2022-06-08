<section class="admin-section users">
    <h1>Users</h1>
    <form method="post">
        <?= $form->input("nom", $option = ["type" => "text"], $placeholder = "Nom de l'utilisateur'") ?>
    </form>
</section>

<table class="table">
    <thead>
    <tr>
        <td>ID</td>
        <td>Nom</td>
        <td>Prénom</td>
    </tr>
    </thead>
    <tbody>
        <?php foreach($users as $user): ?>
        <tr>
            <td><?= $user->id; ?></td>
            <td><?= $user->nom; ?></td>
            <td><?= $user->prenom; ?></td>
            <td>
                <a class="btn btn-primary" href="?p=admin.users.edit&id=<?= $user->id; ?>">Editer</a>
                <form action="?p=admin.users.delete" method="post" style="display: inline;">
                    <input type="hidden" name="id" value="<?= $user->id ?>">
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

