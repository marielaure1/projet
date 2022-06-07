<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

    <title><?= App::getInstance()->title; ?></title>

    <!-- Bootstrap core CSS -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="../public/css/reset.css" rel="stylesheet">
    <link href="../public/css/style.css" rel="stylesheet">
    <script src="../public/js/main.js" defer></script>

</head>

<body>

<?php if(isset($_GET["p"])){
          $p = $_GET["p"];
      } else {
          $p = "";
      }

if($p === "posts.index" or !isset($_GET["p"])){ 
        $color = "white";
        $bg = "black"; ?>
<?php } else { 
        $color = "black";
        $bg = "white"; ?>
<?php } ?>

    <div class="container admin">
        <div class="row">
            <nav class="admin-nav col-3">
                <img class="logo" src="../public/images/logo-white-black.svg" alt="">
                <a href="../public/index.php?p=admin.posts.index"><img src="../public/icon/icon-home.svg" alt=""><span>Dashboard</span></a>
                <a href="../public/index.php?p=admin.users.index"><img src="../public/icon/icon-user.svg" alt=""><span>Users</span></a>
                <a href="../public/index.php?p=admin.categories.index"><img src="../public/icon/icon-category.svg" alt=""><span>Catégorie</span></a>
                <a href="../public/index.php?p=admin.produits.index"><img src="../public/icon/icon-product.svg" alt=""><span>Produits</span></a>
                <a href="../public/index.php?p=admin.favoris.index"><img src="../public/icon/icon-like-white.svg" alt=""><span>Favoris</span></a>
                <a href="../public/index.php?p=admin.commandes.index"><img src="../public/icon/icon-ordered.svg" alt=""><span>Commandes</span></a>
            </nav>
            <div class="col-9">
                <?= $content; ?>
            </div>
        </div>
    </div>

    

</body>
    
</html>