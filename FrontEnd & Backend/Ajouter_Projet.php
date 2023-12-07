<?php
include "connexion.php";

if (isset($_POST["submit"])) {
    // Récupérer les valeurs du formulaire
    $nom = $_POST["name"];
    $dated = $_POST["dated"];
    $datef = $_POST["datef"];
    $status = $_POST["statuss"];
    $requete = "INSERT INTO projets (nom_projet, date_debut, date_fin, status_projet) VALUES ('$nom', '$dated', '$datef', '$status')";
    $query = mysqli_query($conn, $requete);
    header("Location: DashboardM.php");
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <title>Ajouter Projet</title>
</head>

<body class="bg-gradient-to-r from-blue-400 to-indigo-800">
    <section class="min-h-screen flex justify-center items-center">
        <div class=" flex justify-center container mx-auto">
            <div class="card bg-white rounded-md shadow-md overflow-hidden w-full lg:w-4/5 xl:w-3/5">

                <div class="flex justify-end px-3 py-1">
                    <a href="DashboardM.php" class="text-danger text-xl"><i class="bi bi-x-lg"></i></a>
                </div>
                <div class="lg:flex justify-center">

                    <div class="lg:w-1/2 p-8">
                <img src="..\Image\photo.jpeg" alt="">
                        <form method="post" action="">
                            <h5 class="font-semibold mb-3 mt-3 pb-3 text-xl">Créer un nouveau projet</h5>

                            <div class="mb-3">
                                <input type="text" name="name" class="form-control" placeholder="Nom du projet"
                                    required>
                                <span class="ms-2 text-danger"></span>
                            </div>
                            <div class="mb-3">
                            <label>Date de Début :</label>
                                <input type="date" name="dated" class="form-control" placeholder="Date début"
                                    required>
                                <span class="ms-2 text-danger"></span>
                            </div>
                            <div class="mb-3">
                            <label>Date de Fin :</label>
                                <input type="date" name="datef" class="form-control" placeholder="Date fin"
                                    required>
                                <span class="ms-2 text-danger"></span>
                            </div>
                            <label for="cars" class="mb-1">Status:</label>
                            <select class="form-select" aria-label="Default select example" name="statuss">
                                <option selected>en cours</option>
                                <option value="finalisée">finalisée</option>
                            </select>

                            <div class="pt-1 mb-3 d-flex mt-2 justify-end">
                                <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit">Valider
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
