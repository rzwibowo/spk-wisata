
    <div id="main">
    	<div class="row align-center">
    		<div class="col-10">
    			<div class="text-center">
    				<h1>Laporan Daftar Wisata</h1>
    				
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
                    <?php echo"</tr>"; ?>
                    <?php $no++; } ?>
                </tbody>
                </table>
                <div style="text-align: right;">
                    <a href="index.php?page=kriteria_add" class="button" onclick="window.history.back();">Kembali</a>                      
                </div>
                <br>
                </div>

    		</div>
    	</div>
    </div>
