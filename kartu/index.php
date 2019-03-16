<!DOCTYPE html>
<html>
<head>
	<title>kartu</title>
	<link rel="stylesheet" type="text/css" href="../library/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../library/font-awesome/css/font-awesome.min.css">
</head>
<body>
	<?php 
	include '../helper/system_helper.php'; 
	include 'get_data.php'; 
	?>
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-heading">cari</div>
					<div class="panel-body">
						<form action="" method="get">
							<div class="form-group">
								<input type="text" name="kelas" class="form-control">
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-sm btn-success">cari</button>
							</div>
						</form>
					</div>
					<div class="panel-footer"></div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<?php
				if(!empty($data))
				{
					foreach ($data as $key => $value) 
					{
						?>
						<div class="col-md-6">
							<table border="1" style="width: 100%;">
								<tr style="text-align: center;">
									<td rowspan="5"  ><img src="images/logo/logojateng.png" alt="" width="70"></td>
									<td>PEMERINTAH PROVINSI JAWA TENGAH</td>
									<td colspan="2"></td>
								</tr>
								<tr style="text-align: center;">
									<td>DINAS PENDIDIKAN DAN KEBUDAYAAN</td>
									<td colspan="2"></td>
								</tr>
								<tr style="text-align: center;">
									<td>SMK NEGERI 1 BANGSRI</td>
									<td colspan="2"></td>
								</tr>
								<tr style="text-align: center; font-size: 11px;">
									<td>JL. Kh. Achmad Fauzan No. 17 Krasak-Bangsri (0291) 772321-7772322 JEPARA</td>
									<td colspan="2"></td>
								</tr>
								<tr style="text-align: center;">
									<td>email : smkn1bangsri@yahoo.com</td>
									<td colspan="2"></td>
								</tr>
								<tr style="text-align: center;">
									<td colspan="4">KARTU PESERTA USBN</td>
								</tr>
							</table>
							<table border="1" style="width: 100%;">
								<tr>
									<td colspan="2" style="width: 25%;">Asal Sekolah</td>
									<td>:</td>
									<td>SMK N 1 BANGSRI</td>
								</tr>
								<tr>
									<td colspan="2" style="width: 25%;">Nomor Peserta</td>
									<td>:</td>
									<td><?php echo $value['NO PESERTA'] ?></td>
								</tr>
								<tr>
									<td colspan="2" style="width: 25%;">Nama</td>
									<td>:</td>
									<td><?php echo $value['NAMA SISWA'] ?></td>
								</tr>
								<tr>
									<td colspan="2" style="width: 25%;">tmp & Tgl Lahir</td>
									<td>:</td>
									<td><?php echo $value['TEMPAT LAHIR'].' '.tanggal($value['TGL LAHIR']) ?></td>
								</tr>
								<tr>
									<td colspan="2" style="width: 25%;">Ruang</td>
									<td>:</td>
									<td><?php echo $value['RUANG'] ?></td>
								</tr>
								<tr>
									<td colspan="2" style="width: 25%;">Kelas</td>
									<td>:</td>
									<td><?php echo $value['KELAS'] ?></td>
								</tr>
							</table>
							<table border="1" style="width: 100%;">
								<tr>
									<tr>
										<td style="width: 40%;text-align: center;"><img src="images/logo/logojateng.png" alt="" width="150"></td>
										<td>
											<table>
												<tr>
													<td>Jepara, 19 Maret 2019</td>
												</tr>
												<tr>
													<td>Kepala SMK N 1 BANGSRI</td>
												</tr>
												<tr>
													<td style="width: 40%;text-align: center;"><img src="images/logo/ttd.png" alt="" width="150"></td>
												</tr>
											</table>
										</td>
									</tr>
								</tr>
							</table>
							<br>
						</div>
						<?php
					}
				}
				?>
			</div>
		</div>
	</div>

<script type="text/javascript" src="../library/js/jquery.min.js"></script>
<script type="text/javascript" src="../library/js/bootstrap.min.js"></script>
</body>
</html>