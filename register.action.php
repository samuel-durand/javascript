<?php
// Inclusion du fichier de configuration de la base de données
include('config.php');

// Récupération des données de l'utilisateur
$login = $_POST['login'];
$password = $_POST['password'];

// Vérification si l'utilisateur existe déjà dans la base de données
$stmt = $pdo->prepare('SELECT * FROM users WHERE login = :login');
$stmt->execute(['login' => $login]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Si l'utilisateur n'existe pas encore, on l'ajoute dans la base de données
if (!$user) {
  $stmt = $pdo->prepare('INSERT INTO users (login, password) VALUES (:login, :password)');
  $stmt->execute(['login' => $login, 'password' => password_hash($password, PASSWORD_DEFAULT)]);

  // Redirection vers la page de connexion
  exit();
} else {
  // Si l'utilisateur existe déjà, on affiche un message d'erreur
  echo 'L\'utilisateur existe déjà.';
}
?>
