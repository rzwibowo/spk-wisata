<?php


$id_wisata=$_POST['nama_wisata'];
$periode=$_POST['periode'];

$queryInsert="INSERT INTO alternatif(id_wisata,periode) VALUES(".$id_wisata.",'".$periode."')"; 
$query=mysqli_query($koneksi,$queryInsert);

if($query){
	echo "<script>alert('Data berhasil simpan'); window.location.replace('index.php?page=alternatif_show');</script>";
}else{
mysqli_close($koneksi);
}
?>