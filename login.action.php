<?php
// Inclusion du fichier de configuration de la base de données
include('config.php');

// Vérification si les données ont été soumises
if (isset($_POST['login']) && isset($_POST['password'])) {
  // Récupération des données soumises dans le formulaire
  $login = $_POST['login'];
  $password = $_POST['password'];

  // Recherche de l'utilisateur correspondant dans la base de données
  $stmt = $pdo->prepare('SELECT * FROM users WHERE login = :login AND password = :password');
  $stmt->execute(['login' => $login, 'password' => $password]);
  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  // Vérification si l'utilisateur a été trouvé
  if ($user) {
    echo json_encode(['message' => 'Bienvenue, ' . $user['login'] . ' !']);
} else {
    echo 'Mauvais login ou mot de passe.';
  }
}


