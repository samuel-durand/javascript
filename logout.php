<?php
// Démarrage de la session
session_start();

// Destruction de la session
session_unset();
session_destroy();

// Redirection vers la page de connexion
exit();
?>
