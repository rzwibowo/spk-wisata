<?php

$id= $_POST['id_wisata'];
$nama_wisata=$_POST['nama_wisata'];
$alamat=$_POST['alamat'];
$keterangan=$_POST['keterangan'];
$detail = $_POST['detail'];

$queryUpdate="UPDATE wisata set nama_wisata='$nama_wisata', alamat='$alamat', keterangan='$keterangan' WHERE id_wisata='$id'"; 
$query=mysqli_query($koneksi,$queryUpdate)or die(mysqli_error($koneksi));

if($query)
{ 
   $QueryDelete=mysqli_query($koneksi,"DELETE FROM detail_kriteria_wisata WHERE id_wisata='$id'")or die(mysqli_error($koneksi));
   if($QueryDelete){
	  foreach ($detail as $key => $value) {
	    foreach ($value as $ky => $val) {
	    	$queryInsertDetailWisata="INSERT INTO detail_kriteria_wisata(id_wisata,id_kriteria, id_detailkriteria) VALUES('".$id."','".$key."',".$val.")"; 
			$rs=mysqli_query($koneksi,$queryInsertDetailWisata);
    	}
  	}
   }

	echo "<script>alert('Data berhasil dirubah'); window.location.replace('index.php?page=wisata_show');</script>";
}

mysqli_close($koneksi);


?>