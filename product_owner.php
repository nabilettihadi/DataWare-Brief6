<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Vérifier si l'utilisateur est un Product Owner
if ($_SESSION['role'] !== 'product_owner') {
    header('Location: user.php');
    exit();
}

// Charger et gérer les fonctionnalités spécifiques au Product Owner depuis la base de données
// ...

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- ... (mêmes en-têtes que user.php) -->
    <title>Page Product Owner</title>
</head>
<body>
    <h1>Bienvenue, Product Owner</h1>
    
    <!-- Afficher des fonctionnalités spécifiques au Product Owner -->
    <!-- ... -->

    <!-- Lien pour se déconnecter -->
    <a href="logout.php">Se déconnecter</a>
</body>
</html>