// Sélection de l'élément du formulaire et ajout d'un écouteur d'événements sur la soumission
document.querySelector('#mon-formulaire').addEventListener('submit', (event) => {
    event.preventDefault(); // Empêche le rechargement de la page
  
    // Récupération des données du formulaire
    const formData = new FormData(event.target);
  
    // Envoi de la requête de vérification du nouveau login
    fetch('update.login.php', {
      method: 'POST',
      body: formData
    })
    .then(response => response.json())
    .then(data => {
      if (data.error) {
        // Affichage de l'erreur si le nouveau login est déjà utilisé
        document.querySelector('#message').innerHTML = data.error;
      } else {
        // Envoi de la requête de mise à jour du login si le nouveau login est disponible
        fetch('update-login.php', {
          method: 'POST',
          body: formData
        })
        .then(response => response.json())
        .then(data => {
          if (data.error) {
            // Affichage de l'erreur si la mise à jour du login a échoué
            document.querySelector('#message').innerHTML = data.error;
          } else {
            // Redirection vers la page de profil si la mise à jour a réussi
            window.location.replace("profil.php");
          }
        })
        .catch(error => {
          console.error(error);
        });
      }
    })
    .catch(error => {
      console.error(error);
    });
  });
  