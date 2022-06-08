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
    <link href="../public/css/reset.css" rel="stylesheet">
    <link href="../public/css/style.css" rel="stylesheet">
    <script src="../public/js/main.js" defer></script>
    <script src="../public/js/adresseApi.js" defer></script>

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

    <nav class="navbar <?=$bg?>">
        <div class="nav-container">
            <ul class="nav-left">
                <li><a href="../public/index.php?p=posts.index">Accueil</a></li>
                <li><a class="btn-shop">Shop</a></li>
                <li><a href="../public/index.php?p=posts.inspirations">Inspirations</a></li>
            </ul>
            <div class="logo-nav logo-white">
                <img src="../public/images/logo-<?=$color?>.svg" alt="">
            </div>
            <div class="nav-right">
                <form class="search">
                    <input class="bar-search" type="text" placeholder="Recherche...">
                    <img class="icon icon-search" src="../public/icon/icon-search-<?=$color?>.svg" alt="icon-search">
                </form>
                
                <div class="user">
                    <div class="icons">
                        <?php //Pour se connecter
                        if(isset($_SESSION["auth"]) && !empty($_SESSION["auth"])){
                            // Déconnexion
                        } else { ?>
                            
                <?php } ?>
                        <img class="icon icon-user" src="../public/icon/icon-user-<?=$color?>.svg" alt="icon-user">
                        <img class="icon icon-like" src="../public/icon/icon-like-<?=$color?>.svg" alt="icon-like">
                        <img class="icon icon-basket" src="../public/icon/icon-basket-<?=$color?>.svg" alt="icon-basket">
                    </div>
                    <nav class="menu-account">
                        <a href="../public/index.php?p=users.login">S'identifier</a>
                        <!-- <a href="">Gérer mon compte</a> -->
                        <!-- <a href="">Mes achats</a>
                        <a href="">Déconnexion</a> -->
                    </nav>
                </div>
            </div>
        </div>
        <ul class="nav-categories">
            <li><a href="index.php?p=posts.category&id=1">Salon</a></li>
            <li><a href="index.php?p=posts.category&id=2">Salle à manger</a></li>
            <li><a href="index.php?p=posts.category&id=3">Chambre</a></li>
            <li><a href="index.php?p=posts.category&id=4">Luminaire</a></li>
            <li><a href="index.php?p=posts.category&id=5">Décoration</a></li>
        </ul>
    </nav>

    <?= $content; ?>

    <footer>
        <div class="grid-footer">
            <img src="../public/images/logo-white.svg" alt="">
            <div class="column">
                <a>Contact</a>
                <a>Qui sommes-nous</a>
                <a>Nous rejoindre</a>
            </div>
            <div class="column">
                <a>Livraison</a>
                <a>Retours & remboursement</a>
                <a>Aide & FAQ</a>
            </div>
            <div class="column">
                <a>Paramètres des cookies</a>
                <a>Politique relative aux cookies</a>
                <a>Charte de protection des données</a>
            </div>
            <div class="column-4">
                <p>Suivez-nous</p>
                <div class="rs">
                    <img src="../public/icon/icon-facebook.svg" alt="">
                    <img src="../public/icon/icon-instagram.svg" alt="">
                    <img src="../public/icon/icon-pinterest.svg" alt="">
                    <img src="../public/icon/icon-youtube.svg" alt="">
                </div>
            </div>
        </div>
        <div class="copyright">
            <p>Copyright © 2022 - Tous droits réservés - Mentions Légales - CGV</p>
        </div>
    </footer>


</body>
    
</html>
