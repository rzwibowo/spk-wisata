    <div id="main" style=" margin: 10px 20px 10px 20px;">
    <!-- form input -->
    <form method='POST' action='index.php'>
    <div class="row"><h1 style="text-align:center">INPUT DATA</h1></div>
    <div class="row" style="background-color: #28B8DB">
 			<nav class="tabs" data-component="tabs">
             <ul>
        		<li class="active"><a href="#bobotKriteria">Bobot Kriteria</a></li>
        		<?php
        			$queryKriteria = mysqli_query($koneksi,"SELECT nama_kriteria FROM kriteria");
					$kriteria = array();
					 while ($rs = mysqli_fetch_array($queryKriteria)) {
					 	array_push($kriteria, $rs['nama_kriteria']);
					}
					foreach ($kriteria as $key => $value) {
						echo "<li><a href='#".str_replace(" ","_",$value)."'>".$value."</a></li>";
					}
        		?>
   			 </ul>
			</nav>
	</div>

     <!-- end tabs -->
<?php
echo "<div class='row align-center' id='bobotKriteria' style=' background-color:#6EB8B5'>";
echo "<div class='col col-8'>";
echo "<br><h4 style='text-align:center'>Bobot Kriteria</h4>";
echo "<table  class='bordered'>";
echo "<thed>";
echo "<tr>";
echo "<th>Kriteria</th>";
$dataArray = array();
$position = 1;
$jum = count($kriteria);
foreach ($kriteria as $key => $value) {
	$Temp = array();
	    	for ($i=0; $i <$jum; $i++) { 
	    		if($i+1 == $position){
	    			$Temp[str_replace(" ","_",$value.$i)]=1;
	    		}else{
	    			if($i+1 >= $position){
	    				$Temp[str_replace(" ","_",$value.$i)]="input";
	    			}else{
	    				$Temp[str_replace(" ","_",$value.$i)]=null;
	    		}

	    		}
	    	}
$dataArray[str_replace(" ","_",$value)]=$Temp;
$position++;
}

$_SESSION['All']= $dataArray;
foreach ($kriteria as $key => $value) {
		echo "<th>".$value."</th>";
}
echo "</tr>";

foreach ($dataArray as $key => $value) {
        echo "<tr>";
		echo "<td>".$key."</td>";
        	for ($i=0; $i <count($value) ; $i++) { 
        		if($value[$key.$i]=="input"){
        			echo "<td><select name='inputAll[".$key."][".$key.$i."]'>";
        			option();
        			echo "</select>";
        		}else{
        		echo "<td>".$value[$key.$i]."</td>";
        		}
        	}
        echo "</tr>";
}
echo"</table></div></div>";

$perbandinganTiapKriteria = array(); 
$query = mysqli_query($koneksi,"SELECT nama_wisata FROM wisata");
$wisata = array();

while ($rs = mysqli_fetch_array($query)) {
	array_push($wisata, $rs['nama_wisata']);
}
//var_dump($wisata);
$queryKriteria = mysqli_query($koneksi,"SELECT nama_kriteria FROM kriteria");
 while ($rs = mysqli_fetch_array($queryKriteria)) {   
    $krt=$rs['nama_kriteria'];
    $perbandinganTiapKriteria[$krt]=$wisata;
}
$arrayQuue = array();
$count = count($perbandinganTiapKriteria);
$lops = 0;
$no =1;
foreach ($perbandinganTiapKriteria as $key => $value) {
	echo "<div class='row align-center' style=' background-color:#6EB8B5' id='".str_replace(" ","_",$key)."'>";
	echo "<div class='col col-8'>";
	echo "<br><h4 style='text-align:center'>".($no).". Kriteria ".$key."</h4>";
	echo "<table  class='bordered'>";
	echo "<thed>";
	echo "<tr>";
	echo "<th>Kriteria</th>";
	foreach ($wisata as $field) {
		echo "<th>".$field."</th>";		
	}
	echo "</tr></thed>";

	$jum = count($perbandinganTiapKriteria[$key]);
	$position = 1;
	$index = 0;
	$dataArray = array();


	    foreach ($perbandinganTiapKriteria[$key] as $keys => $value) {
		$Temp = array();
		
	    echo "<tr>";
		echo "<td>".$wisata[$index]."</td>";
		    	for ($i=1; $i <= $jum; $i++) { 
		    		if($i == $position){
		    			$Temp[str_replace(" ", "_", $wisata[$index]).$i]=1;
		    			echo "<td>".$Temp[str_replace(" ", "_", $wisata[$index]).$i]."</td>";
		    		}else{
		    			if($i >= $position){
		    				$Temp[str_replace(" ", "_", $wisata[$index]).$i]="input";
		    				echo "<td><select  name='".$key."[".str_replace(" ", "_", $wisata[$index])."][".str_replace(" ", "_", $wisata[$index]).$i."]'>";
		    				option();
		    				echo "</select></td>";
		    			}else{
		    				$Temp[str_replace(" ", "_", $wisata[$index]).$i]=null;
		    				echo "<td>".$Temp[str_replace(" ", "_", $wisata[$index]).$i]."</td>";
		    		}

		    		}
				}
	            $dataArray[str_replace(" ", "_", $wisata[$index])]=$Temp;
	$position++;
	$index++;
	echo "</tr>";
}
	$no++;
     $arrayQuue[str_replace(" ", "_", $key)]= $dataArray;
     $lops ++;
     if($lops == $count){
	echo "</table></div>";
		echo "<div class='col col-8' style='text-align:right'><button type='submit' name='submit' value='perhitunganProses' class='button upper' id='kirim' style='margin-bottom:5px' >Hitung</div></div>";
	}else
	{
		echo "</table></div></div>";
	}
}

 $_SESSION['Queue']= $arrayQuue;
 $_SESSION['kriteria']= $kriteria;
$_SESSION['wisata']= $wisata;

function option(){
	echo "<option>-Pilih-</option>";
	for ($i=1; $i<=9; $i++) {
	   echo "<option value='".$i."'>".$i."</option>";
	}
}
?>
</form>
<!-- end form input -->
</div>