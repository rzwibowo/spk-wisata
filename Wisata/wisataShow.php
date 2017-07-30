    <?php include "kepala.php"; ?>
    <div id="main">
    	<div class="row align-center">
    		<div class="col-10">
    			<div class="text-center">
    				<h1>Daftar Wisata</h1>
    				
    			</div>
    			<div>
                    <a href="index.php?page=wisata_add" class="button">Tambah Data Wisata</a>                    
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
                        <?php echo
                        "<td>
                        <a href='index.php?r=".$row['id_wisata']."&page=WisataEdit' class='button'>Edit</a>
                        <a href='index.php?r=".$row['id_wisata']."&page=WisataDelete' class='button' onclick = 'if (! confirm('Yakin akan menghapus data?')) { return false; }' style='background-color: #ff3333' >Hapus</a>
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
