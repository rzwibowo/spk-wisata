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
                <?php 
                $sql = "select * from kriteria";
                $hasil = mysqli_query ($koneksi,$sql) or die ("Gagal Akses");
                
                $no=1;

                while ($row = mysqli_fetch_array ($hasil)){
                ?>
                    <p>
                        <?php echo $no.". "; ?> 
                        <?php echo $row['nama_kriteria']?>
                        <a href="kriteriaEdit.php?r=<?php echo $row['kriteria_id'] ?>" class="button">Edit</a>
                        <a href="kriteriaDelete.php?r=<?php echo $row['kriteria_id'] ?>" class="button" onclick = "if (! confirm('Yakin akan menghapus data?')) { return false; }" style="background-color: #ff3333" >Hapus</a>
                    </p>
                    <?php $no++; } ?>
                </div>
    			
    		</div>
    	</div>
    </div>

    <!-- Kube JS + jQuery are used for some functionality, but are not required for the basic setup -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="js/kube.js"></script>
</body>
</html>