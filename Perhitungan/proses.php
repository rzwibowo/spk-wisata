     <?php include "kepala.php"; ?>
  
   <div id="main"  style=" margin: 10px 20px 10px 20px;background-color:#6EB8B5">
    	<div class="row" style="background-color: #28B8DB">
    		<nav class="tabs" data-component="tabs">
             <ul>
        		<li class="active"><a href="#bobotKriteria">Bobot Kriteria</a></li>
        		<?php
        		 $kriteria=$_SESSION['kriteria'];
        		 $id_kriteria = $_SESSION['id_kriteria'];
				 foreach ($kriteria as $key => $value) {
						echo "<li><a href='#".str_replace(" ","_",$value)."'>".$value."</a></li>";
					}
        		?>
        		<li><a href="#nilaiAkhir">Nilai Akhir</a></li>
   			 </ul>
			</nav>
	    </div>
	    <div class="col col-10" style="text-align: right;">
	    <br>
	    <a href="index.php?page=perhitunganInput" class="button upper">Kembali</a>
        </div>
<?php
$input = $_POST['inputAll'];
$perbandinganQueue = $_SESSION['All'];
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
echo "<div class='row align-center' id='bobotKriteria' style=' background-color:#6EB8B5'> ";
echo "<div class='class='col col-8'><br>";
echo "<h1 style='text-align:center'> Bobot Kriteria</h1>";
echo "<h4>1. Tabel matrik nilai perbandingan berpasangan antar kriteria</h4>";
echo "<table class='bordered'>";
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
echo "</table>";
//matrik menghitung nilai prioritas;

$lop = count($perbandinganQueue)-1;
$QueuePrioritas = $perbandinganQueue;
for ($i=0; $i<$lop; $i++) { 
 	for ($j=0; $j<$lop ; $j++) {
 	     $QueuePrioritas[str_replace(" ","_",$kriteria[$j])][str_replace(" ","_",$kriteria[$j]).$i]=round($perbandinganQueue[str_replace(" ","_",$kriteria[$j])][str_replace(" ","_",$kriteria[$j]).$i]/$perbandinganQueue['jumlah'][$i],2);
 	}
 }
//Set Collum Jumlah dan prioritas
$lop= count($QueuePrioritas)-1;
for ($i=0; $i<$lop; $i++) { 
	$temJum = 0;
	for ($j=0; $j<$lop; $j++) { 
	    $temJum += $QueuePrioritas[str_replace(" ","_",$kriteria[$i])][str_replace(" ","_",$kriteria[$i]).$j]; 
	}
	$QueuePrioritas[str_replace(" ","_",$kriteria[$i])][str_replace(" ","_",$kriteria[$i]).$j]=round($temJum,2);
	$QueuePrioritas[str_replace(" ","_",$kriteria[$i])][str_replace(" ","_",$kriteria[$i]).($j+1)]=round($temJum/$lop,2);
	UpdateNilaiPrioritas($koneksi,"kriteria",$id_kriteria[$i],$QueuePrioritas[str_replace(" ","_",$kriteria[$i])][str_replace(" ","_",$kriteria[$i]).($j+1)],"prioritas_kriteria","kriteria_id");
}

echo "<br><br> <h4>2. Tabel matrik untuk menghitung nilai prioritas</h4>";
echo "<table class='bordered'>";
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
echo "</table>";

//matrik untuk menentukan jumlah baris
$QueueJumlahBaris = $perbandinganQueue;
$lop = count($perbandinganQueue)-1;
for ($i=0; $i<$lop; $i++) {
	for ($j=0; $j<$lop; $j++) {
		 $indexCollum = str_replace(" ","_",$kriteria[$j]);
		 $columTarget = count($QueuePrioritas[$indexCollum])-1;
		 $QueueJumlahBaris[$indexCollum][$indexCollum.$i] = round($perbandinganQueue[$indexCollum][$indexCollum.$i] * $QueuePrioritas[$indexCollum][$indexCollum.$columTarget],2);
	}
}
//hitung jumlah_baris 
$lop= count($QueueJumlahBaris)-1;
$TotalBobot =0;
for ($i=0; $i<$lop; $i++) { 
	$temJumBaris = 0;
	$indexCollum = str_replace(" ","_",$kriteria[$i]);
	$columTarget = count($QueuePrioritas[$indexCollum])-1;
	$lops= count($QueueJumlahBaris[$indexCollum]);
	for ($j=0; $j<$lops; $j++) { 
		$temJumBaris+=$QueueJumlahBaris[$indexCollum][$indexCollum.$j];
	}
	$QueueJumlahBaris[$indexCollum][$indexCollum.$j]= $temJumBaris;
	$QueueJumlahBaris[$indexCollum][$indexCollum.($j+1)]=round($temJumBaris*$QueuePrioritas[$indexCollum][$indexCollum.$columTarget],2);
    $TotalBobot+=round($QueueJumlahBaris[$indexCollum][$indexCollum.($j+1)],2);
}
   $QueueJumlahBaris['jumlah'] = $TotalBobot;
