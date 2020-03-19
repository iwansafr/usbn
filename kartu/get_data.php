<?php

if(!empty($_GET['kelas']))
{
	$data = file_get_contents('images/2020/data/siswa.json');

	$data = json_decode($data,1);
	$search_data = array();
	foreach ($data as $key => $value) 
	{
		if(!empty($value['KELAS']))
		{
			if(strtolower($value['KELAS']) == strtolower($_GET['kelas']))
			{

				$search_data[$value['NO PESERTA']] = $value;
			}
		}
	}
	$data = $search_data;
}else if(!empty($_GET['ruang']))
{
	$data = file_get_contents('images/2020/data/siswa.json');

	$data = json_decode($data,1);
	$search_data = array();
	foreach ($data as $key => $value) 
	{
		if(strtolower($value['RUANG']) == strtolower($_GET['ruang']))
		{
			$search_data[$value['NO PESERTA']] = $value;
		}
	}
	$data = $search_data;
}else{
	$data = file_get_contents('images/2020/data/siswa.json');
	$data = json_decode($data,1);
}