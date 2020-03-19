<?php


if(!empty($_GET['kelas']))
{
	$data = file_get_contents('images/2020/data/siswa_unbk_lab.json');

	$data = json_decode($data,1);
	$search_data = array();
	foreach ($data as $key => $value) 
	{
		if(strtolower($value['KELAS']) == strtolower($_GET['kelas']))
		{
			$search_data[] = $value;
		}
	}
	$data = $search_data;
}else if(!empty($_GET['ruang']))
{
	$data = file_get_contents('images/2020/data/siswa_unbk_lab.json');

	$data = json_decode($data,1);
	$search_data = array();
	foreach ($data as $key => $value) 
	{
		if(strtolower($value['RUANG']) == strtolower($_GET['ruang']))
		{
			$search_data[] = $value;
		}
	}
	$data = $search_data;
}else{
	$data = file_get_contents('images/2020/data/siswa_unbk_lab.json');
	$data = json_decode($data,1);
}
