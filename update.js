// Sélection de l'élément du formulaire et ajout d'un écouteur d'événements sur la soumission
document.querySelector('#mon-formulaire').addEventListener('submit', (event) => {
    event.preventDefault(); // Empêche le rechargement de la page
  
    // Récupération des données du formulaire
    const formData = new FormData(event.target);
  
    // Envoi de la requête
    fetch('update.login.php', {
      method: 'POST',
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      // Vérification du résultat de la requête
      if (data.success) {
        // Affichage du message de succès
        alert(data.message);
      } else {
        // Affichage du message d'erreur
        alert(data.message);
      }
    })
    .catch(error => {
      console.error(error);
    });
  });
  