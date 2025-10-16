<?php
session_start();
if(isset($_SESSION['userID'])) {
    header('Location: ../index.php');
    exit();
}
if(isset($_POST['nom'])) {
    // Valider le formulaire
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $email = htmlspecialchars($_POST['mail']);
    $password = hash('sha256', htmlspecialchars($_POST['mdp']));

    try {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) throw new Exception("Email invalide");
        require_once(__DIR__ . "/dbConnect.php");
        // Créer l'utilisateur
        $request = $dbEpidore->prepare("INSERT INTO utilisateurs (prenom, nom, email, pseudo, mdp) VALUES(:prenom, :nom, :email, :pseudo, :mdp)");
        $request->execute(array(
            ":prenom" => $prenom,
            ":nom" => $nom,
            ":email" => $email,
            ":pseudo" => $pseudo,
            ":mdp" => $password
        ));
        // Redirection après inscription réussie
        header('Location: login.php');
        exit();
    } catch(Exception $e) {
        $errorMessage = "Erreur lors de l'inscription, veuillez réessayer. $e";
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
                    <input type="text" class="log_reg__input" name="nom" placeholder="Nom" required value="<?php echo $_POST['nom'] ?? '';?>">
                </div>
                <div class="log_reg__field">
                    <i class="log_reg__icon fas fa-user"></i>
                    <input type="text" class="log_reg__input" name="prenom" placeholder="Prénom" required value="<?php echo $_POST['prenom'] ?? '';?>">
                </div>
                <div class="log_reg__field">
                    <i class="log_reg__icon fas fa-phone"></i>
                    <input type="text" class="log_reg__input" name="pseudo" placeholder="pseudo" required value="<?php echo $_POST['pseudo'] ?? '';?>">
                </div>
                <div class="log_reg__field">
                    <i class="log_reg__icon fas fa-envelope"></i>
                    <input type="email" class="log_reg__input" name="mail" placeholder="Email" required value="<?php echo $_POST['mail'] ?? '';?>">
                </div>
                <div class="log_reg__field">
                    <i class="log_reg__icon fas fa-lock"></i>
                    <input type="password" class="log_reg__input" name="mdp" placeholder="Mot de passe" required>
                </div>
                <?php if(isset($errorMessage)) echo "<p class='error'>$errorMessage</p>"; ?>
                <button class="button log_reg__submit" type="submit">
                    <span class="button__text">S'inscrire</span>
                    <i class="button__icon fas fa-chevron-right"></i>
                </button>
            </form>
        <div class="inscription-login">
            <p>Tu a déja un compte ? <a href="login.php">Se connecter</a></p>
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
