    <?php include "kepala.php"; ?>
<?php 

$id= $_GET['r'];
 echo $id;
$sql = "select * from wisata where id_wisata='$id'";
$hasil = mysqli_query ($koneksi,$sql) or die ("Gagal Akses");

$row = mysqli_fetch_assoc($hasil);
?>

    <div id="main">
        <div class="row align-center">
            <div class="col-6">
                <div class="head text-center">
                    <h1>Data Wisata</h1>
                    
                </div>
                <form class="form" action="index.php" method="POST" name="form-kirim">
                    <fieldset>
                        <input type="hidden" name="id_wisata" class="w50" id="id_wisata" value="<?php echo $row['id_wisata']?>">
                        <input type="hidden" name="fasilitas" class="w50" id="fasilitas" value="<?php echo $row['fasilitas']?>">
                        <input type="hidden" name="jml_pengunjung" class="w50" id="jml_pengunjung" value="<?php echo $row['jml_pengunjung']?>">
                        <input type="hidden" name="transportasi" class="w50" id="transportasi" value="<?php echo $row['transportasi']?>">
                        <input type="hidden" name="infrastruktur" class="w50" id="infrastruktur" value="<?php echo $row['infrastruktur']?>">
                        <div class="form-item">
                            <label for="nama_wisata">Nama Wisata</label>
                            <input type="text" name="nama_wisata" class="w50" id="nama_wisata" value="<?php echo $row['nama_wisata']?>">
                              <div id="message-nama_wisata" style="margin-top: 5px;"></div>
                        </div>
                        <div class="form-item">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" cols="30" rows="3"><?php echo $row['alamat']?></textarea>
                            <div id="message-alamat" style="margin-top: 5px;"></div>
                        </div>
                        <div class="form-item">
                            <label for="keterangan">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" cols="30" rows="3"><?php echo $row['keterangan']?></textarea>
                            <div id="message-keterangan" style="margin-top: 5px;"></div>
                        </div>
                        <div class="form-item">
                            <label for="fasilitas">Fasilitas</label>
                            <input type="radio" name="fasilitas" value="1"> Sangat kurang lengkap &nbsp;
                            <input type="radio" name="fasilitas" value="2"> Kurang lengkap &nbsp;
                            <input type="radio" name="fasilitas" value="3"> Cukup lengkap &nbsp;
                            <input type="radio" name="fasilitas" value="4"> Lengkap &nbsp;
                            <input type="radio" name="fasilitas" value="5"> Sangat lengkap &nbsp;
                            <div id="message-fasilitas" style="margin-top: 5px;"></div>
                        </div>
                        <div class="form-item">
                            <label for="jml_pengunjung">Jumlah Pengunjung</label>
                            <input type="radio" name="jml_pengunjung" value="1"> &lt; 50 tidak banyak &nbsp;
                            <input type="radio" name="jml_pengunjung" value="2"> 50-100 banyak &nbsp;
                            <input type="radio" name="jml_pengunjung" value="3"> &gt; 100 sangat banyak &nbsp;
                            <div id="message-jml_pengunjung" style="margin-top: 5px;"></div>
                        </div>
                        <div class="form-item">
                            <label for="transportasi">Transportasi</label>
                            <input type="radio" name="transportasi" value="1"> Tidak tersedia &nbsp;
                            <input type="radio" name="transportasi" value="2"> Tersedia &nbsp;
                            <input type="radio" name="transportasi" value="3"> Dilewati &nbsp;
                            <div id="message-transportasi" style="margin-top: 5px;"></div>
                        </div>
                        <div class="form-item">
                            <label for="infrastruktur">Infrastruktur</label>
                            <input type="radio" name="infrastruktur" value="1"> Tidak ada &nbsp;
                            <input type="radio" name="infrastruktur" value="2"> Ada salah satu &nbsp;
                            <input type="radio" name="infrastruktur" value="3"> Ada salah dua &nbsp;
                            <input type="radio" name="infrastruktur" value="4"> Ada salah tiga &nbsp;
                            <div id="message-infrastruktur" style="margin-top: 5px;"></div>
                        </div>
                        <div class="row between">
                            <button type="reset" class="button secondary outline w15">Reset</button>
                            <button type="submit" name="submit" value="WisataUpdate" class="button upper" id="kirim">Simpan</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        var fasilitas=$("#fasilitas").val();
        var jml_pengunjung=$("#jml_pengunjung").val();
        var transportasi=$("#transportasi").val();
        var infrastruktur=$("#infrastruktur").val();

        $("input:radio[name=fasilitas][value="+fasilitas+"]").attr('checked','checked');
        $("input:radio[name=jml_pengunjung][value="+jml_pengunjung+"]").attr('checked','checked');
        $("input:radio[name=transportasi][value="+transportasi+"]").attr('checked','checked');
        $("input:radio[name=infrastruktur][value="+infrastruktur+"]").attr('checked','checked');
        
        var nama_wisata;
        var password;
    /*
     validasi nama propinsi , tidak bleh kosong
    */
        $("#nama_wisata").blur(function(){
            nama_wisata= $(this).val();
            if(nama_wisata.length==0)
            {
              $("#message-nama_wisata").show();
              $("#message-nama_wisata").addClass("message error");
              $("#message-nama_wisata").html("<span>Nama propinsi tidak boleh kosong!</span>");
            }else
            {
                $("#message-nama_wisata").hide();
            } 
        });

    /*
     validasi nama password , tidak bleh kosong
    */
        $("#password").blur(function(){
            password= $(this).val();
            
            if(password.length==0)
            {
              $("#message-password").show();
              $("#message-password").addClass("message error");
              $("#message-password").html("<span>Nama ib ukota tidak boleh kosong!</span>");
            }else
            {
              $("#message-password").hide();
            } 
        });
      
    /*
    validasi kirim
    */
    $("#kirim").click(function(){
    $('form[name=form-kirim]').submit(function(){
        nama_wisata       =$("#nama_wisata").val();
        password         =$("#password").val();

           if(nama_wisata.length==0){
               $("#nama_wisata").focus();
               $("#message-nama_wisata").addClass("message error");
               $("#message-nama_wisata").html("<span>nama propinsi tidak boleh kosong!</span>");
               return false;
            }
            else if(password.length==0)
            {
                $("#password").focus();
                $("#message-password").addClass("message error");
                $("#message-password").html("<span>nama ibu kota tidak boleh kosong!</span>");
                return false;
            }

            else
            {
                return true;
            }
        
        });
    });

    </script>
