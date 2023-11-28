<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Charger les projets et les équipes de l'utilisateur depuis la base de données
// ...

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Page Utilisateur</title>
</head>
<body>
    <h1>Bienvenue, Utilisateur</h1>
    
    <!-- Afficher la liste des projets de l'utilisateur -->
    <h2>Mes Projets</h2>
    <!-- ... -->

    <!-- Afficher la liste des équipes de l'utilisateur -->
    <h2>Mes Équipes</h2>
    <!-- ... -->

    <!-- Lien pour se déconnecter -->
    <a href="logout.php">Se déconnecter</a>
</body>
</html>