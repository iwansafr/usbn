<?php

include '../helper/system_helper.php';
if(!empty($_GET['kelas']))
{
	foreach (glob('images/2019/'.$_GET['kelas'].'/*') AS $value) 
	{
		$old_value = $value;
		$new_value = strtolower($value);
		$dir = 'new_image/images/2019/'.strtolower($_GET['kelas']).'/';
		if(!is_dir($dir))
		{
			mkdir($dir, 0777,1);
		}
		copy('/var/www/html/usbn/kartu/'.$old_value, '/var/www/html/usbn/kartu/new_image/'.str_replace(' ','_',$new_value));
	}
}