<nav class="navbar navbar-expand-lg navbar-light  shadow-sm">
  <a class="navbar-brand text-primary"
   <?php if ($this->session->userdata('email')):?>
      href="<?= base_url('dashboard'); ?>"
   <?php endif; ?>
  ><img src="<?= base_url('assets/images/logo.svg.png') ?>" class="img-fluid" style="width:110px;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <?php if ($this->session->userdata('id')):?>
        
       <a class="nav-item nav-link <?php if ($this->uri->segment(1) == 'user' && $this->uri->segment(2) == '') echo'active border-bottom border-primary'; ?>" href="<?= base_url('user') ?>">Tagihan</a>
       <a class="nav-item nav-link  ml-2 <?php if ($this->uri->segment(2) == 'historyPembayaran') echo'active  border-bottom border-primary'; ?>" href="<?= base_url('user/historyPembayaran') ?>">History pembayaran</a>
      <?php endif ?>
    </ul>
    <span class="navbar-text">
      <div class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white btn btn-dark btn-sm" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user"></i> <?= $this->session->userdata('nama'); ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" <?php if ($this->session->userdata('email')):?>
      href="<?= base_url('auth/logout'); ?>"
      <?php elseif ($this->session->userdata('id')):?>
      href="<?= base_url('user/logout'); ?>"
   <?php endif; ?>>Logout</a>
        </div>
      </div>
    </span>
  </div>
</nav>