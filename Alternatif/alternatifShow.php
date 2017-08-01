    <?php include "kepala.php"; ?>

    <div id="main">
    	<div class="row align-center">
    		<div class="col-6">
    			<div class="text-center">
    				<h1>Daftar Alternatif</h1>
    				
    			</div>
                <br>
                <div>
                <table class="striped">
                <thead>
                    <tr>
                        <th>No. </th>
                        <th>ID</th>
                        <th>Nama Wisata</th>
                        <th>Periode</th>
                        <th>Nilai Global</th>
                    </tr>
                </thead>
                <?php 
                $sql = "SELECT id_alternatif,alternatif,periode,prioritas_global FROM alternatif ORDER BY prioritas_global DESC";
                $hasil = mysqli_query ($koneksi,$sql) or die ("Gagal Akses");
                
                $no=1;

                while ($row = mysqli_fetch_array ($hasil)){
                ?>
                    <?php echo "<tr>" ?>
                        <?php echo "<td>".$no.". </td>"; ?>
                        <?php  echo "<td>".$row['id_alternatif']."</td>";?> 
                        <?php echo "<td>".$row['alternatif']."</td>";?>
                        <?php echo "<td>".date("M Y",strtotime($row['periode']))."</td>";?>
                        <?php echo "<td>".$row['prioritas_global']."</td>";?>
                    <?php echo "</tr>"; ?>
                    <?php $no++; } ?>
                </table>
                </div>
    			<p class="message warning">
                    <?php
                    $sql2 = "SELECT alternatif,prioritas_global FROM alternatif WHERE prioritas_global=(SELECT MAX(prioritas_global) FROM alternatif)";
                    $hasil2 = mysqli_query ($koneksi,$sql2) or die ("Gagal Akses");
                    $row2 = mysqli_fetch_array ($hasil2);
                    ?>
                   Objek wisata yang menjadi prioritas <b>untuk dikembangakan</b> adalah <b><?php echo $row2['alternatif'] ?></b> dengan nilai <b><?php echo $row2['prioritas_global'] ?></b>
                </p>
    		</div>
    	</div>
    </div>