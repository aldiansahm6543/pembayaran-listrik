<div class="container mt-5">
	<div class="row">	
			<div class="col-md-12 mb-3 ">
				<div class="row bg-info rounded p-2">
				<div class="col-sm-6">
					<p class="text-white h3 p-1"><i class="fas fa-folder-open"></i>Bukti Pembayaran</p>
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
						<th>BANK</th>
						<th>NOREK</th>
						<th>BANK TUJU</th>
						<th>TOTAL HARGA</th>
						<th>GAMBAR</th>
						<th>STATUS</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($bukti as $t): ?>
						<?php $id = $t->id_bukti; ?>
					<?php if ($t->status == 0): ?>
						
					<tr>
						<td><?= $t->nama ?></td>
						<td><?= $t->bank ?></td>
						<td><?= $t->norek ?></td>
						<td><?= $t->bank_tuju ?></td>
						<td><?= rupiah($t->tarifperkwh * $t->jumlahmeter + 2500) ?></td>
						<td><img src="<?= base_url('assets/images/bukti-bayar/') . $t->gambar ?>" class="img-fluid" width="150rem"></td>
						<td>
							<a href="<?= base_url('pembayaran/konfirmasi/') . $id ?>" class="btn btn-success btn-sm">Konfirmasi</a></td>
					</tr>
					<?php endif ?>
					<?php endforeach; ?>
				</tbody>
			</table>
			</div>

</div>