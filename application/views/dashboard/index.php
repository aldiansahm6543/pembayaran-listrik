<div class="container mt-5">
          <nav >
            <div class="nav nav-tabs  rounded"  id="nav-tab" role="tablist">
              <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
              <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Data master</a>
            </div>
          </nav>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active p-4" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            
            <div class="jumbotron bg-dark text-white shadow-lg">
              <h1 class="display">Selamat datang <?= $this->session->userdata('nama'); ?></h1>
            </div>

          </div>
          <div class="tab-pane fade p-4" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="row">
            <div class="col-sm-4">
              <a href="<?= base_url('pelanggan') ?>" style="text-decoration: none;">
                <div class="card bg-gray mb-3 shadow">
                  <div class="card-body text-center">
                    <i class="fas fa-users fa-4x"></i>
                    <h5 class="card-title">Data pelanggan</h5>
                  </div>
                </div>
              </a>
              </div>
              <div class="col-sm-4">
              <a href="<?= base_url('pembayaran') ?>" style="text-decoration: none;">
                <div class="card bg-gray mb-3 shadow">
                  <div class="card-body text-center">
                    <i class="fas fa-money-bill-wave fa-4x"></i>
                    <h5 class="card-title">Pembayaran</h5>
                  </div>
                </div>
              </a>
              </div>
              <div class="col-sm-4">
              <a href="<?= base_url('pembayaran/bukti') ?>" style="text-decoration: none;">
                <div class="card bg-gray mb-3 shadow">
                  <div class="card-body text-center">
                    <i class="fas fa-folder-open fa-4x"></i>
                    <h5 class="card-title">Bukti pembayaran</h5>
                  </div>
                </div>
              </a>
              </div>
              <div class="col-sm-4">
              <a href="<?= base_url('tarif') ?>" style="text-decoration: none;">
                <div class="card bg-gray mb-3 shadow">
                  <div class="card-body text-center">
                    <i class="fas fa-folder-open fa-4x"></i>
                    <h5 class="card-title">Tarif</h5>
                  </div>
                </div>
              </a>
              </div>
              <div class="col-sm-4">
              <a href="<?= base_url('tagihan') ?>" style="text-decoration: none;">
                <div class="card bg-gray mb-3 shadow">
                  <div class="card-body text-center">
                    <i class="fas fa-folder-open fa-4x"></i>
                    <h5 class="card-title">Tagihan</h5>
                  </div>
                </div>
              </a>
              </div>
              <div class="col-sm-4">
              <a href="<?= base_url('penggunaan') ?>" style="text-decoration: none;">
                <div class="card bg-gray mb-3 shadow">
                  <div class="card-body text-center">
                    <i class="fas fa-user fa-4x"></i>
                    <h5 class="card-title">Data penggunaan</h5>
                  </div>
                </div>
              </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      

