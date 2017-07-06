    <div id="main" >
    	<div class="row align-center">
    		<div class="col-12">
    			<div class="text-center">
    				<h1>Hasil Perhitungan</h1>
    				<br>
    			</div>
    		</div>
    		<div class="col-12">
    		<div class="text-center">
<?php
$input = $_POST['inputAll'];
$perbandinganQueue = $_SESSION['All'];
$kriteria=$_SESSION['kriteria'];
$index=0;
$index_prioritas = 0;
//memasukan inputan ke dalam array
foreach ($input as $keys => $values) {
	  foreach ($values as $key => $value) {
	  	$perbandinganQueue[$keys][$key] = $input[$keys][$key];
	  }	
}
//matrik nilai perbandingan berpasangan antar kritetia
$lop=count($perbandinganQueue);
for ($i=0; $i<$lop; $i++) { 
	for ($j=0; $j< $lop; $j++) {
		if($perbandinganQueue[str_replace(" ","_",$kriteria[$j])][ str_replace(" ","_",$kriteria[$j].$i)]==null)
		{
			$perbandinganQueue[str_replace(" ","_",$kriteria[$j])][ str_replace(" ","_",$kriteria[$j].$i)] = round($perbandinganQueue[str_replace(" ","_",$kriteria[$i])][str_replace(" ","_",$kriteria[$i].$i)] / $perbandinganQueue[str_replace(" ","_",$kriteria[$i])][ str_replace(" ","_",$kriteria[$i].$j)],2);
		}
	}
	}
$lop=count($perbandinganQueue);
echo "<b>1. Matrik nilai perbandingan berpasangan antar kriteria</b></div></div><br><br>";
echo "<div><div class='col-12'><table class='striped'>";
echo "<tr>";
	echo "<th>Kriteria</th>";
foreach ($kriteria as $key => $value) {
   echo "<th>".$value."</th>";    
}
echo "</tr>";
for ($i=0; $i <$lop; $i++) { 
	echo "<tr>";
	echo "<th>".$kriteria[$i]."</th>";
	$jumlah=0;
	for ($j=0; $j<$lop; $j++) {  
		echo "<td>".$perbandinganQueue[str_replace(" ","_",$kriteria[$i])][str_replace(" ","_",$kriteria[$i]).$j]."</td>";
		$jumlah+=$perbandinganQueue[str_replace(" ","_",$kriteria[$j])][str_replace(" ","_",$kriteria[$j]).$i];
	}
	$perbandinganQueue['jumlah'][$i]=$jumlah;
	echo "</tr>";
}
echo "<tr>"; 
echo "<th>Jumlah</th>";
for ($i=0; $i<$lop; $i++) { 
	echo "<td>".$perbandinganQueue['jumlah'][$i]."</td>";
}
echo "</tr>";
echo "</table></div></div><br><br>";
//matrik menghitung nilai prioritas;

$lop = count($perbandinganQueue)-1;
$QueuePrioritas = $perbandinganQueue;
for ($i=0; $i<$lop; $i++) { 
 	for ($j=0; $j<$lop ; $j++) {
 	     $QueuePrioritas[str_replace(" ","_",$kriteria[$j])][str_replace(" ","_",$kriteria[$j]).$i]=$perbandinganQueue[str_replace(" ","_",$kriteria[$j])][str_replace(" ","_",$kriteria[$j]).$i]/$perbandinganQueue['jumlah'][$i];
 	}
 }
//Set Collum Jumlah dan prioritas
$lop= count($QueuePrioritas)-1;
for ($i=0; $i<$lop; $i++) { 
	$temJum = 0;
	for ($j=0; $j<$lop; $j++) { 
	    $temJum += $QueuePrioritas[str_replace(" ","_",$kriteria[$i])][str_replace(" ","_",$kriteria[$i]).$j]; 
	}
	$QueuePrioritas[str_replace(" ","_",$kriteria[$i])][str_replace(" ","_",$kriteria[$i]).$j]=$temJum;
	$QueuePrioritas[str_replace(" ","_",$kriteria[$i])][str_replace(" ","_",$kriteria[$i]).($j+1)]=$temJum/$lop;
}
echo "<div class='col-12'> <div class='text-center'>";
echo "<b>2. Matrik nilai prioritas</div></div></b><br><br>";
echo "<div class='row'><div class='col-12'><table class='striped'>";
echo "<tr>";
	echo "<th>Kriteria</th>";
