	<?php include "kepala.php"; ?>
	<link rel="stylesheet" href="Asset/css/vertabs-w3c.css">
	<div id="main" style=" margin: 10px 20px 10px 20px;">
    <!-- form input -->
    <form method='POST' action='index.php'>
    <div class="row"><h1 style="text-align:center">INPUT DATA</h1></div>
	
	<div class="row">
		<!-- vertical tabs  -->
		<div class="col-2">
			<div class="tab">
				<span class="tablinks active" onclick="openCity(event, 'BobotKrt')">Bobot Kriteria</span>
				<?php
					$queryKriteria = mysqli_query($koneksi,"SELECT nama_kriteria,kriteria_id FROM kriteria");
					$kriteria = array();
					$kriteri_id = array();
						while ($rs = mysqli_fetch_array($queryKriteria)) {
						array_push($kriteria, $rs['nama_kriteria']);
						array_push($kriteri_id,$rs['kriteria_id']);
					}
					foreach ($kriteria as $key => $value) {
						echo '<span class="tablinks" onclick="openCity(event,\''.str_replace(" ","_",$value).'\')">'.$value.'</span>';
					}
				?>
			</div>
		</div>
		<!-- end vertical tabs  -->
		<!-- tab content  -->
		<div class="col-10">
			<div id="BobotKrt" class="tabcontent">
				<h3>Bobot Kriteria</h3>
				<table class="bordered">
					<thead>
						<tr>
							<th>Kriteria</th>
							<?php
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
							?>
						</tr>
					</thead>
					<tbody>
						<?php
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
						?>
					</tbody>
				</table>
			</div>

			<?php
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
					echo "<div class='tabcontent' style='display: none' id='".str_replace(" ","_",$key)."'>";
					echo "<h3>".($no).". Kriteria ".$key."</h4>";
					echo "<table  class='bordered'>";
					echo "<thead>";
					echo "<tr>";
					echo "<th>Wisata</th>";
					foreach ($wisata as $field) {
						echo "<th>".$field."</th>";		
					}
					echo "</tr></thead><tbody>";

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
					echo "</tbody></table>";
					if($lops == $count){

						// echo "</tbody></table></div>";
						 echo "<div class='col-12' style='text-align:right'><button type='submit' name='submit' value='perhitunganProses' class='button upper' id='kirim' style='margin-bottom:5px' >Hitung</div></div>";
					}
						echo "</div>";
					
				}

				$_SESSION['Queue']= $arrayQuue;
				$_SESSION['kriteria']= $kriteria;
				$_SESSION['id_kriteria']=$kriteri_id;
				$_SESSION['wisata']= $wisata;

				function option(){
					for ($i=1; $i<=9; $i++) {
					echo "<option value='".$i."'>".$i."</option>";
					}
				}
			?>
		</div>
		<!-- end tab content  -->
	</div>

    
</form>
<!-- end form input -->
</div>
<script src="Asset/js/vertabs-w3c.js"></script>