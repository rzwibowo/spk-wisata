<?php

session_start();

if (!isset($_SESSION["user"])) echo "<script>location.replace('login.php');</script>";

include "koneksi.php";
$id                  = $_POST['id_alternatif'];
$id_wisata             = $_POST['nama_wisata'];
$periode           = $_POST['periode'];
$global			 = $_POST['global'];

$queryUpdate="UPDATE alternatif set id_wisata=$id_wisata, periode='$periode', global=$global WHERE id_alternatif=$id"; 
$query=mysqli_query($koneksi,$queryUpdate)or die(mysqli_error($koneksi));

if($query)
{
	echo "<script>alert('Data berhasil dirubah'); window.location.replace('alternatifShow.php');</script>";
}

mysqli_close($koneksi);


?>