<?php

$id= $_GET['r'];

$query="SELECT * FROM kriteria WHERE kriteria_id=$id";
$result=mysqli_query($koneksi,$query)or die(mysqli_error($koneksi));
$row=mysqli_fetch_assoc($result);

$queryUpdate="DELETE FROM kriteria WHERE kriteria_id=$id"; 
$query=mysqli_query($koneksi,$queryUpdate)or die(mysqli_error($koneksi));
if($query){
	echo "<script>alert('Data berhasil hapus'); window.location.replace('index.php?page=kriteria_show');</script>";
}

mysqli_close($koneksi);

?>