
	<div id="main">
		<div class="row">
			<div class="col col-6 push-middle push-center">
				<fieldset class="text-center">
					<legend>Menu Admin</legend>
					<div class="form-item">
						<a href="index.php?page=kriteria_show" class="button w70 big" role="button">Kelola Data Kriteria</a>
					</div>
					<div class="form-item">
						<a href="index.php?page=alternatif_show" class="button w70 big" role="button">Kelola Data Alternatif</a>
					</div>
					<div class="form-item">
						<a href="index.php?page=wisata_show" class="button w70 big" role="button">Kelola Data Wisata</a>
					</div>
					<div class="form-item">
						<a href="index.php?page=user_show" class="button w70 big" role="button">Kelola Data User</a>
					</div>
					<div class="form-item">
						<a href="index.php?page=perhitunganInput" class="button w70 big" role="button">Perhitungan</a>
					</div>
					<div class="form-item">
						<a href="index.php?page=Laporan" class="button w70 big" role="button">Laporan</a>
					</div>
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
				</fieldset>
			</div>
		</div>

	</div>
	
  
