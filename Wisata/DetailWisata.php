    <?php include "kepala.php"; 
          $id=$_GET['r'];
    ?>
    <div id="main">
    	<div class="row align-center">
    		<div class="col-10">

                <fieldset>
                 <legend>Data Wisata</legend>
                <?php
                    $resaltset = mysqli_query($koneksi,"SELECT * FROM wisata WHERE id_wisata ='$id'");
                    while ($rw = mysqli_fetch_array($resaltset)) {
                        ?>
                        <table>
                            <tr>
                               <th>Nama Wisata</th><td>: <?php echo $rw['nama_wisata']?></td>
                            </tr>
                            <tr>
                                 <th>Alamat</th><td>: <?php echo $rw['alamat']?></td>
                            </tr>
                            <tr>
                                <th>Keterangan</th><td>: <?php echo $rw['keterangan']?></td> 
                            </tr>

                        </table>
                        <?php
                    }
                ?>
                </fieldset>
                <fieldset>
                <legend>Data Kriteria Wisata</legend>
                <?php
                $Query = mysqli_query($koneksi,"SELECT DISTINCT k.nama_kriteria as nama_kriteria,k.kriteria_id as kriteria_id from detail_kriteria_wisata dw
                    INNER JOIN kriteria k
                    ON dw.id_kriteria = k.kriteria_id WHERE id_wisata = '$id'");
                while ($result = mysqli_fetch_array($Query)) {
                    echo "<table>";
                            echo "<p><b>".$result['nama_kriteria']."</b></P>";
                          $hasil = mysqli_query($koneksi,"SELECT  dk.nama as nama FROM detail_kriteria_wisata dw
                                JOIN detail_kriteria dk ON dk.id_detail_kriteria = 
                                dw.id_detailkriteria 
                                WHERE dw.id_wisata ='$id' AND  dk.id_kriteria ='$result[kriteria_id]' ");
                          while ($rs = mysqli_fetch_array($hasil)) {
                              echo "<label>".$rs['nama']."</label>";
                          }
                          echo "<table>";
                }
                ?>
                     </fieldset>
    			
    		</div>
    	</div>
    </div>
