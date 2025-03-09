<div class="row">
            <div class="col-md-6 col-lg-5 mb-3">
              <div class="card shadow-sm h-100 bg-success text-light">
                <div class="card-body">
                  <h5 class="card-title">Total Station</h5>
                  <p class="card-text">23</p>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-5 mb-3">
              <div class="card shadow-sm h-100 bg-success text-light">
                <div class="card-body">
                  <h5 class="card-title">Total Stationnée</h5>
                  <p class="card-text">
                  <?php
                     echo $_SESSION['nbre_satatinées'];
                  ?>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-5 mb-3">
              <div class="card shadow-sm h-100 bg-success text-light">
                <div class="card-body">
                  <h5 class="card-title">Places libres</h5>
                  <p class="card-text">
                  <?php
                     echo $_SESSION['nbre_librePlace'];
                  ?>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-5 mb-3">
              <div class="card shadow-sm h-100 bg-success text-light">
                <div class="card-body">
                  <h5 class="card-title">Total journée</h5>
                  <p class="card-text">102</p>
                </div>
              </div>
            </div>
          </div>