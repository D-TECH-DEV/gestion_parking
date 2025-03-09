<?php
  ini_set('display_errors', 1);
  error_reporting(E_ALL);

  session_start();

    
    if (!isset($_SESSION['user_id'])){
      header ('Location: login.html');
    }

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Web-Park</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar {
            background-color: #198754 !important;
        }

        .card {
            transition: transform 0.3s ease-in-out;
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        .card:hover {
            transform: translateY(-5px);
        }

        .profile-card {
            background: linear-gradient(135deg, #198754, #145a32);
            color: white;
            text-align: center;
            padding: 20px;
            border-radius: 15px;
        }

        .table-container {
            max-height: 400px;
            overflow-y: auto;
        }

        .table thead th {
            position: sticky;
            top: 0;
            background-color: #198754;
            color: white;
            z-index: 1;
        }

        .auther .card {
          background: linear-gradient(135deg, #198754, #145a32);

        }
    </style>
  </head>
  <body>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-success shadow-sm">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Web-Park</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Accueil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    
    <div class="container-fluid ">
      <div class="row">
        
        <div class="col-lg-3 mt-5">
          <div class="card shadow-sm">
            <div class="card-body text-center">
              <img src="../asset/images/img-prof.png" alt="Profile Image" class="img-fluid rounded-circle mb-3" style="width: 40%;">
              <h3>
                <?php
                  echo $_SESSION['user_name']
                ?>
              </h3>
              <hr>
              <button class="btn btn-outline-success w-100 mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-parking"></i> Stationnement</button>
              <button class="btn btn-outline-success w-100 mb-2" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"><i class="bi bi-sign-stop"></i> Déstationnement</button>
              <hr>
                <a href="editerUser.php" name="modifyUser" class="btn btn-outline-primary w-100 mb-2"><i class="bi bi-person-lines-fill"></i> Modifier profil</a>
              <button  class="btn btn-outline-primary w-100 mb-2" data-bs-target="#chagepassword" data-bs-toggle="modal"><i class="bi bi-key-fill"></i> Changer mot de passe</button>
              <hr>
              <!-- <form method="post" action="../controllers/function.php"> -->
              <form method="post" action="../controllers/usersControllers/logoutController.php">
                <button name="deconnexion-submit" class="btn btn-outline-danger w-100"><i class="bi bi-box-arrow-left"></i> Deconnexion</button>
              </form>
            </div>
          </div>
        </div>

        
        <div class="col-lg-9 mt-5">

        <!-- statistique -->
        <?php include 'Index_part/statistic.php' ?>
        
          <!-- tabale -->
          <?php include 'Index_part/table.php' ?>

          <div class="text-end">
            <a href="listAll.php" name="submit-listAll" class="btn btn-outline-success" >
              Afficher tout
            </a>
          </div>
        </div>
      </div>
    </div>


      <!-- Modal de stationnement -->
      <?php include 'Index_part/stationnement_modal.php' ?>

      <!-- Modal de destationnement -->
      <?php include 'Index_part/destationnement_modal.php' ?>
    
     <!-- Modal de destationnement -->
     <?php include 'Index_part/changePWD_modal.php' ?>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
  </body>
</html>