echo "<br><br><h4>3. Tabel matrik untuk menentukan jumlah baris</h4>";
echo "<table class='bordered'>";
    echo "<tr>";
	echo "<th>Kriteria</th>";
foreach ($kriteria as $key => $value) {
    echo "<th>".$value."</th>";    
}
echo "<th>jumlah_baris</th><th>jum * bobot</th>";
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
echo "</table>";
nilaiCR($QueueJumlahBaris,$QueuePrioritas,$kriteria);

echo "</div></div>";

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
	echo "<div class='row align-center' style=' background-color:#6EB8B5' id='".str_replace(" ","_",$key)."'>";
	echo"<div style='text-align:center'><h1>Kriteria ".str_replace("_"," ",$key)."</h1></div>";
	echo "<div class='col col-10 row align-center' >";
	$perbandinganBerpasanganQueu[$key]= perbandinganBerpasanganAntarKritetia($Queue[$key],$wisata);
	echo "</div>";
	echo "<div class='col col-10 row align-center' >";
	$prioritasQueue[$key]=menghitungNilaiPrioritas($perbandinganBerpasanganQueu[$key],$wisata);
	echo "</div>";
	echo "<div class='col col-10 row align-center' >";
	$jumlahBarisQueue[$key]=jumlahBaris($perbandinganBerpasanganQueu[$key],$prioritasQueue[$key],$wisata);
	echo "</div>";
	echo "<div class='col col-10 row align-center'>";
    nilaiCRPerKriteria($jumlahBarisQueue[$key],$prioritasQueue[$key],$wisata);
    echo "</div>";
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
	echo "<b>1. Tabel matrik nilai perbandingan berpasangan antar kriteria</b>";
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
	echo "</table>";
