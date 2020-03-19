<?php
$tahun = 0;
if(!empty($_GET['th']))
{
	$tahun = $_GET['th'];
}
if(!empty($tahun))
{
	include '../helper/system_helper.php';
	// foreach (glob('images/'.$tahun.'/'.$_GET['kelas'].'/*') AS $value) 
	foreach (glob('images/'.$tahun.'/*/*.jpg') AS $value) 
	{
		
		$kelas = explode('/',$value);
		$kelas = str_replace(' ', '_', $kelas['2']);
		$old_value = $value;
		$new_value = str_replace("'",'',strtolower($value));
		$dir = 'new_image/images/'.$tahun.'/'.strtolower($kelas).'/';
		if(!is_dir($dir))
		{
			mkdir($dir, 0777,1);
		}
		copy('/var/www/html/usbn/kartu/'.$old_value, '/var/www/html/usbn/kartu/new_image/'.str_replace(' ','_',$new_value));
		echo '/var/www/html/usbn/kartu/new_image/'.str_replace(' ','_',$new_value);
		// chmod('/var/www/html/usbn/kartu/new_image/'.str_replace(' ','_',$new_value), 0777);
	}
}else{
	echo 'get tahun kosong';
}