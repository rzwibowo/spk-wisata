<?php
session_start();
//include "koneksi.php";
if (!isset($_SESSION["user"])) header("Location: login.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Entry Data User</title>

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
    				<h1>Data User</h1>
    				<p>Masukkan data user</p>
    			</div>
    			<form class="form" action="userSave.php" method="POST" name="form-kirim" enctype="multipart/form-data">
    				<fieldset>
    					<div class="form-item">
    						<label for="username">Nama User</label>
    						<input type="text" name="username" class="w50" id="username">
                              <div id="message-username" style="margin-top: 5px;"></div>
    					</div>
    					<div class="form-item">
    						<label for="password">Password</label>
    						<input type="password" name="password" class="w50" id="password">
                            <div id="message-password" style="margin-top: 5px;"></div>
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
        var username;
        var password;
    /*
     validasi nama propinsi , tidak bleh kosong
    */
        $("#username").blur(function(){
            username= $(this).val();
            if(username.length==0)
            {
              $("#message-username").show();
              $("#message-username").addClass("message error");
              $("#message-username").html("<span>Nama user tidak boleh kosong!</span>");
            }else
            {
                $("#message-username").hide();
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
        username       =$("#username").val();
        password        =$("#password").val();
        
           if(username.length==0){
               $("#username").focus();
               $("#message-username").addClass("message error");
               $("#message-username").html("<span>nama propinsi tidak boleh kosong!</span>");
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