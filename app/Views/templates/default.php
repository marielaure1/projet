<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../public/icon/favicon.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

    <title><?= App::getInstance()->title; ?></title>
    <link href="../public/css/reset.css" rel="stylesheet">
    <link href="../public/css/style.css" rel="stylesheet">
    <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
    <script src="../public/js/ajax.js" defer></script>
    <script src="../public/js/main.js" defer></script>
    <script src="../public/js/slider.js" defer></script>
    <script src="../public/js/mini-slider.js" defer></script>
    <script src="../public/js/btn-quantite.js" defer></script>
    <script src="../public/js/filtre.js" defer></script>
    <script src="../public/js/adresseApi.js" defer></script>

</head>

<body>

    <nav class="navbar">
        <div class="nav-container">
            <ul class="nav-left">
                <li><a href="../public/index.php?p=posts.index">Accueil</a></li>
                <li><a class="btn-shop">Shop</a></li>
                <li><a href="../public/index.php?p=posts.inspirations">Inspirations</a></li>
            </ul>
            <div class="logo-nav logo-white">
                <img src="../public/images/logo-black.svg" alt="" class="logo-home">
            </div>
            <div class="nav-right">
                <form class="search">
                    <input class="bar-search" type="text" placeholder="Recherche...">
                    <img class="icon icon-search" src="../public/icon/icon-search-black.svg" alt="icon-search">
                </form>
                
                <div class="user">
                    <div class="icons">
                        <div  class="icon"><img class="icon-user" src="../public/icon/icon-user-black.svg" alt="icon-user"></div>
                        <a href="index.php?p=users.favoris"><img class="icon icon-like" src="../public/icon/icon-like-black.svg" alt="icon-like"></a>
                        <a href="index.php?p=panier.index"><img class="icon icon-basket" src="../public/icon/icon-basket-black.svg" alt="icon-basket"></a>
                    </div>
                    <nav class="menu-account">
                    <?php //Pour se connecter
                        if(isset($_SESSION["auth"]) && !empty($_SESSION["auth"])){ ?>
                            <a href="../public/index.php?p=users.account">Gérer mon compte</a>
                            <a href="../public/index.php?p=users.account">Mes achats</a>
                           <?php if($_SESSION['user']->role === 'ROLE_ADMIN'){ ?>
                            <a href="../public/index.php?p=admin.posts.index">Admin</a>
                            <?php } ?>
                            <a href="../public/index.php?p=users.logout">Déconnexion</a>
                    <?php } else { ?>
                            <a href="../public/index.php?p=users.identification">S'identifier</a>
                <?php } ?>
                    </nav>
                </div>
            </div>
        </div>
        <ul class="nav-categories">
            <?php 
                foreach($categories as $categorie){ ?>
                    <li><a href="index.php?p=posts.category&id=<?= $categorie->id ?>"><?= $categorie->nom ?></a></li>
            <?php }
            ?>
        </ul>
    </nav>

    <?= $content; ?>

    <footer>
        <div class="grid-footer">
            <img src="../public/images/logo-white.svg" alt="">
            <div class="column">
                <a href="index.php?p=footer.contact">Contact</a>
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
                <a href="index.php?p=footer.protectiondonnee">Charte de protection des données</a>
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
            <p>Copyright © 2022 - Tous droits réservés - <a href="index.php?p=footer.mentionslegales">Mentions Légales</a> - <a href="index.php?p=footer.cgv"> CGV</a></p>
        </div>
    </footer>


</body>
    
</html>
