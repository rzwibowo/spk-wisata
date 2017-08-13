<?php

	$page="null";

  if(!isset($_SESSION["user"])){

    	$page='login';
    }
	if(isset($_GET['page'])){
    $page = $_GET['page'];
    }

  if(isset($_POST['submit'])){
  	$page = $_POST['submit'];
  }

switch ($page) {

	//login
    case 'login':
        include "Login/login.php";
        break;
    case 'LOGIN_PROSES':
        include "Login/loginProses.php";
        break;
    case 'logout':
    	include "Login/logout.php";
    	break;
    //login end

    //wisata
    case 'wisata_show':
    	include "Wisata/wisataShow.php";
    	break;
    case 'wisata_add':
    	include "Wisata/wisataAdd.php";
    break;
    case 'WisataSave':
    	include "Wisata/wisataSave.php";
    	break;
    case 'WisataEdit':
    	include "Wisata/wisataEdit.php";
    	break;
    case 'WisataUpdate':
    	include "Wisata/wisataUpdate.php";
    	break;
    case 'WisataDelete':
    	include "Wisata/WisataDelete.php";
    	break;
    case 'WisataDetail':
        include "Wisata/DetailWisata.php";
        break;
    //end wisata
   
    //alternatif
    case 'alternatif_show':
    	include "Alternatif/alternatifShow.php";
    	break;
    case 'alternatif_add':
    	include "Alternatif/alternatifAdd.php";
        break;
    case 'alternatif_edit':
    	include "Alternatif/alternatifEdit.php";
        break;
    case 'alternatif_delete':
    	include "Alternatif/alternatifDelete.php";
        break;
    case 'AlternatifSave':
    	include "Alternatif/alternatifSave.php";
        break;
     case 'AlternatifUpdate':
    	include "Alternatif/alternatifUpdate.php";
        break;
    
        

    //end alternatif

    //kriteria
    case 'kriteria_show':
    	include "Kriteria/kriteriaShow.php";
    	break;
    case 'kriteria_add':
    	include "Kriteria/kriteriaAdd.php";
        break;
     case 'KriteriaSave':
    	include "Kriteria/kriteriaSave.php";
    	break;
    case 'kriteria_edit':
    	include "Kriteria/kriteriaEdit.php";
    	break;
    case 'kriteria_delete':
    	include "Kriteria/kriteriaDelete.php";
    	break;
    case 'kriteriaUpdate':
    	include "Kriteria/kriteriaUpdate.php";
    	break;
    
    
    //end kriteria

    //user
    case 'user_show':
    	include "User/userShow.php";
    	break;
    case 'user_add':
    	include "User/userAdd.php";
        break;
    case 'UserSave':
    	include "User/userSave.php";
    	break;
    case 'UserEdit':
    	include "User/userEdit.php";
    	break;
     case 'UserUpdate':
    	include "User/userUpdate.php";
    	break;
      case 'UserDelete':
    	include "User/userDelete.php";
    	break;
    //end user

    //perhitungan
    case 'perhitunganInput':
        include "Perhitungan/input.php";
        break;
    case 'perhitunganProses':
        include "Perhitungan/proses.php";
        break;
    //end perhitungan
    //Laporan
    case 'Laporan':
        include "Laporan/Laporan.php";
        break;
    case 'LDaftarKriteria':
        include "Laporan/LaporanDaftarKriteria.php";
        break;
    case 'LDaftarAlternatif':
        include "Laporan/LaporanDaftarAlternatif.php";
        break;
    case 'LDaftarWisata':
        include "Laporan/LaporanDaftarWisata.php";
        break;
    case 'LDaftarPenilaian':
        include "Laporan/LaporanDaftarPenilaian.php";
        break;
    //end Laporan
    default:
     include "Config/menu2.php";
}

?>