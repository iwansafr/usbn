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
	include 'mapel.php';
	?>
	<div class="container-fluid">
		<?php if (empty($_GET['t'])): ?>
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
		<?php endif ?>
		<div class="row">
			<?php
			if(!empty($_GET['kelas']) && empty($_GET['t']))
			{
				?>
				<div class="container">
					<a href="?kelas=<?php echo $_GET['kelas'] ?>&t=pdf" class="btn btn-sm btn-default">print</a>
				</div>
				<?php
			}
				if(!empty($data))
				{
					foreach ($data as $key => $value) 
					{
						$image = glob('new_image/images/2019/'.strtolower(str_replace(' ','_',$value['KELAS'])).'/'.str_replace(' ','_',strtolower($value['NAMA SISWA']).'*'));
						$image = @$image[0];
						if(empty($image))
						{
							?>
							<script type="text/javascript">
								alert('<?php echo $value['NAMA SISWA'];?> tidak ada foto');
							</script>
							<?php
						}
						?>
						<div class="col-md-12" style="margin-bottom: 40px;">
							<div class="col-md-5 col-xs-5">
								<table border="1" style="width: 100%; font-size: 12px;">
									<tr style="text-align: center;">
										<td rowspan="5"  ><img src="images/logo/logojateng.png" alt="" width="70"></td>
										<td colspan="2">PEMERINTAH PROVINSI JAWA TENGAH</td>
									</tr>
									<tr style="text-align: center;">
										<td colspan="2">DINAS PENDIDIKAN DAN KEBUDAYAAN</td>
									</tr>
									<tr style="text-align: center;">
										<td colspan="2">SMK NEGERI 1 BANGSRI</td>
									</tr>
									<tr style="text-align: center; font-size: 11px;">
										<td colspan="2">JL. Kh. Achmad Fauzan No. 17 Krasak-Bangsri (0291) 772321-7772322 JEPARA</td>
									</tr>
									<tr style="text-align: center;">
										<td colspan="2">email : smkn1bangsri@yahoo.com</td>
									</tr>
									<tr style="text-align: center;">
										<td colspan="4">KARTU PESERTA USBN</td>
									</tr>
								</table>
								<table border="1" style="width: 100%; font-size: 12px;">
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
								<table border="1" style="width: 100%; font-size: 12px;">
									<tr>
										<tr>
											<td style="width: 40%;text-align: center;"><img src="<?php echo $image ?>" alt="" height="140"></td>
											<td>
												<table style="text-align: center;">
													<tr>
														<td>Jepara, 19 Maret 2019</td>
													</tr>
													<tr>
														<td>Kepala SMK N 1 BANGSRI</td>
													</tr>
													<tr>
														<td colspan="2" style="width: 40%;text-align: center;"><img src="images/logo/ttd.png" alt="" width="150"></td>
													</tr>
													<tr>
														<td>Drs. Muh Zainudin Aziz, M.Ds</td>
													</tr>
													<tr>
														<td>NIP. 19640416 199303 1 003</td>
													</tr>
												</table>
											</td>
										</tr>
									</tr>
								</table>
								<br>
							</div>
							<div class="col-md-7 col-xs-7">
								<table border="1" style="width: 100%; text-align: center; font-size: 12px;">
									<tr>
										<td rowspan="2">NO</td>
										<td rowspan="2">HARI/TANGGAL</td>
										<td rowspan="2">PUKUL</td>
										<td colspan="4" style="width: 60%;">KELAS</td>
									</tr>
									<tr>
										<td>AP</td>
										<td>PM</td>
										<td>RPL</td>
										<td>TSM</td>
									</tr>
									<?php 
									$i = 0;
									foreach ($mapel as $mkey => $mvalue) 
									{
										$genap = $i%2;
										?>
										<tr>
											<?php if ($genap==0): ?>
												<td rowspan="2"><?php echo $mvalue['no'] ?></td>
												<td rowspan="2"><?php echo $mvalue['hari'] ?></td>
											<?php else: ?>
											<?php endif ?>
											<td><?php echo $mvalue['pukul'] ?></td>
											<td><?php echo $mvalue['ap'] ?></td>
											<td><?php echo $mvalue['pm'] ?></td>
											<td><?php echo $mvalue['rpl'] ?></td>
											<td><?php echo $mvalue['tsm'] ?></td>
										</tr>
										<?php
										$i++;
									}
									?>
								</table>
							</div>
						</div>
						<?php
					}
				}
				?>
		</div>
	</div>

<script type="text/javascript" src="../library/js/jquery.min.js"></script>
<script type="text/javascript" src="../library/js/bootstrap.min.js"></script>
<?php if (!empty($_GET['t'])): ?>
	<script type="text/javascript">
		window.print();
	</script>
<?php endif ?>
</body>
</html>