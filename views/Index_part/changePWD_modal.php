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