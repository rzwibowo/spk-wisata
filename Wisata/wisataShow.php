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
                        <th>Fasilitas</th>
                        <th>Jumlah Pengunjung</th>
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
                
                $fasilitas="";
                $jml_pengunjung="";
                $transportasi="";
                $infrastruktur="";
                
                switch ($row['fasilitas']) {
                    case 1:
                        $fasilitas="Sangat kurang lengkap";
                        break;
                    
                    case 2:
                        $fasilitas="Kurang lengkap";
                        break;

                    case 3:
                        $fasilitas="Cukup lengkap";
                        break;

                    case 4:
                        $fasilitas="Lengkap";
                        break;

                    case 5:
                        $fasilitas="Sangat lengkap";
                        break;

                    default:
                        $fasilitas="Belum diisi";
                        break;
                }

                switch ($row['jml_pengunjung']) {
                    case 1:
                        $jml_pengunjung="&lt; 50 tidak banyak";
                        break;
                    
                    case 2:
                        $jml_pengunjung="50-100 banyak";
                        break;

                    case 3:
                        $jml_pengunjung="&gt; 100 sangat banyak";
                        break;

                    default:
                        $jml_pengunjung="Belum diisi";
                        break;
                }

                switch ($row['transportasi']) {
                    case 1:
                        $transportasi="Tidak tersedia";
                        break;
                    
                    case 2:
                        $transportasi="Tersedia";
                        break;

                    case 3:
                        $transportasi="Dilewati";
                        break;

                    default:
                        $transportasi="Belum diisi";
                        break;
                }

                switch ($row['infrastruktur']) {
                    case 1:
                        $infrastruktur="Tidak ada";
                        break;
                    
                    case 2:
                        $infrastruktur="Ada salah satu";
                        break;

                    case 3:
                        $infrastruktur="Ada salah dua";
                        break;

                    case 4:
                        $infrastruktur="Ada salah tiga";
                        break;

                    default:
                        $infrastruktur="Belum diisi";
                        break;
                }

                ?>
                    <?php "<tr>"; ?>
                        <?php echo "<td>".$no.". </td>"; ?> 
                        <?php echo "<td>".$row['nama_wisata']."</td>";?>
                        <?php echo "<td>".$row['alamat']."</td>";?>
                        <?php echo "<td>".$row['keterangan']."</td>";?>
                        <?php echo "<td>".$fasilitas."</td>";?>
                        <?php echo "<td>".$jml_pengunjung."</td>";?>
                        <?php echo "<td>".$transportasi."</td>";?>
                        <?php echo "<td>".$infrastruktur."</td>";?>
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
