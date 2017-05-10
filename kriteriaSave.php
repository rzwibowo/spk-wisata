<?php
session_start();
if (!isset($_SESSION["user"])) echo "<script>location.replace('login.php');</script>";

include "koneksi.php";

$nama_kriteria=$_POST['nama_kriteria'];
$prioritas_kriteria=$_POST['prioritas_kriteria'];

$queryInsert="INSERT INTO kriteria(nama_kriteria,prioritas_kriteria) VALUES('".$nama_kriteria."',".$prioritas_kriteria.")"; 
$query=mysqli_query($koneksi,$queryInsert);

if($query){
	echo "<script>alert('Data berhasil simpan'); window.location.replace('kriteriaShow.php');</script>";
}else{
mysqli_close($koneksi);
}
?>