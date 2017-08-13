<?php

$detail = $_POST['detail'];
$nama_wisata=$_POST['nama_wisata'];
$alamat=$_POST['alamat'];
$keterangan=$_POST['keterangan'];


$kodeWisata = GenerateId("wisata","id_wisata",null,"W",$koneksi);
$queryInsert="INSERT INTO wisata(id_wisata,nama_wisata, alamat, keterangan) VALUES('".$kodeWisata."','".$nama_wisata."','".$alamat."','".$keterangan."')"; 
$query=mysqli_query($koneksi,$queryInsert);

if($query){
foreach ($detail as $key => $value) {
    foreach ($value as $ky => $val) {
    	$queryInsertDetailWisata="INSERT INTO detail_kriteria_wisata(id_wisata,id_kriteria, id_detailkriteria) VALUES('".$kodeWisata."','".$key."',".$val.")"; 
		$rs=mysqli_query($koneksi,$queryInsertDetailWisata);
    }
}
	echo "<script>alert('Data berhasil simpan'); window.location.replace('index.php?page=wisata_show');</script>";
}else{
	//echo mysqli_error($koneksi);
mysqli_close($koneksi);
}
?>