    <?php include "kepala.php"; ?>
<?php 

$id= $_GET['r'];
 

$sql = "select * from user where user_id=$id";
$hasil = mysqli_query ($koneksi,$sql) or die ("Gagal Akses");

$row = mysqli_fetch_assoc($hasil);
?>

    <div id="main">
        <div class="row align-center">
            <div class="col-6">
                <div class="head text-center">
                    <h1>Data User</h1>
                    
                </div>
                <form class="form" action="index.php" method="POST" name="form-kirim" enctype="multipart/form-data">
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
                        <div class="form-item">
                            <label for="level">Level User</label>
                            <select name="level" class="w50" id="level">
                                <?php
                                    if($row['level'] == 0){
                                        echo "<option value='0' selected>Admin</option><option value='1'>Pemimpin</option>";
                                    }else{
                                        echo "<option value='0'>Admin</option><option value='1' selected>Pemimpin</option>";
                                    }
                                ?>
                            </select>
                            <div id="message-level" style="margin-top: 5px;"></div>
                        </div>
                        <div class="row between">
                            <button type="reset" class="button secondary outline w15">Reset</button>
                            <button type="submit" name="submit" value="UserUpdate" class="button upper" id="kirim">Simpan</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    <br>
    <br>

    <script type="text/javascript">
        var username;
        var password;
        var level;
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

     validasi level , tidak bleh kosong
    */
        $("#level").blur(function(){
            level= $(this).val();
            
            if(level.length==0)
            {
              $("#message-level").show();
              $("#message-level").addClass("message error");
              $("#message-level").html("<span>level tidak boleh kosong!</span>");
            }else
            {
              $("#message-level").hide();
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
