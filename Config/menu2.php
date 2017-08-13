<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Kube CSS -->
    <link rel="stylesheet" href="Asset/css/kube.css">
    <!-- <link rel="stylesheet" href="Asset/css/kube.demo.css"> -->
      <link rel="stylesheet" href="Asset/css/index.css">  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="Asset/js/kube.js"></script>
</head>
<body>
    <!-- <div class="row align-center"> -->
        <div id="wadah">
            <div id="buram"></div>
            <div id="wadah-menu">
                <div class="message focus">
                    <h5>Pengembangan Wisata</h5>
                    <?php
                        if(isset($_SESSION["user"])){
					?>
                    <div class="login-out">
                        <a href="index.php?page=logout">&#215; LOGOUT</a>
                    </div>
                    <?php
                        }else{
                    ?>
                    <div class="login-out">
                        <a href="index.php">&#187; LOGIN</a>
                    </div>
                     <?php
                        }
					?>
                </div>
                <div class="row gutters auto">
                    <div id="kriteria" onclick="location.href='index.php?page=kriteria_show'" class="col menu text-center">
                        <div class="icon">&#xa4;</div>
                        <div class="title">Kelola Data Kriteria</div>
                    </div>
                    <div id="alternatif" onclick="location.href='index.php?page=alternatif_show'" class="col menu text-center">
                        <div class="icon">&#xaa;</div>
                        <div class="title">Kelola Data Alternatif</div>
                    </div>
                    <div id="user" onclick="location.href='index.php?page=user_show'" class="col menu text-center">
                        <div class="icon">&#xcf;</div>
                        <div class="title">Kelola Data User</div>
                    </div>
                    <div id="wisata" onclick="location.href='index.php?page=wisata_show'" class="col menu text-center">
                        <div class="icon">&#x49;</div>
                        <div class="title">Kelola Data Wisata</div>
                    </div>
                    <div id="hitung" onclick="location.href='index.php?page=perhitunganInput'" class="col menu text-center">
                        <div class="icon">&#xcb;</div>
                        <div class="title">Perhitungan</div>
                    </div>
                    
                    <!-- <div id="logout" onclick="location.href='index.php?page=logout'" class="col menu text-center">
                        <div class="icon">&#xd3;</div>
                        <div class="title">Logout</div>
                    </div> -->
                    
                    <!-- <div id="login" onclick="location.href='index.php'" class="col menu text-center">
                        <div class="icon">&#xd2;</div>
                        <div class="title">Login</div>
                    </div> -->
                   
                </div>
            </div>
        </div>
    <!-- </div> -->
    <script>
        // function tiruUkuran(){
        //     $("#buram").css({
        //         'width': ($("#wadah").width() + 'px'),
        //         'height': ($("#wadah").height() + 'px')
        //     });
        // }
        $(document).ready(function(){
            $("#buram").css({
                'width': ($("#wadah").width() + 'px'),
                'height': ($("#wadah").height() + 'px')
            });
            }
        );
        $(window).resize(function(){
            $("#buram").css({
                'width': ($("#wadah").width() + 'px'),
                'height': ($("#wadah").height() + 'px')
            });
            }
        );
    </script>
</body>
</html>