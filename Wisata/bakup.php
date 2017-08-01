<?php

$nama_wisata=$_POST['nama_wisata'];
$alamat=$_POST['alamat'];
$keterangan=$_POST['keterangan'];

$kode = GenerateId("wisata","id_wisata",null,"W",$koneksi);

$queryInsert="INSERT INTO wisata(id_wisata,nama_wisata, alamat, keterangan) VALUES('".$kode."',".$nama_wisata."','".$alamat."','".$keterangan."')"; 
$query=mysqli_query($koneksi,$queryInsert);



if($query){
	// $sql ="SELECT * FROM kriteria ";
	// $result = mysqli_query($koneksi,$sql);
	// $wisata = array();
	// $index=1;
	//  while ($rs = mysqli_fetch_array($result)) {
	//  $wisata[$index]['nama_kriteria']=$rs['nama_kriteria'];
	//  $wisata[$index]['kriteria_id']=$rs['kriteria_id'];
	//  $index++;
	//  }

	// for ($i=1; $i <= count($wisata); $i++) { 
	//     $idKriteria = $wisata[$i]['kriteria_id'];
	//     $value =$_POST[$idKriteria];
	//     $queryInsert="INSERT INTO detail_kriteria(id_kriteria,id_wisata,value) VALUES('".$idKriteria."',".$kode."',".$value.")"; 
 //        $query=mysqli_query($koneksi,$queryInsert);
	// }
	
	echo "<script>alert('Data berhasil simpan'); window.location.replace('index.php?page=wisata_show');</script>";
}else{
mysqli_close($koneksi);
}
?>

<?php

$nama_wisata=$_POST['nama_wisata'];
$alamat=$_POST['alamat'];
$keterangan=$_POST['keterangan'];

$kode = GenerateId("wisata","id_wisata",null,"W",$koneksi);

$queryInsert="INSERT INTO wisata(id_wisata,nama_wisata, alamat, keterangan) VALUES('".$kode."',".$nama_wisata."','".$alamat."','".$keterangan."')"; 
$query=mysqli_query($koneksi,$queryInsert);



if($query){
	// $sql ="SELECT * FROM kriteria ";
	// $result = mysqli_query($koneksi,$sql);
	// $wisata = array();
	// $index=1;
	//  while ($rs = mysqli_fetch_array($result)) {
	//  $wisata[$index]['nama_kriteria']=$rs['nama_kriteria'];
	//  $wisata[$index]['kriteria_id']=$rs['kriteria_id'];
	//  $index++;
	//  }

	// for ($i=1; $i <= count($wisata); $i++) { 
	//     $idKriteria = $wisata[$i]['kriteria_id'];
	//     $value =$_POST[$idKriteria];
	//     $queryInsert="INSERT INTO detail_kriteria(id_kriteria,id_wisata,value) VALUES('".$idKriteria."',".$kode."',".$value.")"; 
 //        $query=mysqli_query($koneksi,$queryInsert);
	// }
	
	echo "<script>alert('Data berhasil simpan'); window.location.replace('index.php?page=wisata_show');</script>";
}else{
mysqli_close($koneksi);
}
?>