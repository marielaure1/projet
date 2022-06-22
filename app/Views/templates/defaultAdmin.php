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

    <!-- Bootstrap core CSS -->
    <!-- CSS only -->
    
    <link href="../public/css/reset.css" rel="stylesheet">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> -->
    <link href="../public/css/admin-style.css" rel="stylesheet">
    
    <script src="../public/js/main.js" defer></script>
    <script src="../public/js/theme-admin.js" defer></script>

</head>

<body data-theme="light">

    <div class="admin">
        <nav class="admin-nav">
                <img class="logo" src="../public/images/logo-black.svg" alt="">
                <div class="bg-link"><a href="index.php?p=admin.posts.index"><img src="../public/icon/icon-home-black.svg" alt=""><span>Dashboard</span></a></div>
                <div class="bg-link"><a href="index.php?p=admin.users.index"><img class="img2" src="../public/icon/icon-user-black.svg" alt=""><span>Users</span></a></div>
                <div class="bg-link"><a href="index.php?p=admin.categories.index"><img src="../public/icon/icon-category-black.svg" alt=""><span>Catégories</span></a></div>
                <div class="bg-link"><a href="index.php?p=admin.souscategories.index"><img src="../public/icon/icon-subcategory-black.svg" alt=""><span>Sous-Catégories</span></a></div>
                <div class="bg-link"><a href="index.php?p=admin.produits.index"><img src="../public/icon/icon-produit-black.svg" alt=""><span>Produits</span></a></div>
                <div class="bg-link"><a href="index.php?p=admin.commandes.index"><img src="../public/icon/icon-ordered-black.svg" alt=""><span>Commandes</span></a></div>
                <div class="bg-link"><a href="index.php?p=posts.index"><img src="../public/icon/favicon.png" alt=""><span>Site</span></a></div>
        </nav>
        
        <div class="main">
            <div class="admin-connect">
            <div class="theme-switcher">
                <input type="checkbox" id="switcher">
                <label for=switcher>switch</label>
            </div>
                <p><?= $_SESSION["user"]->nom ?></p>
                <p><?= $_SESSION["user"]->prenom ?></p>
                <a href="../public/index.php?p=users.logout">Déconnexion</a>
            </div>
            <?= $content; ?>
        </div>
    </div>
    

    <script defer>
        const bgLinks = document.querySelectorAll(".bg-link")
        const imgs = document.querySelectorAll(".bg-link img")
        const iconArray = ["home", "user", "category", "subcategory", "produit", "ordered"]

        bgLinks.forEach((bgLink, i) => {
            if(i < 6){
                bgLink.addEventListener("mouseover", () => {
                    imgs[i].src = "../public/icon/icon-" + iconArray[i] + "-rose.svg"
                })
                bgLink.addEventListener("mouseout", () => {
                    imgs[i].src = "../public/icon/icon-" + iconArray[i] + "-black.svg"
                })
            }
        })
        
    </script>

</body>



</html>