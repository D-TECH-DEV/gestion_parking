<div>
    <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form action="../controllers/autoControllers/destationerController.php" method="post" class="modal-content">
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