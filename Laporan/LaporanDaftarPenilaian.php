
    <div id="main">
        <div class="row align-center">
            <div class="col-6">
                <div class="text-center">
                    <h1>Laporan Daftar Penilaian</h1>
                    
                </div>
                <br>
                <div>
                <table class="striped">
                <thead>
                    <tr>
                        <th>Alternatif / Kriteria</th>
                        <?php
                        $hasil = mysqli_query($koneksi,"SELECT * FROM kriteria");
                        while ($rw = mysqli_fetch_array($hasil)) {
                             echo "<th>".$rw['nama_kriteria']."</th>";
                         }
                        ?>
                           <th>Bobot Prioritas Global </th> 
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $hasil = mysqli_query($koneksi,"SELECT * FROM alternatif");
                    if($hasil){
                        while ($rw =mysqli_fetch_array($hasil)) {
                        echo "<tr>";
                        echo "<td>".$rw['alternatif']."</td>";
                        $query = mysqli_query($koneksi,"SELECT * FROM subkriteria WHERE id_alternatif='$rw[id_alternatif]'");
                        if($query){
                            while ($resalt = mysqli_fetch_array($query)) {
                                echo "<td>".$resalt['prioritas_subkriteria']."</td>";
                            }
                        }
                        echo "<td>".$rw['prioritas_global']."</td>";
                        echo "</tr>";
                        }
                    }
                ?>
                </tbody>
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
                 <div style="text-align: right;">
                    <a href="index.php?page=kriteria_add" class="button" onclick="window.history.back();">Kembali</a>                      
                </div>
                <br>
    		</div>
    	</div>
    </div>