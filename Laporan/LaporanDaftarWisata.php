
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
                        <?php
                        $resalt = mysqli_query($koneksi,"SELECT nama_kriteria FROM kriteria");
                            while ($rs = mysqli_fetch_array($resalt)) {
                                echo "<th>".$rs['nama_kriteria']."</th>";
                            }
                        ?>
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
                        <?php
                        $query = mysqli_query($koneksi,"SELECT DISTINCT id_kriteria FROM detail_kriteria_wisata 
                            WHERE id_wisata='$row[id_wisata]'");
                        while ($rs = mysqli_fetch_array($query)) {
                            echo "<td>";
                            $querydetail = mysqli_query($koneksi,"SELECT dk.nama  
                                AS nama FROM detail_kriteria_wisata dw 
                                JOIN detail_kriteria dk
                                ON dw.id_detailkriteria = dk.id_detail_kriteria
                                WHERE dw.id_wisata ='$row[id_wisata]' AND dw.id_kriteria ='$rs[id_kriteria]'");
                                echo "<ol>";
                            while ($rest = mysqli_fetch_array($querydetail)) {
                                echo "<li>".$rest['nama']."</li>";
                                }
                                echo "</ol>";
                                echo "</td>";
                        }
                        ?>
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
