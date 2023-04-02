<?php
session_start();
// Inclusion du fichier de configuration de la base de données
include('config.php');
include('update.login.php');
include('update.pass.php');

// Vérification si l'utilisateur est connecté
if (isset($_SESSION['login'])) {
  // Récupération des informations de l'utilisateur connecté depuis la base de données
  $stmt = $pdo->prepare('SELECT * FROM users WHERE login = :login');
  $stmt->execute(['login' => $_SESSION['login']]);
  $user = $stmt->fetch(PDO::FETCH_ASSOC);


} else {
  // Redirection vers la page de connexion
  header('Location: login.php');
  exit();
}


if (date("H") < 18)
$bienvenue = "bonjour et bienvenue " .
$_SESSION['login'];
else 
$bienvenue = "bonsoir et bienvenue " .
$_SESSION['login'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <script src="update.js"></script>
  <script src="update.pass.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>profil</title>
</head>
<body>
<h1><?php echo $bienvenue ?></h1>

<form id="mon-formulaire" method="POST">
    <label for="login">Nouveau login :</label>
    <input type="text" id="login" name="login" required>


    <button type="submit">Mettre à jour</button>
  </form>

  <form id="mon-formulaire-reset" method="POST">
  <label for="current_password">Mot de passe actuel :</label>
  <input type="password" id="current_password" name="current_password" required>

  <label for="new_password">Nouveau mot de passe :</label>
  <input type="password" id="new_password" name="new_password" required>

  <button type="submit">Mettre à jour le mot de passe</button>
</form>



<button id="btn-deconnexion">Se déconnecter</button>

<script src="logout.js"></script>

</body>
</html>



