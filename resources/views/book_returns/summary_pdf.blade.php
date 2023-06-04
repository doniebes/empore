<!DOCTYPE html>
<html>
<head>
	<title><?= ($_GET['r'] == $member['member_id']) ? $member['name'] : '' ?></title>
</head>

<style type="text/css">
@page {
	margin-top: 0.5cm;
	/*margin-bottom: 0.1em;*/
	margin-left: 1cm;
	margin-right: 1cm;
	margin-bottom: 0.1cm;
}
.name-school{
	font-size: 15pt;
	font-weight: bold;
	padding-bottom: -15px;
}
.alamat{
	font-size: 9pt;
	margin-bottom: -10px;
}
.detail{
	font-size: 10pt;
	font-weight: bold;
	padding-top: -15px;
	padding-bottom: -12px;
}
body {
	font-family: sans-serif;
}
table {
	font-family: verdana,arial,sans-serif;
	font-size:11px;
	color:#333333;
	border-width: none;
	/*border-color: #666666;*/
	border-collapse: collapse;
	width: 100%;
}

th {
	padding-bottom: 8px;
	padding-top: 8px;
	border-color: #666666;
	background-color: #dedede;
	/*border-bottom: solid;*/
	text-align: left;
}

td {
	text-align: left;
	border-color: #666666;
	background-color: #ffffff;
}

hr {
	border: none;
	height: 1px;
	/* Set the hr color */
	color: #333; /* old IE */
	background-color: #333; /* Modern Browsers */
}
.container {
	position: relative;
}

.topright {
	position: absolute;
	top: 0;
	right: 0;
	font-size: 18px;
	border-width: thin;
	padding: 5px;
}
.topright2 {
	position: absolute;
	top: 30px;
	right: 50px;
	font-size: 18px;
	border: 1px solid;
	padding: 5px;
	color: red;
}
</style>
<body>

	<div class="container">
		<div class="topright">RIWAYAT TRANSAKSI</div>
	</div>
	<p class="name-school">{{ $setting_name }}</p>
	<p class="alamat">{{ $setting_address }}<br>
		{{ $setting_phone }}</p>
		<hr>
		<table style="padding-top: -5px; padding-bottom: 5px">
			<tbody>
				<tr>
					<td style="width: 100px;">Member ID</td>
					<td style="width: 5px;">:</td>
					<td style="width: 150px;"><?= $member['member_id']?></td>
				
					<td style="width: 130px;">Tanggal Transaksi</td>
					<td style="width: 5px;">:</td>
					<td style="width: 131px;"><?= date('d F Y')?></td>
				</tr>
				<tr>
					<td style="width: 100px;">Nama</td>
					<td style="width: 5px;">:</td>
					<td style="width: 150px;"><?= $member['member_name']?></td>
					
					<td style="width: 130px;">Tahun Ajaran</td>
					<td style="width: 5px;">:</td>
					<td style="width: 131px;"><?php foreach ($period as $row):?> 
                                                <?= ($_GET['n'] == $row['period_id']) ? $row['period_start'].'/'.$row['period_end'] : '' ?>
                                              <?php endforeach; ?></td>
				</tr>
				
			</tbody>
		</table>
		<hr>
		<p class="detail">Dengan rincian transaksi sebagai berikut:</p>
       
		<table style="border-style: solid;">
			<tr>
				<th style="border-top: 1px solid; border-bottom: 1px solid;">No.</th>
				<th style="border-top: 1px solid; border-bottom: 1px solid;">Request ID</th>
				<th style="border-top: 1px solid; border-bottom: 1px solid;">Nama Buku</th>
				<th style="border-top: 1px solid; border-bottom: 1px solid;">Tanggal Pinjam</th>
				<th style="border-top: 1px solid; border-bottom: 1px solid;">Tanggal Kembali</th>
				<th style="border-top: 1px solid; border-bottom: 1px solid;">Status</th>
			</tr>
			<?php
				$i=1;
				foreach ($borrow as $row) :	
			?>
			<tr>
				<td style="border-bottom: 1px solid;padding-top: 10px; padding-bottom: 10px;"><?= $i ?></td>
				<td style="border-bottom: 1px solid;"><?= $row->book_request_id ?></td>
				<td style="border-bottom: 1px solid;"><?= $row->title ?></td>
				<td style="border-bottom: 1px solid;"><?= $row->borrow_date ?></td>
				<td style="border-bottom: 1px solid;"><?= $row->return_date ?></td>
				<td style="border-bottom: 1px solid;"><?= $row->status ?></td>
			</tr>
			<?php 
				$i++;
				endforeach 
			?>			
			<tr>
				<td colspan="2" style="text-align: center;padding-top: 5px; padding-bottom: 5px;">{{ $setting_district }}, {{ date('d F Y') }}</td>
				<td style="background-color: #dedede;font-weight:bold;border-bottom: 1px solid;"></td>
				<td style="background-color: #dedede; font-weight:bold; border-bottom: 1px solid;"></td>
				<td style="background-color: #dedede;font-weight:bold;border-bottom: 1px solid; text-align: right;"></td>
				<td style="background-color: #dedede; font-weight:bold;border-bottom: 1px solid; text-align: right;"></td>
			</tr>

			<tr>
				<td colspan="2" style="text-align: center">({{ auth()->guard('admin')->user()->name }})</td>
                <td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</table>
		<br>

	</body>
	</html>