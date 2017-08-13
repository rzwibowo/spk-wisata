<?php


$username=$_POST['username'];
$password=$_POST['password'];
$level = $_POST['level'];
$passwordSafe=md5($password);

$queryInsert="INSERT INTO user(username,password,level) VALUES('".$username."','".$passwordSafe."',".$level.")"; 
$query=mysqli_query($koneksi,$queryInsert);

if($query){
	echo "<script>alert('Data berhasil simpan'); window.location.replace('index.php?page=user_show');</script>";
}else{
mysqli_close($koneksi);
}
?>