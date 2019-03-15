<?php


if(!empty($_GET['kelas']))
{
	$data = file_get_contents('images/2019/data/siswa.json');

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
}