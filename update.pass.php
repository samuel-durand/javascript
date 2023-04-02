<?php 

// Inclusion du fichier de configuration de la base de données
include('config.php');

// Vérification si les données ont été soumises
if (isset($_POST['current_password']) && isset($_POST['new_password'])) {
  // Récupération des données soumises dans le formulaire
  $currentPassword = $_POST['current_password'];
  $newPassword = $_POST['new_password'];
  $login = $_SESSION['login'];

  // Recherche de l'utilisateur correspondant dans la base de données
  $stmt = $pdo->prepare('SELECT * FROM users WHERE login = :login');
  $stmt->execute(['login' => $login]);
  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  // Vérification si l'utilisateur a été trouvé et si le mot de passe actuel est correct
  if ($user && password_verify($currentPassword, $user['password'])) {
    // Le mot de passe actuel est correct, on peut mettre à jour le mot de passe
    $stmt = $pdo->prepare('UPDATE users SET password = :newPassword WHERE login = :login');
    $stmt->execute(['newPassword' => password_hash($newPassword, PASSWORD_DEFAULT), 'login' => $login]);
    echo 'Le mot de passe a bien été mis à jour.';
  } else {
    echo 'Mauvais mot de passe actuel.';
  }
}
?>



