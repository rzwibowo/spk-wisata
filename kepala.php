<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="Asset/css/kube.demo.css">
</head>
<body>
    <div id="mini" class="show-sm message" data-component="sticky">
        <a class="button outline secondary" href="#" data-component="toggleme" data-target="#navbar-demo"><i class="kube-menu"></i>Menu</a>
    </div>
    <div id="navbar-demo" class="hide-sm" data-component="sticky" style="padding: 5px">
        <div id="navbar-brand">
            <a href="index.php">
                <img src="Asset/img/logo.png" alt="Pengembangan Wisata">
            </a>
        </div>
        <nav id="navbar-main">
            <ul>
                <li><a href="index.php?page=kriteria_show">Kriteria</a></li>
                <li><a href="index.php?page=wisata_show">Wisata</a></li>
				<li><a href="index.php?page=perhitunganInput">Perhitungan</a></li>
                <li><a href="index.php?page=alternatif_show">Alternatif</a></li>
				<li><a href="index.php?page=wisataShow">Daftar Wisata</a></li>
                <li><a href="index.php?page=user_show">User</a></li>
               
            </ul>
        </nav>
        <nav id="user" class="push-right">
            <?php
                if(isset($_SESSION["user"])){
                ?>
            <div class="form-item">
                <a href="index.php?page=logout" class="button round outline secondary" role="button">Logout</a>
            </div>
            <?php
            }else{

            ?>
            <div class="form-item">
                <a href="index.php" class="button round outline secondary" role="button">Login</a>
            </div>
            <?php
            }
            ?>
        </nav>
    </div>
</body>
</html>