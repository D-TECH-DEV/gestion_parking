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
      echo $_SESSION['table_portion'];
  ?>
  </tbody>
  </table>
</div>