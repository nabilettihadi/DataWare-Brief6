<?php
// Démarrer ou reprendre la session
session_start();

// Détruire toutes les données de la session
session_unset();
session_destroy();

// Rediriger vers la page de connexion
header('Location: login.php');
exit();
?>
