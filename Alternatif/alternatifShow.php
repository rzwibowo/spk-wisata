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
                $sql = "SELECT id_alternatif,alternatif,periode,prioritas_global FROM alternatif";
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
    			
    		</div>
    	</div>
    </div>