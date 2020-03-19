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
									<label for="kelas">Kelas</label>
									<input type="text" name="kelas" class="form-control" value="<?php echo @$_GET['kelas'] ?>">
								</div>
								<div class="form-group">
									<label for="no">No Peserta</label>
									<input type="text" name="no" class="form-control" value="<?php echo @$_GET['no'] ?>">
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
					<a href="?kelas=<?php echo $_GET['kelas'] ?>&no=<?php echo $_GET['no'] ?>&t=pdf" class="btn btn-sm btn-default">print</a>
				</div>
				<?php
			}
				if(!empty($data))
				{
					$no_peserta = @$_GET['no'];
					if(!empty($no_peserta) && !empty($data[$no_peserta]))
					{
						$data = [$data[$no_peserta]];
					}else if(!empty($_GET['kelas'])){

					}else{
						?>
						<h1>MAAF DATA YANG ANDA CARI TIDAK DITEMUKAN</h1>
						<?php
						die();
					}

					foreach ($data as $key => $value) 
					{
						if(!empty($value['KELAS']))
						{
							$image = glob('new_image/images/2020/'.strtolower(str_replace(' ','_',$value['KELAS'])).'/'.str_replace(' ','_',strtolower($value['NAMA SISWA']).'*'));
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
											<td colspan="2">email : smkn1bangsri@gmail.com</td>
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
										<!-- <tr>
											<td colspan="2" style="width: 25%;">tmp & Tgl Lahir</td>
											<td>:</td>
											<td><?php echo $value['TEMPAT LAHIR'].' '.tanggal($value['TGL LAHIR']) ?></td>
										</tr> -->
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
															<td>Jepara, 19 Maret 2020</td>
														</tr>
														<tr>
															<td>Kepala SMK N 1 BANGSRI</td>
														</tr>
														<tr>
															<td colspan="2" style="width: 40%;text-align: center;"><img src="images/logo/ttd.png" alt="" width="150"></td>
														</tr>
														<tr>
															<td>Drs. Aris Hidayanto, M.Si</td>
														</tr>
														<tr>
															<td>NIP. 19620913 198703 1 004</td>
														</tr>
													</table>
												</td>
											</tr>
										</tr>
									</table>
									<br>
								</div>
								<div class="col-md-7 col-xs-7">
									<table style="width: 100%; font-size: 12px;">
										<tr>
											<td style="font-weight: bold;text-align: center;"><h4 style="margin: 0px;">SMK NEGERI 1 BANGSRI</h4></td>
										</tr>
										<tr>
											<td style="font-weight: bold;text-align: center;"><h4 style="margin: 0px;">JADWAL US ONLINE 2019/2020</h4></td>
										</tr>
									</table>
									<table border="1" style="width: 100%; text-align: center; font-size: 12px;">
										<tr>
											<td style="background: #03a9f4;">NO</td>
											<td style="background: #03a9f4;">HARI/TANGGAL</td>
											<td style="background: #03a9f4;">PUKUL</td>
											<td style="background: #03a9f4;">MATA PELAJARAN</td>
										</tr>
										<?php 
										$i = 0;
										foreach ($mapel as $mkey => $mvalue) 
										{
											$kelas = str_replace('XII ', '', $value['KELAS']);
											$kelas = explode(' ',$kelas);
											$kelas = strtolower($kelas[0]);
											$genap = $i%3;
											?>
											<tr>
												<?php if ($genap==0): ?>
													<td rowspan="3"><?php echo $mvalue['no'] ?></td>
													<td rowspan="3"><?php echo $mvalue['hari'] ?></td>
												<?php else: ?>
												<?php endif ?>
												<td><?php echo $mvalue['pukul'] ?></td>
												<td><?php echo strtoupper($mvalue[$kelas]) ?></td>
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