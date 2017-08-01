<?php

$id= $_POST['id_wisata'];
$nama_wisata=$_POST['nama_wisata'];
$alamat=$_POST['alamat'];
$keterangan=$_POST['keterangan'];
$fasilitas=$_POST['fasilitas'];
$jml_pengunjung=$_POST['jml_pengunjung'];
$transportasi=$_POST['transportasi'];
$infrastruktur=$_POST['infrastruktur'];
echo $id;
$queryUpdate="UPDATE wisata set nama_wisata='$nama_wisata', alamat='$alamat', keterangan='$keterangan', fasilitas=$fasilitas, jml_pengunjung=$jml_pengunjung, transportasi=$transportasi, infrastruktur=$infrastruktur WHERE id_wisata=$id"; 
$query=mysqli_query($koneksi,$queryUpdate)or die(mysqli_error($koneksi));

if($query)
{
	echo "<script>alert('Data berhasil dirubah'); window.location.replace('index.php?page=wisata_show');</script>";
}

mysqli_close($koneksi);


?>