foreach ($kriteria as $key => $value) {
   echo "<th>".$value."</th>";    
}
echo "<th>Jumlah</th><th>Prioritas</th>";
echo "</tr>";
$lop = count($QueuePrioritas)-1;
for ($i=0; $i<$lop; $i++) { 
	echo "<tr>";
	echo "<th>".$kriteria[$i]."</th>";
	$index = str_replace(" ","_",$kriteria[$i]);
	$lops = count($QueuePrioritas[$index]);
	for ($j=0; $j<$lops; $j++) { 
        echo "<td>".$QueuePrioritas[$index][$index.$j]."</td>";
	}
}
echo "</table></div></div>";

//matrik untuk menentukan jumlah baris
$QueueJumlahBaris = $perbandinganQueue;
$lop = count($perbandinganQueue)-1;
for ($i=0; $i<$lop; $i++) {
	 $indexCollum = str_replace(" ","_",$kriteria[$i]);
     $columTarget = count($QueuePrioritas[$indexCollum])-1;
	for ($j=0; $j<$lop; $j++) {
	$QueueJumlahBaris[$indexCollum][$indexCollum.$j] =$perbandinganQueue[$indexCollum][$indexCollum.$j] * $QueuePrioritas[$indexCollum][$indexCollum.$columTarget];
	}
}
//hitung jumlah_baris dan  jum * bobot
$lop= count($QueueJumlahBaris)-1;
$JumBobot =0;
for ($i=0; $i<$lop; $i++) { 
	$temJumBaris = 0;
	$indexCollum = str_replace(" ","_",$kriteria[$i]);
	$columTarget = count($QueuePrioritas[$indexCollum])-1;
	$lops= count($QueueJumlahBaris[$indexCollum]);
	for ($j=0; $j<$lops; $j++) { 
		$temJumBaris+=$QueueJumlahBaris[$indexCollum][$indexCollum.$j];
	}
	$QueueJumlahBaris[$indexCollum][$indexCollum.$j]= $temJumBaris;
   $QueueJumlahBaris[$indexCollum][$indexCollum.($j+1)]=$temJumBaris*$QueuePrioritas[$indexCollum][$indexCollum.$columTarget];
   $JumBobot+=$temJumBaris*$QueuePrioritas[$indexCollum][$indexCollum.$columTarget];
}
$QueueJumlahBaris['jumlah']=$JumBobot;
echo "<div class='col-12'> <div class='text-center'>";
echo "<b>3. Matrik jumlah baris</b></div></div><br><br>";
echo "<div class='row'><div class='col-12'><table class='striped'>";
    echo "<tr>";
	echo "<th>Kriteria</th>";
foreach ($kriteria as $key => $value) {
    echo "<th>".$value."</th>";    
}
echo "<th>jumlah_baris</th><th>Jumlah * Bobot</th>";
echo "</tr>";
for ($i=0; $i<$lop; $i++) { 
	echo "<tr>";
	echo "<th>".$kriteria[$i]."</th>";
	$indexCollum = str_replace(" ","_",$kriteria[$i]);
	$lops = count($QueueJumlahBaris[$indexCollum]);
		for ($j=0; $j<$lops; $j++) { 
        echo "<td>".$QueueJumlahBaris[$indexCollum][$indexCollum.$j]."</td>";
	}
}
echo "<tr><td colspan='".$lops."' align='center'><b>Jumlah</b></td><td><b>".$QueueJumlahBaris['jumlah']."</b></td></tr>";
echo "</table></div></div>";
nilaiCR($QueueJumlahBaris,$QueuePrioritas,$kriteria);

echo "</div>";

$Queue =$_SESSION['Queue'];
$wisata = $_SESSION['wisata'];

$i= 0;
foreach ($Queue as $key=>$values) {
	$Queue[$key] = setInputInArray($Queue[$key],$_POST[str_replace(" ", "_", $key)],$wisata);
	$i++;
}
$perbandinganBerpasanganQueu=$Queue;
$prioritasQueue=$Queue;
$jumlahBarisQueue=$Queue;

