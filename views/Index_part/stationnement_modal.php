<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Stationnement</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
        <form method="post" action="../controllers/autoControllers/stationnerController.php" class="row g-3">
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