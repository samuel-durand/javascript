<?php 
// Inclusion du fichier de configuration de la base de données
include('config.php');

// Vérification si les données ont été soumises
if (isset($_POST['password'])) {
  // Récupération des données soumises dans le formulaire
  $newPassword = $_POST['password'];
  $login = $_SESSION['login'];

  // Mise à jour du mot de passe dans la base de données
  $stmt = $pdo->prepare('UPDATE users SET password = :newPassword WHERE login = :login');
  $stmt->execute(['newPassword' => password_hash($newPassword, PASSWORD_DEFAULT), 'login' => $login]);
  echo 'Le mot de passe a bien été mis à jour.';
}


?>