<?php 
	require_once('config.php');

	//koneksi php mysql_connect('localhost','root','');

	$connect=@mysql_connect($host,$dbuser,$dbpass);
	if(!($connect)){
		echo mysql_error();
	}else{
		//koneksi ke database mysql_select_db('tokoonline');
		@mysql_select_db($dbname) or die('Database tidak tersedia');
		//echo "koneksi  berhasil";
	}


?>