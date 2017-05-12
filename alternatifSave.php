<?php
session_start();
if (!isset($_SESSION["user"])) echo "<script>location.replace('login.php');</script>";

include "koneksi.php";

$id_wisata=$_POST['nama_wisata'];
$periode=$_POST['periode'];
$global=$_POST['global'];

$queryInsert="INSERT INTO alternatif(id_wisata,periode,global) VALUES(".$id_wisata.",'".$periode."',".$global.")"; 
$query=mysqli_query($koneksi,$queryInsert);

if($query){
	echo "<script>alert('Data berhasil simpan'); window.location.replace('alternatifShow.php');</script>";
}else{
mysqli_close($koneksi);
}
?>