<?php

$nama_wisata=$_POST['nama_wisata'];
$alamat=$_POST['alamat'];
$keterangan=$_POST['keterangan'];
$fasilitas=$_POST['fasilitas'];
$jml_pengunjung=$_POST['jml_pengunjung'];
$transportasi=$_POST['transportasi'];
$infrastruktur=$_POST['infrastruktur'];
$kodeWisata = GenerateId("wisata","id_wisata",null,"W",$koneksi);
$queryInsert="INSERT INTO wisata(id_wisata,nama_wisata, alamat, keterangan, fasilitas, jml_pengunjung, transportasi, infrastruktur) VALUES('".$kodeWisata."','".$nama_wisata."','".$alamat."','".$keterangan."',".$fasilitas.",".$jml_pengunjung.",".$transportasi.",".$infrastruktur.")"; 
$query=mysqli_query($koneksi,$queryInsert);

if($query){
	echo "<script>alert('Data berhasil simpan'); window.location.replace('index.php?page=wisata_show');</script>";
}else{
	//echo mysqli_error($koneksi);
mysqli_close($koneksi);
}
?>