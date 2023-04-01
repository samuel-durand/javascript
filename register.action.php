<?php
// Inclusion du fichier de configuration de la base de données
include('config.php');

// Vérification si les données ont été soumises
if (isset($_POST['login']) && isset($_POST['password'])) {
  // Récupération des données soumises dans le formulaire
  $login = $_POST['login'];
  $password = $_POST['password'];

  // Recherche de l'utilisateur correspondant dans la base de données
  $stmt = $pdo->prepare('SELECT * FROM users WHERE login = :login');
  $stmt->execute(['login' => $login]);
  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  // Vérification si l'utilisateur n'existe pas déjà
  if (!$user) {
    // Insertion de l'utilisateur dans la base de données
    $stmt = $pdo->prepare('INSERT INTO users (login, password, register_date) VALUES (:login, :password, NOW())');
    $stmt->execute(['login' => $login, 'password' => password_hash($password, PASSWORD_DEFAULT)]);

    // Redirection vers la page de connexion
    exit();
  } else {
    // Si l'utilisateur existe déjà, on affiche un message d'erreur
    echo 'L\'utilisateur existe déjà.';
  }
}

?>