return $Queue;
}
//hitung nilai prioritas
function menghitungNilaiPrioritas($perbandinganBerpasanganQueu,$wisata)
{
  echo"<b>2. Tabel matrik untuk menghitung nilai prioritas</b>";
  $Lop = count($perbandinganBerpasanganQueu)-1;
  for ($i=1; $i<=$Lop; $i++) {
  	$temJum=0;
  	  for ($j=1; $j<=$Lop; $j++) { 
  	  	$value = $perbandinganBerpasanganQueu[str_replace(" ","_",$wisata[$j-1])][str_replace(" ","_",$wisata[$j-1]).$i]/$perbandinganBerpasanganQueu['jumlah'][$i];
  	  	$perbandinganBerpasanganQueu[str_replace(" ","_",$wisata[$j-1])][str_replace(" ","_",$wisata[$j-1]).$i]=round($value,2);
  	  }
  	  
  }
  for ($i=1; $i<=$Lop; $i++) {
  	$temJum=0;
  	  for ($j=1; $j<=$Lop; $j++) { 
  	  	$temJum+=$perbandinganBerpasanganQueu[str_replace(" ","_",$wisata[$i-1])][str_replace(" ","_",$wisata[$i-1].$j)];
  	  }
  	  $perbandinganBerpasanganQueu[str_replace(" ","_",$wisata[$i-1])][str_replace(" ","_",$wisata[$i-1].$j)]=round($temJum,2);
  	  $perbandinganBerpasanganQueu[str_replace(" ","_",$wisata[$i-1])][str_replace(" ","_",$wisata[$i-1].($j+1))]=round(round($temJum,2)/$Lop,2);
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
  echo "</table>";
 return $perbandinganBerpasanganQueu; 
}
//end Nilai Prioritas 
function jumlahBaris($QueuePerbandingan, $QueuePrioritas,$wisata){
	echo "<b>3.Tabel matrik untuk menentukan jumlah baris</b>";
	$Lop = count($QueuePerbandingan)-1;
	$totalBobot=0;
	for ($i=1; $i<=$Lop; $i++) {
		$lops = count($QueuePerbandingan[str_replace(" ","_",$wisata[$i-1])]);
		$indexAfterPrioritas = count($QueuePrioritas[str_replace(" ","_",$wisata[$i-1])]); 
		for ($j=1; $j<=$lops; $j++) { 
			$indexQueue=str_replace(" ","_",$wisata[$j-1]);
			$indexPrioritas = str_replace(" ","_",$wisata[$j-1]);
		    $QueuePerbandingan[$indexQueue][$indexQueue.$i]  = round($QueuePerbandingan[$indexQueue][$indexQueue.$i] * $QueuePrioritas[$indexPrioritas][$indexPrioritas.$indexAfterPrioritas],2);
		}
	}
//set kolum jumlah_baris
	for ($i=1; $i<=$Lop; $i++) {
	$indexQueue=str_replace(" ","_",$wisata[$i-1]);
	$lops = count($QueuePerbandingan[$indexQueue]);
	$indexAfterPrioritas = count($QueuePrioritas[$indexQueue]); 
	$Temjum=0;
		for ($j=1; $j<=$lops; $j++) { 
		      $Temjum += $QueuePerbandingan[$indexQueue][$indexQueue.$j];
		}
		$QueuePerbandingan[$indexQueue][$indexQueue.$j] = round($Temjum,2);
		$QueuePerbandingan[$indexQueue][$indexQueue.($j+1)]=round($Temjum*$QueuePrioritas[$indexQueue][$indexQueue.$indexAfterPrioritas],2);
		$totalBobot+=$QueuePerbandingan[$indexQueue][$indexQueue.($j+1)];
	}
	$QueuePerbandingan['jumlah'] = round($totalBobot,2);
//end set kolum jumlah_baris
	 tableHeader($wisata);
	 echo "<th>Jumlah_baris</th><th>jum * bobot</th>";
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
	echo "<tr><td colspan='".$lops."' align='center'><b>Jumlah</b></td><td><b>".$QueuePerbandingan['jumlah']."</b></td></tr>";
	echo "</table>";
    return $QueuePerbandingan;

}

//Nilai Akhir  	
echo "<div class='row align-center'  style=' background-color:#6EB8B5'  id='nilaiAkhir' >";
 echo "<div class='col col-8' style='text-align:center'>";
    	    		echo "<h1>Hasil Akhir</h1>";
    				echo "<br>";
	echo "<div class='col-12'>";
	echo "<table class='bordered'>";
    echo "<tr>";
	echo "<th> </th>";
	foreach ($kriteria as $key => $value) {
	   echo "<th>".$value."</th>";
	}
	echo "<th>Bobot Prioritas Global</th></tr>";
	$lop =count($QueuePrioritas)-1;
	echo "<tr>";
	echo "<td></td>";
	for ($i=0; $i < $lop; $i++) { 
			$indexQueuePrioritas =count($QueuePrioritas[str_replace(" ","_",$kriteria[$i])])-1; 
			echo "<td>".$QueuePrioritas[str_replace(" ","_",$kriteria[$i])][str_replace(" ","_",$kriteria[$i]).$indexQueuePrioritas]."</td>";
	}
	echo "<td></td></tr>";
	$wisataTertingi = "";
    $nilaiTertinggi = 0;
    $indexwisata =0;
    $nilaiPrioritas = 0;
    $hasilKali =0;
	foreach ($wisata as $key => $value) {
		$date = date("d F Y ");
		$query="INSERT INTO alternatif(alternatif) VALUES('".$value."')"; 
	    $query=mysqli_query($koneksi,$query);
	    	if($query){
		   $sql ="SELECT * FROM alternatif ORDER BY id_alternatif  DESC LIMIT 1";
		   $result = mysqli_query($koneksi,$sql);
		   $dataId = mysqli_fetch_assoc($result);
		   $idalternatif = $dataId['id_alternatif'];
		   }
			$tem = 0;
		echo "<tr><td>".$value."</td>";
			for ($i=0; $i < $lop; $i++) { 
				$index = count($prioritasQueue[str_replace(" ","_",$kriteria[$i])][str_replace(" ","_",$value)]);
				   $hasilKali = $prioritasQueue[str_replace(" ","_",$kriteria[$i])][str_replace(" ","_",$value)][str_replace(" ","_",$value.$index)] * $QueuePrioritas[str_replace(" ","_",$kriteria[$i])][str_replace(" ","_",$kriteria[$i]).$indexQueuePrioritas];
				    $tem += $hasilKali;
					$nilaiPrioritas =$prioritasQueue[str_replace(" ","_",$kriteria[$i])][str_replace(" ","_",$value)][str_replace(" ","_",$value).$index];
				    
				    $queryInsertSubkriteria="INSERT INTO subkriteria(kriteria_id,id_alternatif,prioritas_subkriteria,perkalian) VALUES(".$id_kriteria[$i].",".$idalternatif.",".$nilaiPrioritas.",".$hasilKali.")"; 
	    			mysqli_query($koneksi,$queryInsertSubkriteria);

		     echo "<td>".$nilaiPrioritas."</td>";
		     if($nilaiTertinggi == 0 && $wisataTertingi ==" ")
		     {
		     	$nilaiTertinggi = round($tem,2);
		     	$wisataTertingi = $value;
		     }else
		     {
		     	if($tem > $nilaiTertinggi)
		     	{
		     		$nilaiTertinggi = round($tem,2);
		     		$wisataTertingi = $value;
		     	}
		     }
			}
		echo "<td style='text-align:right'>".round($tem,2)."</td></tr>";
		$indexwisata++;

	    $queryUpdate="UPDATE alternatif set prioritas_global='round($tem,2)' WHERE id_alternatif=$idalternatif"; 
        mysqli_query($koneksi,$queryUpdate)or die(mysqli_error($koneksi));
		
	}
		echo "</table></div></div> <br>";
		echo "Kesimpulan : Yang memiliki nilai tertinggi adalah ".$wisataTertingi." dengan nilai ".$nilaiTertinggi;
	echo "<br><br></div>";
	
//end Nilai Akhir


//function

	function nilaiCR($jumlahBarisQueue,$prioritasQueue,$kriteria)
{
    $jumKriteria = count($kriteria);
    $nilaiIndexRandom = GetNilaiRandom(round($jumlahBarisQueue['jumlah']));
	echo "<div class='col-12'> <div class='text-center'>";
	echo "<br><br><h4>Nilai CR</h4> </div></div>";
	echo "<div class='row'><div class='col-12'><table style='background-color:#DB1C58' class='bordered'>";
	echo "<tr>";
		echo "<th>n (jumlah kriteria) </th><th> ".$jumKriteria."</th>";
	echo "</tr>";
	$nilaimax = round($jumlahBarisQueue['jumlah']/$jumKriteria,4);
	//echo $nilaimax;
	$CI = round(($nilaimax -$jumKriteria)/($jumKriteria - 1),2);
	$CR = 	round($CI/$nilaiIndexRandom,2);
	echo "<tr><th>maks</th><th>".$nilaimax."</th></tr>";
	echo "<tr><th>CI</th><th>".$CI."</th></tr>";
	echo "<tr><th>Index Rendom</th><th>".$nilaiIndexRandom."</th></tr>";
	echo "<tr><th>CR</th><th>".$CR."</th></tr>";
	echo "<tr><th></th><th>Nilai CR <= 0.1 Berati Nilai Tersebut Dapat Di Trima</th></tr>";
	echo "</table></div></div>";
}

function nilaiCRPerKriteria($jumlahBarisQueue,$prioritasQueue,$wisata)
{
	$maks=0;
	$count = count($wisata);
	$nilaiIndexRandom = GetNilaiRandom(round($jumlahBarisQueue['jumlah'])); 
	echo "<b>Nilai CR</b>";
	echo "<table class='bordered' style='background-color:#DB1C58'>";
	echo "<tr>";
		echo "<th>n (jumlah kriteria) </th><th> ".$count."</th>";
	echo "</tr>";
  	$maks = round($jumlahBarisQueue['jumlah']/$count,2);
    $CI =round(($maks-$count)/($count - 1),2);
	$CR = 	round($CI/$nilaiIndexRandom,2);
	echo "<tr><th>maks</th><th>".$maks."</th></tr>";
	echo "<tr><th>CI</th><th>".$CI."</th></tr>";
	echo "<tr><th>Index Rendom</th><th>".$nilaiIndexRandom."</th></tr>";
	echo "<tr><th>CR</th><th>".$CR."</th></tr>";
	echo "<tr><th></th><th>Nilai CR <= 0.1 Berati Nilai Tersebut Dapat Di Trima</th></tr>";
	echo "</table>";
}

function tableHeader($wisata){ 
	echo "<table class='bordered'>";
    echo "<tr>";
	echo "<th>Kriteria</th>";
	foreach ($wisata as $key => $value) {
	   echo "<th>".$value."</th>";
	}
}

function GetNilaiRandom($nilai){
	$indexRandom = array('1'=>0.00,'2'=>0.00,'3'=>0.58,'4'=>0.90,'5'=>1.12,'6'=>1.24,'7'=>1.32,'8'=>1.41,'9'=>1.45,'10'=>1.49,'11'=>1.51,'12'=>1.48,'13'=>1.56,'14'=>1.57,'15'=>1.59);
	return $indexRandom[$nilai];
}

function UpdateNilaiPrioritas($koneksi,$table,$kode,$nilai,$fieldnilai,$fieldKode)
{
	$queryUpdate="UPDATE ".$table." set ".$fieldnilai."='".$nilai."' WHERE ".$fieldKode."=".$kode.""; 
$query=mysqli_query($koneksi,$queryUpdate)or die(mysqli_error($koneksi));

// if(!$query)
// {
// 	echo "Berhasil";
// }
}
//end funtion
?>
</div>
