<?php

session_start();

if (!isset($_SESSION["user"])) echo "<script>location.replace('login.php');</script>";

include "koneksi.php";

?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Wisata</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Kube CSS -->
    <link rel="stylesheet" href="css/kube.css">
   

</head>
<body>
    <div id="main">
    	<div class="row align-center">
    		<div class="col-10">
    			<div class="text-center">
    				<h1>Daftar Wisata</h1>
    				
    			</div>
    			<div>
                    <a href="wisataAdd.php" class="button">Tambah Data Wisata</a>                    
                </div>
                <br>
                <div>
                <table class="striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Wisata</th>
                        <th>Alamat</th>
                        <th>Keterangan</th>
                        <th>Fasilitas</th>
                        <th>Jml Pengunjung</th>
                        <th>Transportasi</th>
                        <th>Infrastruktur</th>
                        <th>Operasi</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                $sql = "select * from wisata";
                $hasil = mysqli_query ($koneksi,$sql) or die ("Gagal Akses");
                
                $no=1;

                while ($row = mysqli_fetch_array ($hasil)){
                ?>
                    <?php "<tr>"; ?>
                        <?php echo "<td>".$no.". </td>"; ?> 
                        <?php echo "<td>".$row['nama_wisata']."</td>";?>
                        <?php echo "<td>".$row['alamat']."</td>";?>
                        <?php echo "<td>".$row['keterangan']."</td>";?>
                        <?php echo "<td>".$row['fasilitas']."</td>";?>
                        <?php echo "<td>".$row['jml_pengunjung']."</td>";?>
                        <?php echo "<td>".$row['transportasi']."</td>";?>
                        <?php echo "<td>".$row['infrastruktur']."</td>";?>
                        <?php echo
                        "<td>
                        <a href='wisataEdit.php?r=".$row['id_wisata']."' class='button'>Edit</a>
                        <a href='wisataDelete.php?r=".$row['id_wisata']."' class='button' onclick = 'if (! confirm('Yakin akan menghapus data?')) { return false; }' style='background-color: #ff3333' >Hapus</a>
                        </td>";
                        ?>
                    <?php echo"</tr>"; ?>
                    <?php $no++; } ?>
                </tbody>
                </table>
                </div>
    			
    		</div>
    	</div>
    </div>

    <!-- Kube JS + jQuery are used for some functionality, but are not required for the basic setup -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="js/kube.js"></script>
</body>
</html>