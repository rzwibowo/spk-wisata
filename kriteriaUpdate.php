<?php

session_start();

if (!isset($_SESSION["user"])) echo "<script>location.replace('login.php');</script>";

include "koneksi.php";
$id                  = $_POST['kriteria_id'];
$nama_kriteria           = $_POST['nama_kriteria'];
$prioritas_kriteria			 = $_POST['prioritas_kriteria'];

$queryUpdate="UPDATE user set nama_kriteria='$nama_kriteria', prioritas_kriteria='$prioritas_kriteria' WHERE kriteria_id='$id'"; 
$query=mysqli_query($koneksi,$queryUpdate)or die(mysqli_error($koneksi));

if($query)
{
	echo "<script>alert('Data berhasil dirubah'); window.location.replace('kriteriaShow.php');</script>";
}

mysqli_close($koneksi);


?>