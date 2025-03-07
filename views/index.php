<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
    require '../controllers/function.php';
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
        
        <div class="col-lg-4 ">
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

        
        <div class="col-lg-8">
          <div class="row">
            <div class="col-md-6 col-lg-5 mb-3">
              <div class="card shadow-sm h-100">
                <div class="card-body">
                  <h5 class="card-title">Total Station</h5>
                  <p class="card-text">23</p>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-5 mb-3">
              <div class="card shadow-sm h-100">
                <div class="card-body">
                  <h5 class="card-title">Total Stationnée</h5>
                  <p class="card-text">
                  <?php
                     echo $nbre;
                  ?>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-5 mb-3">
              <div class="card shadow-sm h-100">
                <div class="card-body">
                  <h5 class="card-title">Places libres</h5>
                  <p class="card-text">
                  <?php
                     echo 23-$nbre;
                  ?>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-5 mb-3">
              <div class="card shadow-sm h-100">
                <div class="card-body">
                  <h5 class="card-title">Total journée</h5>
                  <p class="card-text">102</p>
                </div>
              </div>
            </div>
          </div>

          
          <div class="table-container shadow-sm">
            <table class="table table-hover table-bordered text-center">
              <thead class="table-success">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Propriétaire</th>
                  <th scope="col">Marque</th>
                  <th scope="col">Série</th>
                  <th scope="col">Couleur</th>
                  <th scope="col">Matricule</th>
                  <th scope="col">Position</th>
                  <th scope="col">Statut</th>
                </tr>
              </thead>
              <tbody id="tbody">
              <?php
                   echo $_SESSION['table'];
                ?>
              </tbody>
            </table>
          </div>
          <div class="text-end">
            <!-- <a href="listAll.php" name="submit-listAll" class="btn btn-outline-success" >
              Afficher tout
            </a> -->

           <form action="../controllers/function.php" method="post">
            <button  name="submit-listAll" class="btn btn-outline-success" >
                Afficher touts
              </button>
           </form>
          </div>
        </div>
      </div>
    </div>


      <!-- Modal de stationnement -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Stationnement</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-center">
            <form method="post" action="../controllers/function.php" class="row g-3">
              <div class="col-md-12">
                <label for="validationDefault01" class="form-label">Propriétaire</label>
                <input type="text" class="form-control" id="validationDefault01" name="propriétaire" required>
              </div>
              <div class="col-md-6">
                <label for="validationDefault02" class="form-label">Marque</label>
                <input type="text" class="form-control" id="validationDefault02" name="marque"  required>
              </div>
              <div class="col-md-6">
                <label for="validationDefault02" class="form-label">Série</label>
                <input type="text" class="form-control" id="validationDefault02" name="serie" required> 
              </div>
              <div class="col-md-5">
                <label for="validationDefault03" class="form-label">Couleur</label>
                <input type="text" class="form-control" id="validationDefault03" name="color" required>
              </div>
              <div class="col-md-5">
                <label for="validationDefault05" class="form-label">Matricule</label>
                <input type="text" class="form-control" id="validationDefault05" name="matricule" required>
              </div>
              <div class="col-md-4">
                <label for="validationDefault04" class="form-label">Position</label>
                <select class="form-select" id="validationDefault04" name="position" required>
                  <option selected disabled value=""></option>
                  <option>...</option>
                </select>
              </div>
              
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="submit-staionnement" class="btn btn-outline-success" >Valider</button>
              </div>
            </form>
          </div>
         
        </div>
      </div>
    </div>
   
    


      <!-- Modal de destationnement -->
    <div>
      <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <form action="../controllers/function.php" method="post" class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Déstationnement</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div>
                <label for="matr">Matricule</label>
                <input type="text" id="matr" name="matr-dest" class="form-control">
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-outline-success" name="submit-déstation" type="submit">Déstationnés</button>
            </div>
          </form>
        </div>
      </div>
    
    </div>
    
    <div>
      <div class="modal fade" id="chagepassword" aria-hidden="true" aria-labelledby="chagepasswordLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
          <form action="../controllers/function.php" method="post" class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="chagepasswordLabel">Changer mot de passe</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="mb-3">
                <label for="oldpassword">Ancien mot de passe</label>
                <input type="text" id="oldpassword" name="oldpassword" class="form-control">
              </div>
              <div class="mb-3">
                <label for="newpassword">Nouveau mot de passe</label>
                <input type="text" id="newpassword" name="newpassword" class="form-control">
              </div>
              <div class="mb-3">
                <label for="newpassconfirm">Confirmer nouveau mot de passe</label>
                <input type="text" id="newpassconfirm" name="newpassconfirm" class="form-control">
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-outline-success" name="submit-déstation" type="submit">Déstationnés</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" defer></script>
  </body>
</html>