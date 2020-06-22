<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css" media="all">
  	table{
  		border-collapse: collapse;
  		width: 100%;
  	}
  	th{
  		padding: 7px;
	}
	td {
		padding: 3px;
	}
  </style>
</head>
<body>
	<table border="1">
				<thead class="bg-light">
					<tr>
						<th>TANGGAL</th>
						<th>NAMA</th>
						<th>NOMOR METER</th>
						<th>NAMA PELANGGAN</th>
						<th>TOTAL BAYAR</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($pembayaran as $p): ?>
						<?php $id = $p->id_bayar; ?>
					<tr>
						<td><?= $p->tanggal ?></td>
						<td><?= $p->nama ?></td>
						<td><?= $p->nometer ?></td>
						<td><?= $p->nama ?></td>
						<td><?= rupiah($p->totalbayar) ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>

			<script>
				window.print();
			</script>
</body>
</html>