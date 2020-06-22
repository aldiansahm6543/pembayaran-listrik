<div class="container mt-5">
	<div class="row">	
			<div class="col-md-12 mb-3 ">
				<div class="row bg-info rounded p-2">
				<div class="col-sm-6">
					<p class="text-white h3 p-1"><i class="fas fa-folder-open"></i>Tagihan Listrik <strong><?= $this->session->userdata('nama'); ?></strong></p>
				</div>
				</div>
			</div>
	</div>

			<div class="table-responsive">
			<table class="table table-stripped table-hover myTable" id="">
				<?= $this->session->flashdata('message'); ?>
				<thead class="bg-light">
					<tr>
						<th>NAMA PELANGGAN</th>
						<th>BULAN</th>
						<th>TAHUN</th>
						<th>JUMLAH METER</th>
						<th>TOTAL HARGA</th>
						<th>STATUS</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($tagihan as $t): ?>
						<?php $id = $t->id_tagihan; ?>
					<?php if ($t->status == 0): ?>
						
					<tr>
						<td><?= $t->nama ?></td>
						<td><?= $t->bulan ?></td>
						<td><?= $t->tahun ?></td>
						<td><?= $t->jumlahmeter ?></td>
						<td><?= rupiah($t->tarifperkwh * $t->jumlahmeter + 2500) ?></td>
						<td>
							<?php if ($bukti): ?>
								<?php foreach ($bukti as $b): ?>
									
									<?php if ($b->tagihan_id  == $t->id_tagihan): ?>
										<a href="" class="btn btn-warning btn-sm disabled" disabled>Dalam proses..</a>
									<?php elseif($t->id_tagihan): ?>
										<a href="" class="btn btn-info btn-sm <?php if ($t->status == 1) echo 'disabled' ?>" data-toggle="modal" data-target="#upload-pembayaran<?= $id ?>"><i class="fas fa-file-upload mr-2"></i>Upload pembayaran</a></td>
									<?php endif ?>
								<?php endforeach ?>
							<?php else: ?>
								<a href="" class="btn btn-info btn-sm <?php if ($t->status == 1) echo 'disabled' ?>" data-toggle="modal" data-target="#upload-pembayaran<?= $id ?>"><i class="fas fa-file-upload mr-2"></i>Upload pembayaran</a></td>
							<?php endif ?>
					</tr>
					<?php endif ?>
					<?php endforeach; ?>
				</tbody>
			</table>
			</div>

	
	<div class="row mt-5">
		<div class="col-lg-10">
			<p  style="font-size: 18px; font-weight: 400;">Cara bayar tagihan listrik klik<a href="" data-toggle="modal" data-target="#cara-bayar"> disini</a></p>
		</div>
	</div>	



</div>

<!-- Modal -->
<div class="modal fade" id="cara-bayar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cara <strong>bayar</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="col-12 ml-2">
      		
        <p>1. Transfer sesuai nominal dari tagihan listrik yang dibayar ke rekening PLN yang sudah dicantumkan dibawah</p>
        <p>2. Setelah transfer, upload bukti transfer tersebut dengan cara klik upload pembayaran sesuai tagihan listrik yang anda bayar </p>
        <p>3. Isi form upload pembayaran</p>
        <p>4. Lalu klik <strong>submit</strong></p>
        <p>5. Tunggu 1 - 10 menit pembayaran anda akan dikonfirmasi oleh admin</p>
        <p>Selsai.</p>

        <h5>payment:</h5>
        <div class="row">
        	<div class="col-md-6">
        		<div class="card bg-light mb-3" style="max-width: 18rem;">
				  <div class="card-header">BCA <br><small class="text-muted">Bank Central Asia</small></div>
				  <div class="card-body">
				    <p class="card-text" style="font-size: 12px;">Rekening bank : <span class="text-danger">770987654</span>
				    <br>Nama pemegang rekening : <span class="text-danger">PLN bayar listrik</span></p>
				  </div>
				</div>
        	</div>
        	<div class="col-md-6">
        		<div class="card bg-light mb-3" style="max-width: 18rem;">
				  <div class="card-header">BRI <br><small class="text-muted">Bank Rakyat Indonesia</small></div>
				  <div class="card-body">
				    <p class="card-text" style="font-size: 12px;">Rekening bank : <span class="text-danger">1067863717</span>
				    <br>Nama pemegang rekening : <span class="text-danger">PLN bayar listrik</span></p>
				  </div>
				</div>
        	</div>
        	<div class="col-md-6">
        		<div class="card bg-light mb-3" style="max-width: 18rem;">
				  <div class="card-header">MANDIRI <br><small class="text-muted">Bank Mandiri</small></div>
				  <div class="card-body">
				    <p class="card-text" style="font-size: 12px;">Rekening bank : <span class="text-danger">17500098278</span>
				    <br>Nama pemegang rekening : <span class="text-danger">PLN bayar listrik</span></p>
				  </div>
				</div>
        	</div>
        	<div class="col-md-6">
        		<div class="card bg-light mb-3" style="max-width: 18rem;">
				  <div class="card-header">BNI <br><small class="text-muted">Bank Negara Indonesia</small></div>
				  <div class="card-body">
				    <p class="card-text" style="font-size: 12px;">Rekening bank : <span class="text-danger">556712737</span>
				    <br>Nama pemegang rekening : <span class="text-danger">PLN bayar listrik</span></p>
				  </div>
				</div>
        	</div>
        </div>

      	</div>
      </div>
    </div>
  </div>
</div>

<?php foreach ($tagihan as $t): ?>
<?php $id = $t->id_tagihan; ?>
<div class="modal fade" id="upload-pembayaran<?= $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload bukti pembayran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?= base_url('user/uploadpembayaran') ?>" enctype="multipart/form-data">	
		<div class="form-group">
		    <label for="exampleInputEmail1">Nama pemilik rekening</label>
		    <input type="hidden" name="id_tagihan" value="<?= $t->id_tagihan ?>">
		    <input type="text" class="form-control" name="nama"  >
		 </div>
		 <div class="row">
		 	<div class="col">
		 	<div class="form-group">
			    <label for="exampleInputEmail1">Dari Bank</label>
			    <input type="text" class="form-control" name="bank"  >
			 </div>
		 	</div>
		 	<div class="col">
		 	<div class="form-group">
			    <label for="exampleInputEmail1">Nomor rekening</label>
			    <input type="text" class="form-control" name="norek"  >
			 </div>
		 	</div>
		 </div>
		 		 <div class="form-group">
		    <label for="exampleInputEmail1">Bank yang dituju</label>
		    <select class="form-control" name="bank_tuju">
		    	<option value="" disabled selected>- Pilih -</option>
		    	<option value="BRI">BRI - 1067863717</option>
		    	<option value="BCA">BCA - 770987654</option>
		    	<option value="MANDIRI">MANDIRI - 17500098278</option>
		    	<option value="BNI">BNI - 556712737</option>
		    </select>
		 </div>
		 <div class="form-group">
		    <label for="exampleInputEmail1">foto bukti pembayaran</label>
		    <input type="file" class="form-control" name="gambar"  >
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




