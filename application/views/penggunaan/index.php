<div class="container mt-5">
	<div class="row">	
			<div class="col-md-12 mb-3 shadow-sm">
				<div class="row bg-info rounded p-2">
				<div class="col-sm-6">
					<p class="text-white h3 p-1"><i class="fas fa-folder-open"></i> Data Penggunaan</p>
				</div>
				</div>
			</div>
	</div>
	<div class="row">
		<div class="col-md-4 shadow-sm p-3">
			<form method="post" action="<?= base_url('penggunaan') ?>">
       	   <div class="form-group">
		    <label for="exampleFormControlSelect1">Pelanggan</label>
		    <select class="form-control" name="id_pelanggan" id="exampleFormControlSelect1">
		    <option value="" selected disabled>Pilih pelanggan</option>
		    <?php foreach ($pelanggan as $pe): ?>
		      <option value="<?= $pe->id_pelanggan ?>"><?= $pe->nama .' - '. $pe->nometer ?></option>
		    <?php endforeach ?>
		    </select>
		  </div>
		  <div class="form-group">
		    <label for="exampleInputPassword1">Bulan</label>
		    <input type="text" name="bulan" class="form-control" id="exampleInputPassword1">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Tahun</label>
		    <input type="text" name="tahun" class="form-control">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Meter awal</label>
		    <input type="text" name="meterawal" class="form-control">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Meter akhir</label>
		    <input type="text" name="meterakhir" class="form-control">
		  </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
		</form>
		</div>

		<div class="col-md-8 shadow-sm">
			<table class="table table-striped table-hover myTable" id="">
							<?= $this->session->flashdata('message'); ?>
			<div class="table-responsive">
				<thead class="bg-light">
					<tr>
						<th>NAMA PELANGGAN</th>
						<th>BULAN</th>
						<th>TAHUN</th>
						<th>METER AWAL</th>
						<th>METER AKHIR</th>
						<th>AKSI</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($penggunaan as $p): ?>
						<?php $id = $p->id_penggunaan; ?>
						<?php if ($p->status == 0): ?>
							
					<tr>
						<td><?= $p->nama ?></td>
						<td><?= $p->bulan ?></td>
						<td><?= $p->tahun ?></td>
						<td><?= $p->meterawal ?></td>
						<td><?= $p->meterakhir ?></td>
						<td><a href="" class="btn btn-warning btn-sm m-1" data-toggle="modal" data-target="#modal_edit<?php echo $id; ?>">Edit</a>
							<a href="<?= base_url('penggunaan/delete/') . $p->id_pelanggan ?>" class="btn btn-danger btn-sm">Hapus</a>
							<a href="" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_tagihan<?php echo $id; ?>">Buat tagihan</a>
						</td>
					</tr>
						<?php endif; ?>
					<?php endforeach; ?>
				</tbody>
			</div>
			</table>
			
		</div>
	</div>

</div>

<?php
	foreach($penggunaan as $p):
    $id = $p->id_penggunaan;
?>
<div class="modal fade" id="modal_tagihan<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Buat tagihan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?= base_url('penggunaan/buatTagihan') ?>">
        <div class="row">
        	<div class="col-md-6">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Nama lengkap</label>
			    <input type="hidden" name="id_pelanggan" value="<?= $p->id_pelanggan; ?>">
			    <input type="hidden" name="id_penggunaan" value="<?= $id; ?>">
			    <input type="text" class="form-control"  value="<?= $p->nama; ?>" readonly>
			  </div>	
        	</div>
        	<div class="col-md-6">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Nomor meter</label>
			    <input type="text" class="form-control" value="<?= $p->nometer; ?>" readonly>
			  </div>	
        	</div>
        </div>
        <div class="row">
        	<div class="col-md-6">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Bulan</label>
			    <input type="text" class="form-control" name="bulan"  value="<?= $p->bulan; ?>" readonly>
			  </div>	
        	</div>
        	<div class="col-md-6">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Tahun</label>
			    <input type="text" class="form-control" name="tahun"  value="<?= $p->tahun; ?>" readonly>
			  </div>	
        	</div>
        </div>
        <div class="row">
        	<div class="col-md-6">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Meter awal</label>
			    <input type="text" class="form-control"  value="<?= $p->meterawal; ?>" readonly>
			  </div>	
        	</div>
        	<div class="col-md-6">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Meter akhir</label>
			    <input type="text" class="form-control" value="<?= $p->meterakhir; ?>" readonly>
			  </div>	
        	</div>
        </div>
        <div class="form-group">
		    <label for="exampleInputEmail1">Pemakaian</label>
		    <input type="text" class="form-control" name="jumlahmeter"  value="<?= $p->meterakhir - $p->meterawal; ?>" readonly>
		  </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
		</form>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>


