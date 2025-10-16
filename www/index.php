<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="images/logo.ico">
    <link rel="stylesheet" href="./css/index.css">
    <title>Rethro Pi | Accueil</title>
</head>
<body>
    <div class="navbar">
        <img class="logo" src="images/logo.png" alt="Rethro Pi">
        <h1>Rethro Pi</h1>
        <div class="links">
            <a href="index.php"><i class="fa-solid fa-house icon"></i> <span class="hidden_text">Accueil</span></a>
            <a href="php/products.php"><i class="fa-solid fa-box icon"></i> <span class="hidden_text">Produits</span></a>
            <a href="php/about.php"><i class="fa-solid fa-info-circle icon"></i> <span class="hidden_text">À propos de nous</span></a>
            <a href="mailto:mouyelv@sjb-liege.org"><i class="fa-solid fa-envelope icon"></i> <span class="hidden_text">Contact</span></a>
            <?php if(!isset($_SESSION['userID'])): ?>
            <a href="php/login.php"><i class="fa-solid fa-user icon"></i> <span class="hidden_text">Connexion</span></a>
            <?php else: ?>
            <a href="php/cart.php"><i class="fa-solid fa-shopping-cart icon"></i> <span class="hidden_text">Panier</span></a>
            <a href="php/logout.php"><i class="fa-solid fa-circle-xmark"></i> <span class="hidden_text">Déconnexion</span></a>
            <a href="php/profil.php"><i class="fa-solid fa-circle-user"></i> <span class="hidden_text"><?php echo $_SESSION['pseudo']; ?></span></a>
            <?php endif; ?>
        </div>
    </div>
    <div class="separateur">
        <figure>
            <img src="images/separateur_mauve_top.png" alt="">
        </figure>
    </div>
    <div class="main">
        <div class="main_top">
            <h1>Bienvenue sur Rethro Pi !</h1>
            <p>Rethro pi est une société spécialisée dans la vente de jeux et produits électroniques. <br>
            Sur notre site officiel vous trouverez une large sélection de produits, des jeux vidéo aux accessoires électroniques. <br>
            Ci-dessous vous trouverez nos produits phares du moment !</p>
        </div>
        <div class="Best_product">
            <p>slider de 5-6 produits</p>
        </div>
        <div class="main_bottom">
            <p>autre info</p>
        </div>
    </div>
    <div class="separateur">
        <figure>
            <img src="images/separateur_mauve_botom.png" alt="">
        </figure>
    </div>
    <div class="footer">
        <p>&copy; 2025-2026 Rethro Pi. Tous droits réservés.</p>
        <p><a href="privacy.php">Politique de confidantialité</a></p>
        <p><a href="mailto:mouyelv@sjb-liege.org">Contactez-nous</a></p>
    </div>
</body>
</html>