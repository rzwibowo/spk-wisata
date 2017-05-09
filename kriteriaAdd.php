<?php
session_start();
//include "koneksi.php";
if (!isset($_SESSION["user"])) header("Location: login.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Entry Data Kriteria</title>

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
    				<h1>Data Kriteria</h1>
    				<p>Masukkan data kriteria</p>
    			</div>
    			<form class="form" action="kriteriaSave.php" method="POST" name="form-kirim" enctype="multipart/form-data">
    				<fieldset>
    					<div class="form-item">
    						<label for="nama_kriteria">Nama Kriteria</label>
    						<input type="text" name="nama_kriteria" class="w50" id="nama_kriteria">
                            <div id="message-nama_kriteria" style="margin-top: 5px;"></div>
    					</div>
                        <div class="form-item">
                            <label for="prioritas">Prioritas</label>
                            <input type="number" name="prioritas" class="w20" id="prioritas" min="0">
                            <div id="message-prioritas" style="margin-top: 5px;"></div>
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
    /*
     validasi nama propinsi , tidak bleh kosong
    */
        $("#nama_wisata").blur(function(){
            nama_wisata= $(this).val();
            if(nama_wisata.length==0)
            {
              $("#message-nama_wisata").show();
              $("#message-nama_wisata").addClass("message error");
              $("#message-nama_wisata").html("<span>Nama user tidak boleh kosong!</span>");
            }else
            {
                $("#message-nama_wisata").hide();
            } 
        });

    /*
     validasi nama alamat , tidak bleh kosong
    */
        $("#alamat").blur(function(){
            alamat= $(this).val();
            
            if(alamat.length==0)
            {
              $("#message-alamat").show();
              $("#message-alamat").addClass("message error");
              $("#message-alamat").html("<span>Nama ib ukota tidak boleh kosong!</span>");
            }else
            {
              $("#message-alamat").hide();
            } 
        });
      

    /*
    validasi kirim
    */
    $("#kirim").click(function(){
    $('form[name=form-kirim]').submit(function(){
        nama_wisata       =$("#nama_wisata").val();
        alamat        =$("#alamat").val();
        
           if(nama_wisata.length==0){
               $("#nama_wisata").focus();
               $("#message-nama_wisata").addClass("message error");
               $("#message-nama_wisata").html("<span>nama propinsi tidak boleh kosong!</span>");
               return false;
            }
            else if(alamat.length==0)
            {
                $("#alamat").focus();
                $("#message-alamat").addClass("message error");
                $("#message-alamat").html("<span>nama ibu kota tidak boleh kosong!</span>");
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