<?php
	foreach($penggunaan as $p):
    $id = $p->id_penggunaan;
?>
<div class="modal fade" id="modal_tagihan<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Buat tagihan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?= base_url('penggunaan/buatTagihan') ?>">
        <div class="row">
        	<div class="col-md-6">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Nama lengkap</label>
			    <input type="hidden" name="id_pelanggan" value="<?= $p->id_pelanggan; ?>">
			    <input type="hidden" name="id_penggunaan" value="<?= $id; ?>">
			    <input type="text" class="form-control"  value="<?= $p->nama; ?>" readonly>
			  </div>	
        	</div>
        	<div class="col-md-6">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Nomor meter</label>
			    <input type="text" class="form-control" value="<?= $p->nometer; ?>" readonly>
			  </div>	
        	</div>
        </div>
        <div class="row">
        	<div class="col-md-6">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Bulan</label>
			    <input type="text" class="form-control" name="bulan"  value="<?= $p->bulan; ?>" readonly>
			  </div>	
        	</div>
        	<div class="col-md-6">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Tahun</label>
			    <input type="text" class="form-control" name="tahun"  value="<?= $p->tahun; ?>" readonly>
			  </div>	
        	</div>
        </div>
        <div class="row">
        	<div class="col-md-6">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Meter awal</label>
			    <input type="text" class="form-control"  value="<?= $p->meterawal; ?>" readonly>
			  </div>	
        	</div>
        	<div class="col-md-6">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Meter akhir</label>
			    <input type="text" class="form-control" value="<?= $p->meterakhir; ?>" readonly>
			  </div>	
        	</div>
        </div>
        <div class="form-group">
		    <label for="exampleInputEmail1">Pemakaian</label>
		    <input type="text" class="form-control" name="jumlahmeter"  value="<?= $p->meterakhir - $p->meterawal; ?>" readonly>
		  </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
		</form>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>

<?php
	foreach($penggunaan as $p):
    $id = $p->id_penggunaan;
?>
<div class="modal fade" id="modal_edit<?php echo $id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit penggunaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?= base_url('penggunaan/edit') ?>">
		  <div class="form-group">
		    <label for="exampleInputEmail1">Pelanggan</label>
		    <input type="hidden" name="id_penggunaan" value="<?= $p->id_penggunaan ?>">
		    <select class="form-control" name="id_pelanggan" id="exampleFormControlSelect1">
		    <option value="" selected disabled>Pilih pelanggan</option>
		    <?php foreach ($pelanggan as $pe): ?>
		    <?php if ($pe->id_pelanggan == $p->id_pelanggan): ?>
		      <option value="<?= $pe->id_pelanggan ?>" selected><?= $pe->nama .' - '. $pe->nometer ?></option>
		 	<?php else: ?>
		 		<option value="<?= $pe->id_pelanggan ?>"><?= $pe->nama .' - '. $pe->nometer ?></option>
		    <?php endif ?>
		    <?php endforeach ?>
		    </select>
		  </div>	
        <div class="row">
        	<div class="col-md-6">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Bulan</label>
			    <input type="text" class="form-control" name="bulan"  value="<?= $p->bulan; ?>" >
			  </div>	
        	</div>
        	<div class="col-md-6">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Tahun</label>
			    <input type="text" class="form-control" name="tahun"  value="<?= $p->tahun; ?>" >
			  </div>	
        	</div>
        </div>
        <div class="row">
        	<div class="col-md-6">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Meter awal</label>
			    <input type="text" class="form-control" name="meterawal"  value="<?= $p->meterawal; ?>" >
			  </div>	
        	</div>
        	<div class="col-md-6">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Meter akhir</label>
			    <input type="text" class="form-control" name="meterakhir" value="<?= $p->meterakhir; ?>" >
			  </div>	
        	</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
		</form>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>