<?php
// Inclusion du fichier de configuration de la base de données
include('config.php');

// Vérification si les données ont été soumises
if (isset($_POST['login'])) {
  // Récupération des données soumises dans le formulaire
  $newLogin = $_POST['login'];
  $oldLogin = $_SESSION['login'];

  // Vérification si le nouveau login est déjà utilisé
  $stmt = $pdo->prepare('SELECT * FROM users WHERE login = :login');
  $stmt->execute(['login' => $newLogin]);
  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($user) {
    // Le nouveau login est déjà utilisé
    echo 'Ce login est déjà utilisé.';
  } else {
    // Le nouveau login n'est pas encore utilisé, on peut le mettre à jour
    $stmt = $pdo->prepare('UPDATE users SET login = :newLogin WHERE login = :oldLogin');
    $stmt->execute(['newLogin' => $newLogin, 'oldLogin' => $oldLogin]);
    $_SESSION['login'] = $newLogin; // Mise à jour du login dans la session
    echo 'Le login a bien été mis à jour.';
  }
}
?>