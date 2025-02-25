<?php
    require_once '../back/function.php'
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>web-park connexion</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    </head>
    <body >
        <div class="container text-center">
            <div class="row text-center border border-success m-5" style="width: 500px;">
                <h2>EDITER COMPTE</h2>
                <form method="post" action="../back/function.php" class="text-start" >
                    <div class="form-group mb-1">
                        <label for="name" class="form-label">Nom</label>
                        <?php
                            echo '<input required type="text" name="name" id="name" class="form-control" value='.$_SESSION['edit_name'].'>'
                        ?>
                    </div>
                    <div class="form-group mb-1">
                        <label for="email" class="form-label">Email</label>
                        <?php
                            echo '<input autocomplete="false" required type="text" name="email" id="email" class="form-control" value='.$_SESSION['edit_email'].'>'
                        ?>
                        
                    </div>
                    <div class="form-group mb-1">
                        <label for="contactModify" class="form-label">Téléphone</label>
                        <?php
                            echo '<input autocomplete="false" required type="text" name="contact" id="contact" class="form-control" value='.$_SESSION['edit_contact'].'>'
                        ?>
                        
                    </div>                                        
                    <div class="text-center mb-1">
                        <button type="submit" name="editerUser-submit" class="btn btn-success">connexion</button>
                    </div>
                    <div class="mb-1 text-ligth">
                        <a href="register.html">Connexion</a>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>