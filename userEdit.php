<?php 
session_start();

if (!isset($_SESSION["user"])) echo "<script>location.replace('login.php');</script>";

include "koneksi.php";

$id= $_GET['r'];
 

$sql = "select * from user where user_id='$id'";
$hasil = mysqli_query ($koneksi,$sql) or die ("Gagal Akses");

$row = mysqli_fetch_assoc($hasil);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ubah Data User</title>

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
                    <h1>Data User</h1>
                    
                </div>
                <form class="form" action="userUpdate.php" method="POST" name="form-kirim" enctype="multipart/form-data">
                    <fieldset>
                        <input type="hidden" name="user_id" class="w50" id="user_id" value="<?php echo $row['user_id']?>">
                        <div class="form-item">
                            <label for="username">Nama User</label>
                            <input type="text" name="username" class="w50" id="username" value="<?php echo $row['username']?>">
                              <div id="message-username" style="margin-top: 5px;"></div>
                        </div>
                        <div class="form-item">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="w50" id="password" value="">
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
     validasi username , tidak bleh kosong
    */
        $("#username").blur(function(){
            username= $(this).val();
            if(username.length==0)
            {
              $("#message-username").show();
              $("#message-username").addClass("message error");
              $("#message-username").html("<span>username tidak boleh kosong!</span>");
            }else
            {
                $("#message-username").hide();
            } 
        });

    /*
     validasi password , tidak bleh kosong
    */
        $("#password").blur(function(){
            password= $(this).val();
            
            if(password.length==0)
            {
              $("#message-password").show();
              $("#message-password").addClass("message error");
              $("#message-password").html("<span>password tidak boleh kosong!</span>");
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
        password         =$("#password").val();

           if(username.length==0){
               $("#username").focus();
               $("#message-username").addClass("message error");
               $("#message-username").html("<span>username tidak boleh kosong!</span>");
               return false;
            }
            else if(password.length==0)
            {
                $("#password").focus();
                $("#message-password").addClass("message error");
                $("#message-password").html("<span>password tidak boleh kosong!</span>");
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