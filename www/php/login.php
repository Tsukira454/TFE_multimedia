<?php
session_start();
if(isset($_SESSION['userID'])) {
    header('Location: ../index.php');
    exit();
}
if(isset($_POST['mail'])) {
    $email = htmlspecialchars($_POST['mail']);
    $password = hash('sha256', htmlspecialchars($_POST['mdp']));

    require_once(__DIR__ . "/dbConnect.php");
    $request = $dbEpidore->prepare("SELECT * FROM utilisateurs WHERE email = :email AND mdp = :mdp");
    $request->execute(array(
        ":email" => $email,
        ":mdp" => $password
    ));
    $results = $request->fetchAll();

    if(count($results) == 1) {
        $_SESSION["userID"] = $results[0]['id_utilisateurs'];
        $_SESSION["email"] = $email;
        $_SESSION['nom'] = $results[0]['nom'];
        $_SESSION['prenom'] = $results[0]['prenom'];
        $_SESSION['pseudo'] = $results[0]['pseudo'];
        header('Location: ../index.php');
        exit();
    } else {
        $errorMessage = "Mauvaise combinaison de login et mot de passe.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Rethro Pi | Se connecter</title>
  <link rel="stylesheet" href="../css/style_log_reg.css">
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/all.css'>
  <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css'>
  <link rel="icon" href="../images/logo.png" sizes="32x32" type="image/png">
</head>
<body>
<div class="images-top">
    <figure>
        <img src="../images/separateur_couleur_top.png" alt="">
    </figure>
</div>
<div class="container">
    <div class="login-box">
        <div class="titre">
            <h2>Se connecter</h2>
        </div>
        <form class="log_reg" method="post" action="">
            <div class="log_reg__field">
                <i class="log_reg__icon fas fa-user"></i>
                <input type="email" class="log_reg__input" name="mail" placeholder="Pseudo / email" required value="">
            </div>
            <div class="log_reg__field">
                <i class="log_reg__icon fas fa-lock"></i>
                <input type="password" class="log_reg__input" name="mdp" placeholder="Mots de passe" required>
            </div>
            <?php if(isset($errorMessage)) echo "<p class='error'>$errorMessage</p>"; ?>
            <button class="button log_reg__submit" type="submit">
                <span class="button__text">Se connecter</span>
                <i class="button__icon fas fa-chevron-right"></i>
            </button>
        </form>
        <div class="inscription-login">
            <p>Pas encore de compte ? <a href="inscription.php">S'inscrire</a></p>
        </div>
    </div>
</div>
<div class="images-bottom">
    <figure>
        <img src="../images/separateur_couleur_bottom.png" alt="">
    </figure>
</div>
</body>
</html>
