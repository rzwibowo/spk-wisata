<?php

$id                  = $_POST['kriteria_id'];
$nama_kriteria           = $_POST['nama_kriteria'];

$queryUpdate="UPDATE kriteria set nama_kriteria='$nama_kriteria' WHERE kriteria_id=$id"; 
$query=mysqli_query($koneksi,$queryUpdate)or die(mysqli_error($koneksi));

if($query)
{
	echo "<script>alert('Data berhasil dirubah'); window.location.replace('index.php?page=kriteria_show');</script>";
}

mysqli_close($koneksi);


?>