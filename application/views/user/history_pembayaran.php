<div class="container mt-5">
	<div class="row">	
			<div class="col-md-12 mb-3 ">
				<div class="row bg-info rounded p-2">
				<div class="col-10">
					<p class="text-white h3 p-1"><i class="fas fa-folder-open"></i> History Pembayaran</p>
				</div>
				<div class="col-2">
					<a href="<?= base_url('pembayaran/cetak') ?>" class="btn btn-primary p-2 mt-1" ><i class="fas fa-print mr-2"></i>Cetak</a>
				</div>
				</div>
			</div>
	</div>

			<div class="table-responsive">
			<table class="table table-stripped table-hover myTable" id="">
							<?= $this->session->flashdata('message'); ?>
				<thead class="bg-light">
					<tr>
						<th>NOMOR METER</th>
						<th>NAMA PELANGGAN</th>
						<th>TANGGAL BAYAR</th>
						<th>TOTAL BAYAR</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($pembayaran as $p): ?>
						<?php $id = $p->id_bayar; ?>
					<tr>
						<td><?= $p->nometer ?></td>
						<td><?= $p->nama ?></td>
						<td><?= $p->tanggal ?></td>
						<td><?= rupiah($p->totalbayar) ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			</div>

			</div>



