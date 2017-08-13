

    <div id="main">
        <div class="row align-center">
            <div class="col-6">
                <div class="text-center">
                    <h1>Laporan Daftar Kriteria</h1>
                    
                </div>
                <br>
                <div>
                <table class="striped">
                <thead>
                    <tr>
                        <th>No. </th>
                        <th>Nama Kriteria</th>
                        <th>Prioritas</th>
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
                    <?php echo "</tr>"; ?>
                    <?php $no++; } ?>
                </table>
                </div>
                  <div style="text-align: right;">
                     <a href="index.php?page=kriteria_add" class="button" onclick="window.history.back();">Kembali</a>                      
                </div>
            </div>
        </div>
    </div>