<?php

include '../helper/system_helper.php';
// foreach (glob('images/2019/'.$_GET['kelas'].'/*') AS $value) 
foreach (glob('images/2019/*/*.jpg') AS $value) 
{
	
	$kelas = explode('/',$value);
	$kelas = $kelas['2'];
	$old_value = $value;
	$new_value = strtolower($value);
	$dir = 'new_image/images/2019/'.strtolower($kelas).'/';
	if(!is_dir($dir))
	{
		mkdir($dir, 0777,1);
	}
	copy('/var/www/html/usbn/kartu/'.$old_value, '/var/www/html/usbn/kartu/new_image/'.str_replace(' ','_',$new_value));
	echo '/var/www/html/usbn/kartu/new_image/'.str_replace(' ','_',$new_value);
	// chmod('/var/www/html/usbn/kartu/new_image/'.str_replace(' ','_',$new_value), 0777);
}