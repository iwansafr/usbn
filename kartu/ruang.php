<!DOCTYPE html>
<html>
<head>
	<title>RUANG <?php echo @$_GET['ruang'] ?></title>
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
									<input type="text" name="ruang" class="form-control">
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
			if(!empty($_GET['ruang']) && empty($_GET['t']))
			{
				?>
				<div class="container">
					<a href="?ruang=<?php echo $_GET['ruang'] ?>&t=pdf" class="btn btn-sm btn-default">print</a>
				</div>
				<?php
			}
				if(!empty($data))
				{
					?>
					<div id="ruang" style="border: 1px black solid; margin: 10px; padding: 10px;">
						<div class="row">
							<div class="col-md-12">
								<div class="col-md-12" style="text-align: center;">
									<h5>RUANG <?php echo $_GET['ruang'] ?></h5>
								</div>
								<div class="col-md-6">
									<div class="panel panel-default">
										<div class="panel-heading" style="text-align: center;">pengawas</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="panel panel-default">
										<div class="panel-heading" style="text-align: center;">pengawas</div>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="col-md-1 pull-right">
									pintu ->
								</div>
							</div>
							<?php
							foreach ($data as $key => $value) 
							{
								$pull = '';
								if(($value['NO']>4 && $value['NO']<9) || ($value['NO']>12 && $value['NO']<17))
								{
									$pull = 'pull-right';
								}
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
								<div class="col-md-3 <?php echo $pull ?>" style="margin-top: 50px; margin-bottom: 50px;">
									<table border="1" style="width: 100%; font-size: 12px; text-align: center;">
										<tr>
											<tr>
												<td><?php echo $value['NO'] ?></td>
											</tr>
											<tr>
												<td style="width: 40%;text-align: center;"><img src="<?php echo $image ?>" alt="" height="143"></td>
											</tr>
											<tr>
												<td><?php echo $value['NAMA SISWA'] ?></td>
											</tr>
											<tr>
												<td><?php echo $value['NO PESERTA'] ?></td>
											</tr>
										</tr>
									</table>
								</div>
								<?php
							}
							?>
						</div>
					</div>
					<?php
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