foreach ($Queue as $key => $value) {
	echo "<br><br><div class='row align-center'>";
	echo"<div class='col-12'> <div class='text-center'><h1>Kriteria ".str_replace("_"," ",$key)."</h1></div></div>";
	$perbandinganBerpasanganQueu[$key]= perbandinganBerpasanganAntarKritetia($Queue[$key],$wisata);
	$prioritasQueue[$key]=menghitungNilaiPrioritas($perbandinganBerpasanganQueu[$key],$wisata);
	$jumlahBarisQueue[$key]=jumlahBaris($perbandinganBerpasanganQueu[$key],$prioritasQueue[$key],$wisata);
    nilaiCRPerKriteria($jumlahBarisQueue[$key],$prioritasQueue[$key],$wisata);
    echo "</div>";
}

//function
function setInputInArray($Queue,$POST,$wisata){
		foreach ($wisata as $key => $values) {
			if(isset($POST[str_replace(" ","_",$values)])){
				$input = $POST[str_replace(" ","_",$values)];
				foreach ($input as $key => $value) {
					$Queue[str_replace(" ","_",$values)][str_replace(" ","_",$key)] = $value;
					}
			}
		}
		return $Queue;
}

function perbandinganBerpasanganAntarKritetia($Queue,$wisata){
	echo "<div class='col-12'> <div class='text-center'><b>1. Matrik perbandingan berpasangan antar kriteria</b></div></div>";
	 $Lop=count($Queue);
	for ($i=1; $i<=$Lop; $i++) { 
		$jum=0;
	    for ($j=1; $j<=$Lop;$j++) { 
			if($Queue[str_replace(" ","_",$wisata[$j-1])][str_replace(" ","_",$wisata[$j-1].$i)]==null){
				$Queue[str_replace(" ","_",$wisata[$j-1])][str_replace(" ","_",$wisata[$j-1].$i)]=round($Queue[str_replace(" ","_",$wisata[$i-1])][str_replace(" ","_",$wisata[$i-1].$i)]/$Queue[str_replace(" ","_",$wisata[$i-1])][str_replace(" ","_",$wisata[$i-1].$j)],2);
			}
			$jum+=$Queue[str_replace(" ","_",$wisata[$j-1])][str_replace(" ","_",$wisata[$j-1].$i)];
	   }
	  $Queue['jumlah'][$i]=$jum;
	}
	tableHeader($wisata);
	echo "</tr>";
	echo "</tr>";
	   for ($i=1; $i<=$Lop;$i++) { 
	   	   echo "<tr>";
	   	   		echo "<th>".$wisata[$i-1]."</th>";
	   	    for ($j=1; $j<=$Lop; $j++) { 
	   	         echo "<td>".$Queue[str_replace(" ","_",$wisata[$i-1])][str_replace(" ","_",$wisata[$i-1].$j)]."</td>";
	   	    }
	   	   echo "</tr>";
	   }
	   echo "<tr>";
	   echo "<th>Jumlah</th>";
	for ($i=1; $i<=$Lop ; $i++) { 
		echo "<td>".$Queue['jumlah'][$i]."</td>";
	}
	echo "</tr>";
	echo "</table></div></div>";
return $Queue;
}
function menghitungNilaiPrioritas($perbandinganBerpasanganQueu,$wisata)
{
  echo"<br><br><div class='col-12'> <div class='text-center'><b>2. Matrik hitung nilai prioritas</b></div></div><br><br>";
  $Lop = count($perbandinganBerpasanganQueu)-1;
  for ($i=1; $i<=$Lop; $i++) {
  	$temJum=0;
  	  for ($j=1; $j<=$Lop; $j++) { 
  	  	$value = $perbandinganBerpasanganQueu[str_replace(" ","_",$wisata[$j-1])][str_replace(" ","_",$wisata[$j-1]).$i]/$perbandinganBerpasanganQueu['jumlah'][$i];
  	  	$perbandinganBerpasanganQueu[str_replace(" ","_",$wisata[$j-1])][str_replace(" ","_",$wisata[$j-1]).$i]=$value;
  	  }
  	  
  }
  for ($i=1; $i<=$Lop; $i++) {
  	$temJum=0;
  	  for ($j=1; $j<=$Lop; $j++) { 
  	  	$temJum+=$perbandinganBerpasanganQueu[str_replace(" ","_",$wisata[$i-1])][str_replace(" ","_",$wisata[$i-1].$j)];
  	  }
  	  $perbandinganBerpasanganQueu[str_replace(" ","_",$wisata[$i-1])][str_replace(" ","_",$wisata[$i-1].$j)]=$temJum;
  	  $perbandinganBerpasanganQueu[str_replace(" ","_",$wisata[$i-1])][str_replace(" ","_",$wisata[$i-1].($j+1))]=$temJum/$Lop;
  }

  tableHeader($wisata);
  echo "<th>Jumlah</th><th>Prioritas</th>";
  echo "</tr>";
  for ($i=1; $i<=$Lop; $i++) { 
  	echo "<tr>";
  		$indexQueue=str_replace(" ","_",$wisata[$i-1]);
  		echo "<th>".$indexQueue."</th>";
  		$lops=count($perbandinganBerpasanganQueu[$indexQueue]);
  	for ($j=1; $j<=$lops; $j++) { 
  		echo "<td>".$perbandinganBerpasanganQueu[$indexQueue][$indexQueue.$j]."</td>";
  	}
  	echo "</tr>";
  }
  echo "</table></div></div>";
 return $perbandinganBerpasanganQueu; 
} 
function jumlahBaris($QueuePerbandingan, $QueuePrioritas,$wisata){
	echo "<div class='col-12'> <div class='text-center'><b>2.Matrik Menentukan Jumlah Baris</b></div></div>";
	$Lop = count($QueuePerbandingan)-1;
	$totalBobot=0;
	for ($i=1; $i<=$Lop; $i++) {
		$indexQueue=str_replace(" ","_",$wisata[$i-1]);
		$lops = count($QueuePerbandingan[$indexQueue]);
		$indexAfterPrioritas = count($QueuePrioritas[$indexQueue]); 
		$Temjum=0;
		for ($j=1; $j<=$lops; $j++) { 
			$QueuePerbandingan[$indexQueue][$indexQueue.$j] =$QueuePerbandingan[$indexQueue][$indexQueue.$j]*$QueuePrioritas[$indexQueue][$indexQueue.$indexAfterPrioritas];
			$Temjum+=$QueuePerbandingan[$indexQueue][$indexQueue.$j];
		}
		$QueuePerbandingan[$indexQueue][$indexQueue.$j] = $Temjum;
		$QueuePerbandingan[$indexQueue][$indexQueue.($j+1)]=$Temjum*$QueuePrioritas[$indexQueue][$indexQueue.$indexAfterPrioritas];
		$totalBobot+=$QueuePerbandingan[$indexQueue][$indexQueue.($j+1)];
	}
	tableHeader($wisata);
	echo "<th>Jumlah_baris</th><th>Bobot*Prioritas</th>";
	echo "</tr>";
	echo "<tr>";
	for ($i=1; $i<=$Lop; $i++) {
		echo "<th>".$wisata[$i-1]."</th>";
		$indexQueue=str_replace(" ","_",$wisata[$i-1]);
		$lops = count($QueuePerbandingan[$indexQueue]);
		for ($j=1; $j<=$lops; $j++) { 
			echo "<td>".$QueuePerbandingan[$indexQueue][$indexQueue.$j]."</td>";
		}
		echo "</tr>";
	}
	echo "<tr><th colspan='".($j-1)."'>Jumlah</th><th>".$totalBobot."</th></tr>";
	echo "</table></div></div>";
	$QueuePerbandingan['jumlah']=$totalBobot;
    return $QueuePerbandingan;

}
function nilaiCR($jumlahBarisQueue,$prioritasQueue,$kriteria)
{
	$indexRandom = array('1'=>0.00,'2'=>0.00,'3'=>0.58,'4'=>0.90,'5'=>1.12,'6'=>1.24,'7'=>1.32,'8'=>1.41,'9'=>1.45,'10'=>1.49,'11'=>1.51,'12'=>1.48,'13'=>1.56,'14'=>1.57,'15'=>1.59);
	$maks=0;
	$tem=0;
	$count = count($jumlahBarisQueue)-1;
	echo "<div class='col-12'> <div class='text-center'>";
	echo "<b>Nilai CR</b> </div></div>";
	echo "<div class='row'><div class='col-12'><table style='background-color:red' class='striped'>";
	echo "<tr>";
		echo "<th>n (jumlah kriteria) </th><th> ".$count."</th>";
	echo "</tr>";
	for ($i=0; $i<$count ; $i++) { 
		$indexCollum = str_replace(" ","_",$kriteria[$i]);
		$indexTargetPrioritas= count($prioritasQueue[$indexCollum])-1; 
		$indexTargetJumlahBaris = count($jumlahBarisQueue[$indexCollum])-2;
		$tem += round($jumlahBarisQueue[$indexCollum][$indexCollum.$indexTargetJumlahBaris] / $prioritasQueue[$indexCollum][$indexCollum.$indexTargetPrioritas],4);
		
	}
	$maks =($tem -$count)/($count - 1);
	$CI =   $maks/($count-1);
	$CR = 	$CI/$indexRandom[$count];
	echo "<tr><th>maks</th><th>".$maks."</th></tr>";
	echo "<tr><th>CI</th><th>".$CI."</th></tr>";
	echo "<tr><th>Index Rendom</th><th>".$indexRandom[$count]."</th></tr>";
	echo "<tr><th>CR</th><th>".$CR."</th></tr>";
	echo "<tr><th></th><th>Nilai CR <= 0.1 Berati Nilai Tersebut Dapat Di Trima</th></tr>";
	echo "</table></div></div>";
}

