<?php
session_start();
include "Config/koneksi.php";
//include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ADMIN</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Kube CSS -->
    <link rel="stylesheet" href="Asset/css/kube.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="Asset/js/kube.js"></script>
</head>
<body>
	<?php
    include "Config/route.php";

    function GenerateId($table,$field,$ValId,$kode,$koneksi){
    		$id = null;
    		$KodeData=null;
    	   if($ValId == null){
	    	   $sql ="SELECT count($field) as id FROM $table";
			   $result = mysqli_query($koneksi,$sql);
			   $dataId = mysqli_fetch_assoc($result);
			   $id = $dataId['id'];
			   $id++;
			   $ValId = $kode."".Kode($id).$id;
			}else{
				$id= substr($ValId,1);
				$id++; 
				$ValId = $kode."".Kode($id).$id;
			}
		   if(DataExist($table,$field,$ValId,$koneksi)){
		     	$id= substr($ValId,1);
				$id++; 
				$ValId = $kode."".Kode($id).$id;
				return $ValId;
		   }else{
		   	return $ValId;
		   }
           
    }
    function DataExist($table,$field,$idValue,$koneksi){
    	   $sql ="SELECT $field  FROM $table WHERE $field='$idValue'";
		   $result = mysqli_query($koneksi,$sql);
		   $dataId = mysqli_num_rows($result);
		   if($dataId > 0){
		   	return true;
		   }else{
		   	return false;
		   }
    }
    function Kode($id){
      if($id > 0 && $id < 10){
      	return "000";
      }elseif ($id > 9 && $id < 100) {
      	return "00";
      }elseif ($id > 99 && $id < 1000) {
      	return "0";
      }else{
      	return "";
      }
    }
	?>

</body>

 
</html>