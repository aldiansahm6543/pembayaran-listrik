<div class="container mt-5">
	<div class="row">	
			<div class="col-md-12 mb-3 shadow-sm">
				<div class="row bg-info rounded p-2">
				<div class="col-sm-6">
					<p class="text-white h3 p-1"><i class="fas fa-folder-open"></i> Data Pelanggan</p>
				</div>
				</div>
			</div>
	</div>
	<div class="row">
		<div class="col-md-4 shadow-sm p-3">
			<div class="h4 p-3 rounded text-info shadow-sm">Tambah data</div>
			<form method="post" action="<?= base_url('pelanggan') ?>">
		  <div class="form-group">
		    <label for="exampleInputEmail1">Nama lengkap</label>
		    <input type="text" name="nama" class="form-control">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Nomor meter</label>
		    <input type="text" name="nometer" class="form-control" id="exampleInputPassword1">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Alamat</label>
		    <input type="text" name="alamat" class="form-control">
		  </div>
       	   <div class="form-group">
		    <label for="exampleFormControlSelect1">Tarif per kwh</label>
		    <select class="form-control" name="kodetarif" id="exampleFormControlSelect1">
		    <option value="" selected disabled>Pilih tarif</option>
		    <?php foreach ($tarif as $t): ?>
		      <option value="<?= $t->kodetarif ?>"><?= $t->kodetarif .' - '. $t->daya . ' - '. rupiah($t->tarifperkwh, '2', ',', '.') ?> </option>
		    <?php endforeach ?>
		    </select>
		  </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
		</form>
		</div>

	<div class="col-md-8 shadow-sm">
		<table class="table  table-striped table-hover myTable" id="">
		<?= $this->session->flashdata('message'); ?>
		<div class="table-responsive">
			<thead>
				<tr>
					<th>NO METER</th>
					<th>NAMA</th>
					<th>ALAMAT</th>
					<th>KODE TARIF</th>
					<th>AKSI</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($pelanggan as $p): ?>
				<tr>
					<td><?= $p->nometer ?></td>
					<td><?= $p->nama ?></td>
					<td><?= $p->alamat ?></td>
					<td><?= $p->kodetarif ?></td>
					<td><a href="" class="btn btn-info btn-sm">Detail</a></td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</div>
		</table>
	</div>
</div>

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
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>