function nilaiCRPerKriteria($jumlahBarisQueue,$prioritasQueue,$kriteria)
{
	$indexRandom = array('1'=>0.00,'2'=>0.00,'3'=>0.58,'4'=>0.90,'5'=>1.12,'6'=>1.24,'7'=>1.32,'8'=>1.41,'9'=>1.45,'10'=>1.49,'11'=>1.51,'12'=>1.48,'13'=>1.56,'14'=>1.57,'15'=>1.59);
	$maks=0;
	$tem=0;
	$count = count($jumlahBarisQueue)-1;
	echo "<div class='col-12'> <div class='text-center'>";
	echo "<b>Nilai CR</b> </div></div>";
	echo "<div class='row'><div class='col-12'><table style='background-color:red' class='striped'>";
	echo "<tr>";
		echo "<th>n (jumlah kriteria) </th><th> ".$count."</th>";
	echo "</tr>";
	for ($i=1; $i<=$count; $i++) { 
		$indexCollum = str_replace(" ","_",$kriteria[$i-1]);
		$indexTargetPrioritas= count($prioritasQueue[$indexCollum]); 
		$indexTargetJumlahBaris = count($jumlahBarisQueue[$indexCollum])-1;
	    $tem += round($jumlahBarisQueue[$indexCollum][$indexCollum.$indexTargetJumlahBaris] / $prioritasQueue[$indexCollum][$indexCollum.$indexTargetPrioritas],4);
		
    }
	$maks =($tem -$count)/($count - 1);
	$CI =   $maks/($count-1);
	$CR = 	$CI/$indexRandom[$count];
	echo "<tr><th>maks</th><th>".$maks."</th></tr>";
	echo "<tr><th>CI</th><th>".$CI."</th></tr>";
	echo "<tr><th>Index Rendom</th><th>".$indexRandom[$count]."</th></tr>";
	echo "<tr><th>CR</th><th>".$CR."</th></tr>";
	echo "<tr><th></th><th>Nilai CR <= 0.1 Berati Nilai Tersebut Dapat Di Trima</th></tr>";
	echo "</table></div></div>";
}

function tableHeader($wisata){
	echo "<div><div class='col-12'>";
	echo "<table class='striped'>";
    echo "<tr>";
	echo "<th>Kriteria</th>";
	foreach ($wisata as $key => $value) {
	   echo "<th>".$value."</th>";
	}
}
//end funtion

?>
</div>
