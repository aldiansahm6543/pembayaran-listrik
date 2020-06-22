<div class="container mt-5">
	<div class="row">	
			<div class="col-md-12 mb-3 ">
				<div class="row bg-info rounded p-2">
				<div class="col-sm-6">
					<p class="text-white h3 p-1"><i class="fas fa-folder-open"></i> Data tarif</p>
				</div>
				<div class="col-sm-6 float-right">
					<button type="button" class="btn btn-primary float-right mt-1" data-toggle="modal" data-target="#exampleModal">
					  Tambah data
					</button>	
				</div>
				</div>
			</div>
	</div>
<table class="table table-stripped table-hover myTable" id="">
				<?= $this->session->flashdata('message'); ?>
<div class="table-responsive">
	<thead class="bg-light">
		<tr>
			<th>KODE TARIF</th>
			<th>DAYA</th>
			<th>TARIF PER KWH</th>
			<th>AKSI</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($tarif as $t): ?>
		<tr>
			<td><?= $t->kodetarif ?></td>
			<td><?= $t->daya ?></td>
			<td><?= $t->tarifperkwh ?></td>
			<td><a href="" class="btn btn-warning btn-sm">Update</a>
				<a href="<?= base_url('tarif/delete/') . $t->kodetarif ?>" class="btn btn-info btn-sm">Delete</a></td>
		</tr>
		<?php endforeach ?>
	</tbody>
</div>
</table>

</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?= base_url('tarif') ?>">
		  <div class="form-group">
		    <label for="exampleInputEmail1">Kode tarif</label>
		    <input type="text" class="form-control" name="kodetarif">
		    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Daya</label>
		    <input type="text" name="daya" class="form-control" id="exampleInputPassword1">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Tarif per kwh</label>
		    <input type="text" name="tarifperkwh" class="form-control">
		  </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
		</form>
      </div>
    </div>
  </div>
</div>