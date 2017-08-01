<?php

$nama_kriteria=$_POST['nama_kriteria'];
$kode = GenerateId("kriteria","kriteria_id",null,"K",$koneksi);
$queryInsert="INSERT INTO kriteria(kriteria_id,nama_kriteria) VALUES('".$kode."','".$nama_kriteria."')"; 
$query=mysqli_query($koneksi,$queryInsert);

if($query){
	echo "<script>alert('Data berhasil simpan'); window.location.replace('index.php?page=kriteria_show');</script>";
}else{
mysqli_close($koneksi);
}
?>