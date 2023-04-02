// Sélection de l'élément du formulaire et ajout d'un écouteur d'événements sur la soumission
document.querySelector('#mon-formulaire-reset').addEventListener('submit', (event) => {
    event.preventDefault(); // Empêche le rechargement de la page
  
    // Récupération des données du formulaire
    const formData = new FormData(event.target);
  
    // Envoi de la requête
    fetch('update.password.php', {
      method: 'POST',
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      if (data.error) {
        // Affichage d'un message d'erreur si la mise à jour a échoué
        console.error(data.error);
      } else {
        // Affichage d'un message de succès si la mise à jour a réussi
        console.log(data.message);
      }
    })
    .catch(error => {
      console.error(error);
    });
  });
  