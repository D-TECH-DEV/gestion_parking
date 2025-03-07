<?php
 ini_set('display_errors', 1);
 error_reporting(E_ALL);
    //require_once '../controllers/function.php'
    session_start();
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Web Park</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background: linear-gradient(135deg, #4CAF50, #2E7D32);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }
        .btn-custom {
            background-color: #4CAF50;
            border: none;
        }
        .btn-custom:hover {
            background-color: #388E3C;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card p-4 bg-light">
                    <div class="card-body">
                        <h3 class="text-center text-success mb-4">Edition</h3>
                        
                        <form method="post" action="../controllers/function.php" class="text-start" >
                        <div class="form-group mb-1">
                            <label for="name" class="form-label">Nom</label>
                            <?php
                                echo '<input required type="text" name="name" id="name" class="form-control" value="' . $_SESSION['user_name'] . '">';
                            ?>
                        </div>

                            <div class="form-group mb-1">
                                <label for="email" class="form-label">Email</label>
                                <?php
                                    echo '<input required type="text" name="email" id="email" class="form-control" value='.$_SESSION['user_email'].'>'
                                ?>                            </div>
                            <div class="form-group mb-1">
                                <label for="contact" class="form-label">Téléphone</label>
                                <?php
                                    echo '<input required type="text" name="contact" id="contact" class="form-control" value='.$_SESSION['user_contact'].'>'
                                ?>                            
                            </div>                                        
                            <div class="d-grid">
                                <button type="submit" name="editerUser-submit" class="btn btn-custom text-white">Enregistrer</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
                        