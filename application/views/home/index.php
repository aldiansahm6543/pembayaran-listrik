<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>



<nav class="navbar navbar-expand-lg navbar-light">
	<div class="container">
	  <a class="navbar-brand" href="#">PLN</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
	    <div class="navbar-nav ml-auto">
	      <a class="nav-item nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
	      <a class="nav-item nav-link " href="#">About</a>
	      <a class="nav-item nav-link btn btn-primary ml-2" data-target="#modal_login" data-toggle="modal" href="#">Login</a>
	    </div>
	  </div>
	</div>
</nav>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Aplikasi Pembayaran Listrik</h1>
  </div>
</div>


<div class="container">
	<div class="row justify-content-center">
		<div class="col-10 info-panel">
			<div class="row">
				<div class="col-lg">
					<i class="fas fa-money-bill-wave fa-4x float-left"></i>
					<h4>Bayar online</h4>
					<p>Lorem ipsum dolor sit amet</p>
				</div>
				<div class="col-lg">
					<i class="fab fa-servicestack fa-4x float-left"></i>
					<h4>Pelayanan</h4>
					<p>Lorem ipsum dolor sit amet</p>
				</div>
				<div class="col-lg">
					<i class="fas fa-user fa-4x float-left"></i>
					<h4>Penggunaan</h4>
					<p>Lorem ipsum dolor sit amet</p>
				</div>
			</div>
		</div>
	</div>

	<div class="row workingspace">
		<div class="col-lg-6 ">
			<img src="<?= base_url('assets/images/logo.jpg') ?>" class="img-fluid">
		</div>
		<div class="col-lg-6">
			<h3>Pembayaran <strong>Listrik</strong> Pasca <strong>Bayar</strong></h3>
			<p>Sistem layanan listrik pascabayar merupakan layanan listrik yang tagihannya per bulan, dan pembayaran dilakukan setelah pemakaian. Pembayaran listrik bisa dilakukan langsung lewat loket atau secara online menggunakan aplikasi milik PLN.</p>
			<a href="" class="btn btn-primary" style="border-radius: 15px;">Gallery</a>
		</div>
	</div>


	<div class="row footer">
		<div class="col text-center">
			<p>2020 All Rights Reserved by Aldiansah</p>
		</div>
	</div>

</div>









<div class="modal fade" id="modal_login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Buat tagihan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<?= $this->session->flashdata('message'); ?>
        <form method="post" action="<?= base_url('auth/loginUser') ?>">
		  <div class="form-group">
		    <label for="exampleInputEmail1">Nama</label>
		    <div class="input-group">
				<div class="input-group-prepend">
		          <div class="input-group-text"><i class="fas fa-at"></i></div>
		        </div>
				<input type="text" name="nama" class="form-control" placeholder="Masukan nama..">
				<?= form_error('nama', '<small class="form-text text-danger">', '</small>') ?>
			</div>
		  </div>	
		  <div class="form-group">
		    <label for="exampleInputEmail1">Nomor meter</label>
		    <div class="input-group">
				<div class="input-group-prepend">
		          <div class="input-group-text"><i class="fas fa-key"></i></div>
		        </div>
				<input type="text" name="nometer" class="form-control" placeholder="Masukan nometer..">
				<?= form_error('nometer', '<small class="form-text text-danger">', '</small>') ?>
			</div>
		  </div>	
    	</div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Login</button>
		</form>
      </div>
    </div>
  </div>
</div>




<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>

	$(document).ready( function () {
    $('.myTable').DataTable();
} ); 
</script>
</body>
</html>