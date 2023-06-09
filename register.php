<?php 

include('config.php');
require_once('register.action.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inscription</title>
</head>
<body>

<h1>inscription</h1>

<form id="mon-formulaire-register" method="POST">
  <label for="login">Login :</label>
  <input type="text" id="login" name="login" required>

  <label for="password">Mot de passe :</label>
  <input type="password" id="password" name="password" required>

  <button type="submit">S'inscrire</button>
</form>



<script>
// Sélection de l'élément du formulaire et ajout d'un écouteur d'événements sur la soumission
document.querySelector('#mon-formulaire-register').addEventListener('submit', (event) => {
  event.preventDefault(); // Empêche le rechargement de la page

  // Récupération des données du formulaire
  const formData = new FormData(event.target);

  // Envoi de la requête
  fetch('register.action.php', {
    method: 'POST',
    body: formData
  })
  .then(response => {
    // Redirection vers la page désirée
    window.location.href = 'login.php';
  })
  .catch(error => {
    console.error(error);
  });
});


</script>
    
</body>
</html>