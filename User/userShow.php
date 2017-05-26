
    <div id="main">
    	<div class="row align-center">
    		<div class="col-6">
    			<div class="text-center">
    				<h1>Daftar User</h1>
    				
    			</div>
    			<div>
                    <a href="index.php?page=user_add" class="button">Tambah User</a>                    
                </div>
                <br>
                <div>
                <?php 
                $sql = "select user_id,username from user";
                $hasil = mysqli_query ($koneksi,$sql) or die ("Gagal Akses");
                
                $no=1;

                while ($row = mysqli_fetch_array ($hasil)){
                ?>
                    <p>
                        <?php echo $no.". "; ?> 
                        <?php echo $row['username']?>
                        <a href="index.php?page=UserEdit&r=<?php echo $row['user_id'] ?>" class="button">Edit</a>
                        <a href="index.php?page=UserDelete&r=<?php echo $row['user_id'] ?>" class="button" onclick = "if (! confirm('Yakin akan menghapus data?')) { return false; }" style="background-color: #ff3333" >Hapus</a>
                    </p>
                    <?php $no++; } ?>
                </div>
    			
    		</div>
    	</div>
    </div>
