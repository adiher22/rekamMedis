<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title ?></title>
	<style type="text/css" media="print">
		body {
			font-family: Times New Roman;
			font-size: 12px;
		}
		.cetak {
			width: 19cm;
			height: 27cm;
			padding: 1cm;
		}
		table {
			border: solid thin #000;
			border-collapse: collapse;
		}
		td, th {
			padding: 3mm 6mm;
			text-align: left;
			vertical-align: top;
		}
		th {
			background-color: #F5F5F5;
			font-weight: bold;
		}
		h1 {
			text-align: center;
			font-size: 18px;
			text-transform: uppercase;
		}
	</style>
	<style type="text/css" media="screen">
		body {
			font-family: Times New Roman;
			font-size: 12px;
		}
		.cetak {
			width: 19cm;
			height: 27cm;
			padding: 1cm;
		}
		table {
			border: solid thin #000;
			border-collapse: collapse;
		}
		td, th {
			padding: 3mm 6mm;
			text-align: left;
			vertical-align: top;
		}
		th {
			background-color: #F5F5F5;
			font-weight: bold;
		}
		h1 {
			text-align: center;
			font-size: 18px;
			text-transform: uppercase;
		}
		div.img{
			text-align: left; 
			font-weight: bold;
			position: relative;
			top: 50px; 
		}
	</style>
</head>
<body  onload="print()">
	<div class="cetak">
		<div class="img">
	
			<img src="<?= base_url();?>img/klinik-icon.png" width="50" weight="50">
		</div>
	<h1>Detail Pembayaran <?php echo $title ?></h1>
    <hr><br>
			<table class="table table-bordered">
			<thead>
				<tr>
					<th width="20%">Nama Pasien</th>
					<th>: <?php echo $rm->nama_pasien ?></th>
				</tr>
				<tr>
					<th width="20%">Kode Pasien</th>
					<th>: <?php echo $rm->pasien_kd ?></th>
				</tr>
        <tr>
					<th width="20%">No Rekamedis</th>
					<th>: <?php echo $rm->no_rm ?></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Tanggal</td>
					<td>: <?php echo indo_date($rm->tgl_periksa) ?></td>
				</tr>
				<tr>
					<td>Jumlah Total</td>
					<td>: <?php echo indo_curency($r_rkm->harga_total) ?></td>
				</tr>
				<tr>
					<td>Status </td>
					<td>: <?php echo $rm->status ?></td>
				</tr>
			
				<tr>
				<td>Diagnosa</td>
				<td>: <?php echo $rm->diagnosa ?></td>
				</tr>
			
			</tbody>
		</table>

		<hr>

		<table class="table table-bordered" width="100%">
			<caption></caption>
			<thead>
				<tr class="">
					<th>No</th>
					<th>Nama Obat</th>
					<th>Harga</th>
					<th>Jumlah</th>
					<th>Total</th>
					
				</tr>
			</thead>
			<tbody>
				<?php $i=1; foreach($robat->result() as $data) { ?>
				<tr>
					<td><?php echo $i ?></td>
					<td><?php echo $data->nama_obat ?></td>
					<td><?php echo indo_curency($data->harga)?></td>
					<td><?php echo $data->jumlah ?></td>
					<td><?php echo indo_curency($data->total) ?></td>
				</tr>
        <?php $i++; } ?>
        <tr class="table table-bordered">
					<td colspan="4">Jumlah Total Obat: </td>
					<td><?php echo indo_curency($total_obat['total_obat']) ?></td>
				</tr>
        
				<tr>
					<td colspan="4">Fee Admin: </td>
					<td><?php echo indo_curency($r_rkm->fee_admin) ?></td>
				</tr>
        <tr>
					<td colspan="4">Fee Dokter: </td>
					<td><?php echo indo_curency($r_rkm->fee_dokter) ?></td>
				</tr>
        <tr>
					<td colspan="4">Jumlah Total: </td>
					<td><?php echo indo_curency($r_rkm->harga_total) ?></td>
				</tr>
	
			</tbody>
		</table>
		<br>
		<br>
		<a href="<?= base_url() ?>">Kembali</a>
	</div>
</body>
</html>