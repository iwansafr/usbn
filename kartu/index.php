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
				foreach ($data as $key => $value) 
				{
					pr($value);
				}
				?>
			</div>
		</div>
	</div>

<script type="text/javascript" src="../library/js/jquery.min.js"></script>
<script type="text/javascript" src="../library/js/bootstrap.min.js"></script>
</body>
</html>