<?php

$nama_kriteria=$_POST['nama_kriteria'];
$prioritas_kriteria=$_POST['prioritas_kriteria'];

$queryInsert="INSERT INTO kriteria(nama_kriteria,prioritas_kriteria) VALUES('".$nama_kriteria."',".$prioritas_kriteria.")"; 
$query=mysqli_query($koneksi,$queryInsert);

if($query){
	echo "<script>alert('Data berhasil simpan'); window.location.replace('index.php?page=kriteria_show');</script>";
}else{
mysqli_close($koneksi);
}
?>