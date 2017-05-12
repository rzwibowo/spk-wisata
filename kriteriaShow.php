<?php

session_start();

if (!isset($_SESSION["user"])) echo "<script>location.replace('login.php');</script>";

include "koneksi.php";

?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Kriteria</title>

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
    				<h1>Daftar Kriteria</h1>
    				
    			</div>
    			<div>
                    <a href="kriteriaAdd.php" class="button">Tambah Kriteria</a>                    
                </div>
                <br>
                <div>
                <table class="striped">
                <thead>
                    <tr>
                        <th>No. </th>
                        <th>Nama Kriteria</th>
                        <th>Prioritas</th>
                        <th>Operasi</th>
                    </tr>
                </thead>
                <?php 
                $sql = "select * from kriteria";
                $hasil = mysqli_query ($koneksi,$sql) or die ("Gagal Akses");
                
                $no=1;

                while ($row = mysqli_fetch_array ($hasil)){
                ?>
                    <?php echo "<tr>" ?>
                        <?php echo "<td>".$no.". </td>"; ?> 
                        <?php echo "<td>".$row['nama_kriteria']."</td>";?>
                        <?php echo "<td>".$row['prioritas_kriteria']."</td>";?>
                        <?php echo
                        "<td>
                        <a href='kriteriaEdit.php?r=".$row['kriteria_id']."' class='button'>Edit</a>
                        <a href='kriteriaDelete.php?r=".$row['kriteria_id']."' class='button' onclick = 'if (! confirm('Yakin akan menghapus data?')) { return false; }' style='background-color: #ff3333' >Hapus</a>
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