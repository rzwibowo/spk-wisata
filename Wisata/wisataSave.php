<?php

$nama_wisata=$_POST['nama_wisata'];
$alamat=$_POST['alamat'];
$keterangan=$_POST['keterangan'];
$fasilitas=$_POST['fasilitas'];
$jml_pengunjung=$_POST['jml_pengunjung'];
$transportasi=$_POST['transportasi'];
$infrastruktur=$_POST['infrastruktur'];

$queryInsert="INSERT INTO wisata(nama_wisata, alamat, keterangan, fasilitas, jml_pengunjung, transportasi, infrastruktur) VALUES('".$nama_wisata."','".$alamat."','".$keterangan."','".$fasilitas."','".$jml_pengunjung."','".$transportasi."','".$infrastruktur."')"; 
$query=mysqli_query($koneksi,$queryInsert);

if($query){
	echo "<script>alert('Data berhasil simpan'); window.location.replace('index.php?page=wisata_show');</script>";
}else{
mysqli_close($koneksi);
}
?>