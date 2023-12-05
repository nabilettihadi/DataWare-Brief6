<?php
include "connexion.php";
$message="";
$msg="";
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
    <!-- <link rel="stylesheet" href="style.css" type="text/css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">

    <title>Gestion Equipe</title>
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
        <!-- Navbar -->
        <h1 class="d-flex justify-content-center mt-5 "> Gestion les membres d'équipe </h1>

        <div class=" d-flex justify-content-center ">
            <div class="col-md-10 px-2 ">
                <?php
        $resultat=mysqli_query($conn,"SELECT * FROM equipes WHERE scrum_master_id=$membre ");
        if(mysqli_num_rows($resultat) == 0){
          $msg="Il n'y a pas encore d'équipe.";
          
         } else{
        while($row=mysqli_fetch_assoc($resultat)){
          $equipe_id = $row['id_equipe'];
          $equipe_nom = $row['Name_equipe'];
          echo  "<h3 class='mt-4 text-primary'> Les membres d'équipe $equipe_nom : <a class='bg-primary rounded-3 text-light text-decoration-none btn' href='Ajouter_Membre.php?equipe_id=$equipe_id'>Ajouter un membre</a> </h3>";

          $membres_result = mysqli_query($conn, "SELECT * FROM users WHERE id_equip = $equipe_id AND role = 'user' ");
          if(mysqli_num_rows($membres_result) == 0){
            echo "<h6 class='text-danger'> Il n'y a pas encore de membre. </h6>";
            
           } else{
          echo "<ul class='list-unstyled mt-4'>";
          while ($membre_row = mysqli_fetch_assoc($membres_result)) {
              $membre_prenom = $membre_row['First_name'];
              $membre_nom = $membre_row['Last_name'];
              $membre_id = $membre_row['id_user'];
  
              // Afficher chaque membre avec un bouton pour le supprimer
              echo "<div class='d-flex justify-content-between w-25 mb-3 mt-3 flex-wrap'><li class='fs-5'>$membre_prenom $membre_nom </li>
                <a class='bg-danger rounded-3 text-light text-decoration-none btn ' href='Supprimer_Membre.php?membre_id=$membre_id'>Supprimer</a></div>";
           }      
          }
        } 
      }
        ?>
                <h2 class="text-danger mt-5 text-center"><?php echo $msg; ?></h2>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>