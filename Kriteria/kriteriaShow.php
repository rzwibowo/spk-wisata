
    <div id="main">
    	<div class="row align-center">
    		<div class="col-6">
    			<div class="text-center">
    				<h1>Daftar Kriteria</h1>
    				
    			</div>
    			<div>
                    <a href="index.php?page=kriteria_add" class="button">Tambah Kriteria</a>                    
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
                        <a href='index.php?page=kriteria_edit&r=".$row['kriteria_id']."' class='button'>Edit</a>
                        <a href='index.php?page=kriteria_delete&r=".$row['kriteria_id']."' class='button' onclick = 'if (! confirm('Yakin akan menghapus data?')) { return false; }' style='background-color: #ff3333' >Hapus</a>
                        </td>";
                        ?>
                    <?php echo "</tr>"; ?>
                    <?php $no++; } ?>
                </table>
                </div>
    			
    		</div>
    	</div>
    </div>