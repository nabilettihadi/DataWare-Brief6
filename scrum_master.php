<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Vérifier si l'utilisateur est un Scrum Master
if ($_SESSION['role'] !== 'scrum_master') {
    header('Location: user.php');
    exit();
}

// Charger et gérer les fonctionnalités spécifiques au Scrum Master depuis la base de données
// ...

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- ... (mêmes en-têtes que user.php) -->
    <title>Page Scrum Master</title>
</head>
<body>
    <h1>Bienvenue, Scrum Master</h1>
    
    <!-- Afficher des fonctionnalités spécifiques au Scrum Master -->
    <!-- ... -->

    <!-- Lien pour se déconnecter -->
    <a href="logout.php">Se déconnecter</a>
</body>
</html>