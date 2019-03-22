<!DOCTYPE html>
<html>
<head>
	<title>Kartu Meja</title>
	<link rel="stylesheet" type="text/css" href="../library/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../library/font-awesome/css/font-awesome.min.css">
</head>
<body>
	<?php 
	include '../helper/system_helper.php'; 
	include 'get_data.php'; 
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
			<?php if(empty($_GET['t']))
			{
				?>
				<div class="container">
					<a href="?t=pdf" class="btn btn-sm btn-default">print</a>
				</div>
				<?php
			}
			if(!empty($data))
			{
				?>
				<div class="row">
					<?php
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
						<div class="col-md-6" style="margin-bottom: 33px;">
							<table border="1" style="width: 100%; font-size: 12px; text-align: center;">
								<tr>
									<td style="width: 40%;text-align: center;" rowspan="4"><img src="<?php echo $image ?>" height="200"></td>
								</tr>
								<tr>
									<td><?php echo $value['NAMA SISWA'] ?></td>
								</tr>
								<tr>
									<td><?php echo $value['NO PESERTA'] ?></td>
								</tr>
								<tr>
									<td><?php echo $value['RUANG'] ?></td>
								</tr>
							</table>
						</div>
						<?php
					}
					?>
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