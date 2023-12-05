<?php
include "connexion.php";
$message="";
session_start();
if($_SESSION['autoriser'] != "oui"){
  header("Location: index.php");
  exit();
}
$user= $_SESSION['username'];
$membre= $_SESSION['id'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <!-- <link rel="stylesheet" href="style.css" type="text/css"> -->
    

    <title>Assignation</title>
</head>

<body class="bg-gradient-to-r from-blue-400 to-indigo-800">
    <header>
        <nav class="navbar navbar-expand-lg navbar-scroll  shadow-0 border-bottom border-dark">
            <div class="container">
                <img src="../Image/logo.png" alt="logo" class="rounded-4" style="width: 80px; height: 60px;">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class=" text-light bi bi-list"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto d-flex gap-5">
                        <li class="nav-item">
                            <a class="nav-link text-center" href="DashboardScrum.php">Equipes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-center" href="Gestion_Equipe.php">Membres</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-center" href="Assignation.php">Assignation</a>
                        </li>

                        <a href="deconnexion.php"
                            class="btn bg-danger p-2 rounded-3 text-light text-decoration-none "><i
                                class="bi bi-box-arrow-left"></i> Deconnexion</a>
                    </ul>
                </div>
            </div>
        </nav>
        <h5 class="mt-2 ms-2">Bienvenue <?php echo $user ; ?> !</h5>
        <h1 class="d-flex justify-content-center mt-5"> Projets / Equipes </h1>

        <div class="container mt-4">
            <div class="row">
                <div class="col">
                    <div class="d-flex justify-content-start gap-2">
                        <a href="Assigner_Equipe.php"
                            class="col-md-auto col-sm-12 bg-primary p-2 rounded-3 text-light text-decoration-none btn mt-4"><i
                                class="bi bi-bookmark-plus-fill"></i> Affecter une équipe à un projet</a>
                    </div>
                    <table class="table table-primary mt-4 table-hover">
                        <thead>
                            <tr>
                                <th class=" align-middle"> Nom du projet </th>
                                <th class=" align-middle">Nom d'équipe</th>
                            </tr>
                        </thead>
                        <?php
             $req = mysqli_query($conn,"SELECT * FROM projets LEFT JOIN equipes ON projets.equipe_id = equipes.id_equipe ");
             if(mysqli_num_rows($req) == 0){
              $message="Il n'y a pas de projet.";
              
             } else{
              while($row=mysqli_fetch_array($req)){
                ?>
                        <tbody class="table-light ">
                            <tr>
                                <td><?= $row['nom_projet'];?></td>
                                <td><?php echo $row['Name_equipe'];?></td>

                            </tr>
                        </tbody>

                        <?php
              }
             }
             ?>
                    </table>
                </div>
            </div>
        </div>
        </div>
        <p class="text-center fs-5 fw-bolder text-danger"><?php echo $message;?></p>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>