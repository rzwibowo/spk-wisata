<?php

	$pass="";
	$hasil="";

	$user=$_POST['username'];
	$pass=md5($_POST['password']);
	

	$sql = "select * from user where username='".$user."' and password='".$pass."' limit 1";
	$hasil = mysqli_query ($koneksi,$sql) or die ("Gagal Akses");
	$jumlah = mysqli_num_rows($hasil);
	if ($jumlah>0) {
	$row = mysqli_fetch_assoc($hasil);
	$_SESSION["user"] = $row['username'];
	$_SESSION["level"] = $row['level'];
	header('Location:index.php');
    exit;
	die();
	} else {
	include "Login/loginError.html"; 

	}
?>