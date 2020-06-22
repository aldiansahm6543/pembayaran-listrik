<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
<div class="container" style="margin-top: 10%;">
	<div class="col-md-12">
		<div class="p-5 shadow-lg bg-light" border="1">
			
		<div class="row">
			<div class="col-md-6">
				<img src="<?= base_url('assets/images/logo.jpg') ?>" class="img-fluid rounded-lg">
			</div>
			<div class="col-md-5 mx-auto" >
			<?= $this->session->flashdata('message'); ?>
			<form action="<?= base_url('auth'); ?>" method="post">	

				<div class="form-group">
					<h3 class="mb-2 mt-2 text-center text-primary">Login</h3>
					<label>Email</label>
					<div class="input-group">
						<div class="input-group-prepend">
				          <div class="input-group-text"><i class="fas fa-at"></i></div>
				        </div>
						<input type="email" name="email" class="form-control" placeholder="Masukan email....">
						<?= form_error('email', '<small class="form-text text-danger">', '</small>') ?>
					</div>
				</div>
				<div class="form-group">
					<label>Password</label>
					<div class="input-group">
						<div class="input-group-prepend">
				          <div class="input-group-text"><i class="fas fa-key"></i></div>
				        </div>
					<input type="password" name="password" class="form-control" placeholder="****">
					<?= form_error('password', '<small class="form-text text-danger">', '</small>') ?>
					</div>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block rounded-pill">Login</button>
				</div>
			</form>	
			</div>
		</div>
		</div>
	</div>
</div>







<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>