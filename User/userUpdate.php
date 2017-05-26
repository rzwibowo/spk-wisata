<?php


$id                  = $_POST['user_id'];
$username           = $_POST['username'];
$password			 = $_POST['password'];
$passwordSafe=md5($password);

$queryUpdate="UPDATE user set username='$username', password='$passwordSafe' WHERE user_id=$id"; 
$query=mysqli_query($koneksi,$queryUpdate)or die(mysqli_error($koneksi));

if($query)
{
	echo "<script>alert('Data berhasil dirubah'); window.location.replace('index.php?page=user_show');</script>";
}

mysqli_close($koneksi);


?>