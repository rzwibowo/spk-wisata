    <?php include "kepala.php"; ?>

<?php 

$id= $_GET['r'];
 

$sqlX = "select * from alternatif where id_alternatif=$id";
$hasilX = mysqli_query ($koneksi,$sqlX) or die ("Gagal Akses");

$rowX = mysqli_fetch_assoc($hasilX);
?>
    <div id="main">
        <div class="row align-center">
            <div class="col-6">
                <div class="head text-center">
                    <h1>Data Alternatif</h1>
                    
                </div>
                <form class="form" action="index.php" method="POST" name="form-kirim" enctype="multipart/form-data">
                    <fieldset>
                        <input type="hidden" name="id_alternatif" class="w50" id="id_alternatif" value="<?php echo $rowX['id_alternatif']; ?>">
                        <div class="form-item">
                            <label for="nama_wisata">Nama Wisata</label>
                            <select name="nama_wisata" id="nama_wisata" class="w50">
                            <?php
                                $sql="select id_wisata, nama_wisata from wisata";
                                $hasil=mysqli_query($koneksi,$sql) or die("Gagal Akses");
                                while ($row=mysqli_fetch_array($hasil)) {
                                    echo "<option value='".$row['id_wisata']."'";
                                    if ($rowX['id_wisata']==$row['id_wisata'])
                                    {
                                        echo "selected='selected'";
                                    }
                                    else echo "selected=''";
                                    echo ">".$row['nama_wisata']."</option>";
                                }
                            ?>
                            </select>
                            <div id="message-nama_wisata" style="margin-top: 5px;"></div>
                        </div>
                        <div class="form-item">
                            <label for="periode">Periode</label>
                            <input type="month" name="periode" class="w50" id="periode" value=<?php echo "\"".$rowX['periode']."\"" ?>>
                            <div id="message-periode" style="margin-top: 5px;"></div>
                        </div>
                        <div class="row between">
                            <button type="reset" class="button secondary outline w15">Reset</button>
                            <button type="submit" name="submit" value="AlternatifUpdate" class="button upper" id="kirim">Simpan</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        var nama_kriteria;
        var prioritas_kriteria;
    /*
     validasi nama propinsi , tidak bleh kosong
    */
        $("#nama_kriteria").blur(function(){
            nama_kriteria= $(this).val();
            if(nama_kriteria.length==0)
            {
              $("#message-nama_kriteria").show();
              $("#message-nama_kriteria").addClass("message error");
              $("#message-nama_kriteria").html("<span>Nama propinsi tidak boleh kosong!</span>");
            }else
            {
                $("#message-nama_kriteria").hide();
            } 
        });

    /*
     validasi nama prioritas_kriteria , tidak bleh kosong
    */
        $("#prioritas_kriteria").blur(function(){
            prioritas_kriteria= $(this).val();
            
            if(prioritas_kriteria.length==0)
            {
              $("#message-prioritas_kriteria").show();
              $("#message-prioritas_kriteria").addClass("message error");
              $("#message-prioritas_kriteria").html("<span>Nama ib ukota tidak boleh kosong!</span>");
            }else
            {
              $("#message-prioritas_kriteria").hide();
            } 
        });
      
    /*
    validasi kirim
    */
    $("#kirim").click(function(){
    $('form[name=form-kirim]').submit(function(){
        nama_kriteria       =$("#nama_kriteria").val();
        prioritas_kriteria         =$("#prioritas_kriteria").val();

           if(nama_kriteria.length==0){
               $("#nama_kriteria").focus();
               $("#message-nama_kriteria").addClass("message error");
               $("#message-nama_kriteria").html("<span>nama propinsi tidak boleh kosong!</span>");
               return false;
            }
            else if(prioritas_kriteria.length==0)
            {
                $("#prioritas_kriteria").focus();
                $("#message-prioritas_kriteria").addClass("message error");
                $("#message-prioritas_kriteria").html("<span>nama ibu kota tidak boleh kosong!</span>");
                return false;
            }

            else
            {
                return true;
            }
        
        });
    });

    </script>
