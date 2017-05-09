<?php
session_start();
if (!isset($_SESSION["user"])) echo "<script>location.replace('login.php');</script>";

include "koneksi.php";

$username=$_POST['username'];
$password=$_POST['password'];
$passwordSafe=md5($password);

$queryInsert="INSERT INTO user(username,password) VALUES('".$username."','".$passwordSafe."')"; 
$query=mysqli_query($koneksi,$queryInsert);

if($query){
	echo "<script>alert('Data berhasil simpan'); window.location.replace('userShow.php');</script>";
}else{
mysqli_close($koneksi);
}
?>