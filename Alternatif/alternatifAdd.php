    <?php include "kepala.php"; ?>

    <div id="main">
    	<div class="row align-center">
    		<div class="col-6">
    			<div class="head text-center">
    				<h1>Data Alternatif</h1>
    				<p>Masukkan data alternatif</p>
    			</div>
    			<form class="form" action="index.php" method="POST" name="form-kirim" enctype="multipart/form-data">
    				<fieldset>
    					<div class="form-item">
    						<label for="nama_wisata">Nama Wisata</label>
                            <select name="nama_wisata" id="nama_wisata" class="w50">
                            <?php
                                include 'koneksi.php';
                                $sql="select id_wisata, nama_wisata from wisata";
                                $hasil=mysqli_query($koneksi,$sql) or die("Gagal Akses");
                                while ($row=mysqli_fetch_array($hasil)) {
                                    echo "<option value='".$row['id_wisata']."'>".$row['nama_wisata']."</option>";
                                }
                            ?>
                            </select>
    						<!-- <input type="month" name="nama_wisata" class="w50" id="nama_wisata"> -->
                            <div id="message-nama_wisata" style="margin-top: 5px;"></div>
    					</div>
                        <div class="form-item">
                            <label for="periode">Periode</label>
                            <input type="month" name="periode" class="w50" id="periode">
                            <div id="message-periode" style="margin-top: 5px;"></div>
                        </div>
    					
    					<div class="row between">
    						<button type="reset" class="button secondary outline w15">Reset</button>
    						<button type="submit" name="submit" value="AlternatifSave" class="button upper" id="kirim">Simpan</button>
    					</div>

    				</fieldset>
    			</form>
    		</div>
    	</div>
    </div>
    
    <script type="text/javascript">
        var nama_wisata;
        var alamat;
    /*
     validasi nama propinsi , tidak bleh kosong
    */
        $("#nama_wisata").blur(function(){
            nama_wisata= $(this).val();
            if(nama_wisata.length==0)
            {
              $("#message-nama_wisata").show();
              $("#message-nama_wisata").addClass("message error");
              $("#message-nama_wisata").html("<span>Nama user tidak boleh kosong!</span>");
            }else
            {
                $("#message-nama_wisata").hide();
            } 
        });

    /*
     validasi nama alamat , tidak bleh kosong
    */
        $("#alamat").blur(function(){
            alamat= $(this).val();
            
            if(alamat.length==0)
            {
              $("#message-alamat").show();
              $("#message-alamat").addClass("message error");
              $("#message-alamat").html("<span>Nama ib ukota tidak boleh kosong!</span>");
            }else
            {
              $("#message-alamat").hide();
            } 
        });
      

    /*
    validasi kirim
    */
    $("#kirim").click(function(){
    $('form[name=form-kirim]').submit(function(){
        nama_wisata       =$("#nama_wisata").val();
        alamat        =$("#alamat").val();
        
           if(nama_wisata.length==0){
               $("#nama_wisata").focus();
               $("#message-nama_wisata").addClass("message error");
               $("#message-nama_wisata").html("<span>nama propinsi tidak boleh kosong!</span>");
               return false;
            }
            else if(alamat.length==0)
            {
                $("#alamat").focus();
                $("#message-alamat").addClass("message error");
                $("#message-alamat").html("<span>nama ibu kota tidak boleh kosong!</span>");
                return false;
            }
            else
            {
                return true;
            }
        
        });
    });

    </script>
