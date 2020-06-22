<div class="container mt-5">
	<div class="row">	
			<div class="col-md-12 mb-3 ">
				<div class="row bg-info rounded p-2">
				<div class="col-sm-6">
					<p class="text-white h3 p-1"><i class="fas fa-folder-open"></i> Data Tagihan</p>
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
						<th>STATUS</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($tagihan as $t): ?>
					<tr>
						<td><?= $t->nama ?></td>
						<td><?= $t->bulan ?></td>
						<td><?= $t->tahun ?></td>
						<td><?= $t->jumlahmeter ?></td>
						<td><a 
    href="javascript:;"
    data-idpelanggan="<?php echo $t->id_pelanggan ?>"
    data-idtagihan="<?php echo $t->id_tagihan ?>"
    data-nama="<?php echo $t->nama ?>"
    data-nometer="<?php echo $t->nometer ?>"
    data-tarifperkwh="<?php echo $t->tarifperkwh ?>"
    data-jumlahmeter="<?php echo $t->jumlahmeter ?>"
    data-toggle="modal" data-target="#modal-bayar"> <button class="btn btn-info btn-sm <?php if ($t->status == 1) echo 'disabled' ?>" data-toggle="modal">Bayar</button></a></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			</div>

			</div>

<div class="modal fade" id="modal-bayar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Buat tagihan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<form action="<?= base_url('tagihan/bayar') ?>" method="post">
      	 <div class="row">
        	<div class="col-md-6">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Nama lengkap</label>
			    <input type="hidden" name="id_pelanggan" id="pelanggan">
			    <input type="hidden" name="id_tagihan" id="tagihan">
			    <input type="text" class="form-control"  id="nama" readonly>
			  </div>	
        	</div>
        	<div class="col-md-6">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Nomor meter</label>
			    <input type="text" class="form-control" id="nometer" readonly>
			  </div>	
        	</div>
        </div>
        <div class="row">
        	<div class="col-md-6">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Tanggal</label>
			    <input type="text" class="form-control" name="tanggal"  value="<?= date('Y-m-d'); ?>" readonly>
			  </div>	
        	</div>
        	<div class="col-md-6">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Bulan bayar</label>
			    <input type="text" class="form-control" name="bulanbayar" value="<?=  date('F') ?>" readonly>
			  </div>	
        	</div>
        </div>
        <div class="row">
        	<div class="col-md-6">
	        	<div class="form-group">
		   			<label for="exampleInputEmail1">Tarif per kwh</label>
		    		<input type="text" class="form-control" id="tarifperkwh" readonly>
		  		</div>
		  	</div>
		  	<div class="col-md-6">
			  	<div class="form-group">
		   			<label for="exampleInputEmail1">Pemakaian</label>
		    		<input type="text" class="form-control" id="jumlahmeter" readonly>
		  		</div>
			</div>
		 </div>	
		 <div class="form-group">
			    <label for="exampleInputEmail1">Biaya admin</label>
			    <input type="number" class="form-control" name="biayaadmin" id="biayaadmin" onchange="hitung()">
			  </div>
		  <div class="form-group text-center">
		    <label for="exampleInputEmail1">Total bayar</label>
		    <input type="text" class="form-control col-md-6 mx-auto" id="total" value="" name="totalbayar"  readonly>
		  </div>


       </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
		</form>
      </div>
    </div>
  </div>
</div>	
<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script>
    $(document).ready(function() {
        // Untuk sunting
        $('#modal-bayar').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget); // Tombol dimana modal di tampilkan
            var modal = $(this);

            // Isi nilai pada field
            modal.find('#pelanggan').attr("value",div.data('idpelanggan'));
             modal.find('#tagihan').attr("value",div.data('idtagihan'));
            modal.find('#nama').attr("value",div.data('nama'));
            modal.find('#nometer').attr("value",div.data('nometer'));
            modal.find('#tarifperkwh').attr("value",div.data('tarifperkwh'));
            modal.find('#jumlahmeter').attr("value",div.data('jumlahmeter'));
        });
    });
</script>

		<script>
			function hitung() {

			var vjumlahmeter = document.getElementById("jumlahmeter").value;
			var vbiayaadmin = document.getElementById("biayaadmin").value;
			var vtarifperkwh = document.getElementById("tarifperkwh").value;

			var jumlah_harga = parseInt(vjumlahmeter) * parseInt(vtarifperkwh) + parseInt(vbiayaadmin);

			document.getElementById('total').value = jumlah_harga;
			}

		</script>
