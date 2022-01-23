<?php
//koneksi data base
	$server = "localhost";
	$user = "root";
	$pass = "";
	$database = "dbuploadfile";

	$koneksi = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error($koneksi));

?>
