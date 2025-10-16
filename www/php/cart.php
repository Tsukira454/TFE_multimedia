<?php
session_start();
if(!isset($_SESSION['userID'])) {
    header('Location: ../index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="../images/logo.ico">
    <link rel="stylesheet" href="../css/index.css">
    <title>Rethro Pi | Panier</title>
</head>
<body>
    <div class="navbar">
        <img class="logo" src="../images/logo.png" alt="Rethro Pi">
        <h1>Rethro Pi</h1>
        <div class="links">
            <a href="../index.php"><i class="fa-solid fa-house icon"></i> <span class="hidden_text">Accueil</span></a>
            <a href="products.php"><i class="fa-solid fa-box icon"></i> <span class="hidden_text">Produits</span></a>
            <a href="about.php"><i class="fa-solid fa-info-circle icon"></i> <span class="hidden_text">À propos de nous</span></a>
            <a href="mailto:mouyelv@sjb-liege.org"><i class="fa-solid fa-envelope icon"></i> <span class="hidden_text">Contact</span></a>
            <?php if(!isset($_SESSION['userID'])): ?>
            <a href="login.php"><i class="fa-solid fa-user icon"></i> <span class="hidden_text">Connexion</span></a>
            <?php else: ?>
            <a href="cart.php"><i class="fa-solid fa-shopping-cart icon"></i> <span class="hidden_text">Panier</span></a>
            <a href="logout.php"><i class="fa-solid fa-circle-xmark"></i> <span class="hidden_text">Déconnexion</span></a>
            <a href="profil.php"><i class="fa-solid fa-circle-user"></i> <span class="hidden_text"><?php echo $_SESSION['pseudo']; ?></span></a>
            <?php endif; ?>
        </div>
    </div>
    <div class="separateur">
        <figure>
            <img src="../images/separateur_mauve_top.png" alt="">
        </figure>
    </div>
    <div class="main">
        <p>Panier</p>
    </div>
    <div class="separateur">
        <figure>
            <img src="../images/separateur_mauve_botom.png" alt="">
        </figure>
    </div>
    <div class="footer">
        <p>&copy; 2025-2026 Rethro Pi. Tous droits réservés.</p>
        <p><a href="privacy.php">Politique de confidantialité</a></p>
        <p><a href="mailto:mouyelv@sjb-liege.org">Contactez-nous</a></p>
    </div>
</body>
</html>