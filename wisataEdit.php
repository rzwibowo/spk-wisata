<?php 
session_start();

if (!isset($_SESSION["user"])) echo "<script>location.replace('login.php');</script>";

include "koneksi.php";

$id= $_GET['r'];
 

$sql = "select * from wisata where id_wisata='$id'";
$hasil = mysqli_query ($koneksi,$sql) or die ("Gagal Akses");

$row = mysqli_fetch_assoc($hasil);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ubah Data Wisata</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Kube CSS -->
    <link rel="stylesheet" href="css/kube.css">

</head>
<body>
    <div id="main">
        <div class="row align-center">
            <div class="col-6">
                <div class="head text-center">
                    <h1>Data Wisata</h1>
                    
                </div>
                <form class="form" action="userUpdate.php" method="POST" name="form-kirim">
                    <fieldset>
                        <input type="hidden" name="id_wisata" class="w50" id="id_wisata" value="<?php echo $row['id_wisata']?>">
                        <input type="hidden" name="id_wisata" class="w50" id="fasilitas" value="<?php echo $row['fasilitas']?>">
                        <input type="hidden" name="jml_pengunjung" class="w50" id="id_wisata" value="<?php echo $row['jml_pengunjung']?>">
                        <input type="hidden" name="id_wisata" class="w50" id="id_wisata" value="<?php echo $row['transportasi']?>">
                        <input type="hidden" name="transportasi" class="w50" id="infrastruktur" value="<?php echo $row['infrastruktur']?>">
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
                            <input type="radio" name="fasilitas" value="1"> 1 &nbsp;
                            <input type="radio" name="fasilitas" value="2"> 2 &nbsp;
                            <input type="radio" name="fasilitas" value="3"> 3 &nbsp;
                            <input type="radio" name="fasilitas" value="4"> 4 &nbsp;
                            <input type="radio" name="fasilitas" value="5"> 5 &nbsp;
                            <div id="message-fasilitas" style="margin-top: 5px;"></div>
                        </div>
                        <div class="form-item">
                            <label for="jml_pengunjung">Jumlah Pengunjung</label>
                            <input type="radio" name="jml_pengunjung" value="1"> 1 &nbsp;
                            <input type="radio" name="jml_pengunjung" value="2"> 2 &nbsp;
                            <input type="radio" name="jml_pengunjung" value="3"> 3 &nbsp;
                            <div id="message-jml_pengunjung" style="margin-top: 5px;"></div>
                        </div>
                        <div class="form-item">
                            <label for="transportasi">Transportasi</label>
                            <input type="radio" name="transportasi" value="0"> 0 &nbsp;
                            <input type="radio" name="transportasi" value="1"> 1 &nbsp;
                            <input type="radio" name="transportasi" value="2"> 2 &nbsp;
                            <div id="message-transportasi" style="margin-top: 5px;"></div>
                        </div>
                        <div class="form-item">
                            <label for="infrastruktur">Infrastruktur</label>
                            <input type="radio" name="infrastruktur" value="0"> 0 &nbsp;
                            <input type="radio" name="infrastruktur" value="1"> 1 &nbsp;
                            <input type="radio" name="infrastruktur" value="2"> 2 &nbsp;
                            <input type="radio" name="infrastruktur" value="3"> 3 &nbsp;
                            <div id="message-infrastruktur" style="margin-top: 5px;"></div>
                        </div>
                        <div class="row between">
                            <button type="reset" class="button secondary outline w15">Reset</button>
                            <button type="submit" class="button upper" id="kirim">Simpan</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>

    <!-- Kube JS + jQuery are used for some functionality, but are not required for the basic setup -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="js/kube.js"></script>
    <script type="text/javascript">
        var fasilitas=$("#fasilitas").val();
        var jml_pengunjung=$("#jml_pengunjung").val();
        var transportasi=$("#transportasi").val();
        var infrastruktur=$("#infrastruktur").val();

        if($("input[name='fasilitas']").val()===fasilitas){
            $(this).attr('checked','checked');
        }

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
</body>
</html>