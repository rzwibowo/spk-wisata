<?php

session_start();

if (!isset($_SESSION["user"])) echo "<script>location.replace('login.php');</script>";

include "koneksi.php";

?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Alternatif</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Kube CSS -->
    <link rel="stylesheet" href="css/kube.css">
   

</head>
<body>
    <div id="main">
    	<div class="row align-center">
    		<div class="col-6">
    			<div class="text-center">
    				<h1>Daftar Alternatif</h1>
    				
    			</div>
    			<div>
                    <a href="alternatifAdd.php" class="button">Tambah Alternatif</a>                    
                </div>
                <br>
                <div>
                <table class="striped">
                <thead>
                    <tr>
                        <th>No. </th>
                        <th>Nama Wisata</th>
                        <th>Periode</th>
                        <th>Global</th>
                        <th>Operasi</th>
                    </tr>
                </thead>
                <?php 
                $sql = "select id_alternatif,alternatif.id_wisata,wisata.nama_wisata,periode,global from alternatif,wisata where alternatif.id_wisata=wisata.id_wisata";
                $hasil = mysqli_query ($koneksi,$sql) or die ("Gagal Akses");
                
                $no=1;

                while ($row = mysqli_fetch_array ($hasil)){
                ?>
                    <?php echo "<tr>" ?>
                        <?php echo "<td>".$no.". </td>"; ?> 
                        <?php echo "<td>".$row['nama_wisata']."</td>";?>
                        <?php echo "<td>".date("M Y",strtotime($row['periode']))."</td>";?>
                        <?php echo "<td>".$row['global']."</td>";?>
                        <?php echo
                        "<td>
                        <a href='alternatifEdit.php?r=".$row['id_alternatif']."' class='button'>Edit</a>
                        <a href='alternatifDelete.php?r=".$row['id_alternatif']."' class='button' onclick = 'if (! confirm('Yakin akan menghapus data?')) { return false; }' style='background-color: #ff3333' >Hapus</a>
                        </td>";
                        ?>
                    <?php echo "</tr>"; ?>
                    <?php $no++; } ?>
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