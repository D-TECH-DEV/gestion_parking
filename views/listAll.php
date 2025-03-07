
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

    session_start();
   
    require_once '../controllers/function.php';  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="../style.css">
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
                <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About</a>
              </li>
            </ul>
          </div>
        </div>
  </nav>
  <div class="container-fluid ">
   
      <div class="text-center">
      <form action="../controllers/function.php" method="post">
        <ul class="nav nav-pills justify-content-center ">
                <li class="nav-item m-2">
                  <button type="submit" class="btn btn-outline-success"  name="triTous">Tous</button>
                </li>
                <li class="nav-item m-2">
                  <button type="submit" class="btn btn-success" name="triStationnée">Stationnés</button>
                </li>
                <li class="nav-item m-2">
                  <button type="submit" class="btn btn-outline-success" name="triDéstationnée">Déstationnés</button>
                </li>
                
        </ul>
      </form>
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
  </div>
  



           
</body>
</html>