<?php
session_start();
//include "koneksi.php";
if (!isset($_SESSION["user"])) header("Location: login.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Entry Data Wisata</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Kube CSS -->
    <link rel="stylesheet" href="css/kube.css">
</head>
<body>
<?php
    // include 'kepala.php';
?>
    <div id="main">
    	<div class="row align-center">
    		<div class="col-6">
    			<div class="head text-center">
    				<h1>Data Wisata</h1>
    				<p>Masukkan data wisata</p>
    			</div>
    			<form class="form" action="wisataSave.php" method="POST" name="form-kirim">
    				<fieldset>
    					<div class="form-item">
    						<label for="nama_wisata">Nama Wisata</label>
    						<input type="text" name="nama_wisata" class="w50" id="nama_wisata">
                            <div id="message-nama_wisata" style="margin-top: 5px;"></div>
    					</div>
    					<div class="form-item">
    						<label for="alamat">Alamat</label>
    						<!-- <input type="alamat" name="alamat" class="w50" id="alamat"> -->
                            <textarea name="alamat" id="alamat" cols="30" rows="3"></textarea>
                            <div id="message-alamat" style="margin-top: 5px;"></div>
    					</div>
    					<div class="form-item">
                            <label for="keterangan">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" cols="30" rows="3"></textarea>
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
        var nama_wisata;
        var alamat;
        var keterangan;
        var fasilitas;
        var jml_pengunjung;
        var transportasi;
        var infrastruktur;
    /*
     validasi nama wisata , tidak bleh kosong
    */
        $("#nama_wisata").blur(function(){
            nama_wisata= $(this).val();
            if(nama_wisata.length==0)
            {
              $("#message-nama_wisata").show();
              $("#message-nama_wisata").addClass("message error");
              $("#message-nama_wisata").html("<span>Nama wisata tidak boleh kosong!</span>");
            }else
            {
                $("#message-nama_wisata").hide();
            } 
        });


    /*
     validasi alamat , tidak bleh kosong
    */
        $("#alamat").blur(function(){
            alamat= $(this).val();
            
            if(alamat.length==0)
            {
              $("#message-alamat").show();
              $("#message-alamat").addClass("message error");
              $("#message-alamat").html("<span>alamat tidak boleh kosong!</span>");
            }else
            {
              $("#message-alamat").hide();
            } 
        });
      
    /*
     validasi keterangan , tidak bleh kosong
    */
        $("#keterangan").blur(function(){
            keterangan= $(this).val();
            
            if(keterangan.length==0)
            {
              $("#message-keterangan").show();
              $("#message-keterangan").addClass("message error");
              $("#message-keterangan").html("<span>keterangan tidak boleh kosong!</span>");
            }else
            {
              $("#message-keterangan").hide();
            } 
        });


    /*
    validasi kirim
    */
    $("#kirim").click(function(){
    $('form[name=form-kirim]').submit(function(){
        nama_wisata       =$("#nama_wisata").val();
        alamat          =$("#alamat").val();
        keterangan          =$("#keterangan").val();
        fasilitas       =$("input:radio[name=fasilitas]:checked").val();
        jml_pengunjung       =$("input:radio[name=jml_pengunjung]:checked").val();
        transportasi       =$("input:radio[name=transportasi]:checked").val();
        infrastruktur       =$("input:radio[name=infrastruktur]:checked").val();
           if(nama_wisata.length==0){
               $("#nama_wisata").focus();
               $("#message-nama_wisata").addClass("message error");
               $("#message-nama_wisata").html("<span>nama wisata tidak boleh kosong!</span>");
               return false;
            }
            else if(alamat.length==0)
            {
                $("#alamat").focus();
                $("#message-alamat").addClass("message error");
                $("#message-alamat").html("<span>alamat tidak boleh kosong!</span>");
                return false;
            }
            else if(keterangan.length==0)
            {
                $("#keterangan").focus();
                $("#message-keterangan").addClass("message error");
                $("#message-keterangan").html("<span>keterangan tidak boleh kosong!</span>");
                return false;
            }
            else if(!fasilitas)
            {
                $("#message-fasilitas").addClass("message error");
                $("#message-fasilitas").html("<span>fasilitas tidak boleh kosong!</span>");
                return false;
            }
            else if(!jml_pengunjung)
            {
                $("#message-jml_pengunjung").addClass("message error");
                $("#message-jml_pengunjung").html("<span>jumlah pengunjung tidak boleh kosong!</span>");
                return false;
            }
            else if(!transportasi)
            {
                $("#message-transportasi").addClass("message error");
                $("#message-transportasi").html("<span>transportasi tidak boleh kosong!</span>");
                return false;
            }
            else if(!infrastruktur)
            {
                $("#message-infrastruktur").addClass("message error");
                $("#message-infrastruktur").html("<span>infrastruktur tidak boleh kosong!</span>");
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