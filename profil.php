<?php
session_start();
// Inclusion du fichier de configuration de la base de données
include('config.php');

// Vérification si l'utilisateur est connecté
if (isset($_SESSION['login'])) {
  // Récupération des informations de l'utilisateur connecté depuis la base de données
  $stmt = $pdo->prepare('SELECT * FROM users WHERE login = :login');
  $stmt->execute(['login' => $_SESSION['login']]);
  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  // Affichage de la page pour l'utilisateur connecté
  echo 'Bienvenue, ' . $user['login'] . ' !';
} else {
  // Redirection vers la page de connexion
  exit();
}
?>





