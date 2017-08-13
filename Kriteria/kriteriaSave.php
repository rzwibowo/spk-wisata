<?php
$nama_kriteria=$_POST['nama_kriteria'];
$multi_select = $_POST['multiselect'];
$detail_kriteria = $_POST['detail'];

$kode = GenerateId("kriteria","kriteria_id",null,"K",$koneksi);
	$queryInsert="INSERT INTO kriteria(kriteria_id,nama_kriteria,multiselect) VALUES('".$kode."','".$nama_kriteria."',".$multi_select.")";
	$query=mysqli_query($koneksi,$queryInsert);

	if($query){

foreach ($detail_kriteria as $key => $value) {

	$InsertDetail="INSERT INTO detail_kriteria(id_kriteria,nama,nilai) VALUES('".$kode."','".$value[0]."',".$value[1].")"; 
	    $query=mysqli_query($koneksi,$InsertDetail);
 }
 echo "<script>alert('Data berhasil simpan'); window.location.replace('index.php?page=kriteria_show');</script>";
 }else{
	mysqli_close($koneksi);
	}
?>