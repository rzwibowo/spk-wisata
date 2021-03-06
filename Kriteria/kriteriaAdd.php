    <?php include "kepala.php"; ?>

    <div id="main">
    	<div class="row align-center">
    		<div class="col-6">
    			<div class="head text-center">
    				<h1>Data Kriteria</h1>
    				<p>Masukkan data kriteria</p>
    			</div>
    			<form class="form" action="index.php" method="POST" name="form-kirim" enctype="multipart/form-data">
    				<fieldset>
    					<div class="form-item">
    						<label for="nama_kriteria">Nama Kriteria</label>
    						<input type="text" name="nama_kriteria" class="w50" id="nama_kriteria">
                            <div id="message-nama_kriteria" style="margin-top: 5px;"></div>
    					</div>
                        <div class="form-item">
                            <label for="nama_kriteria">Pilihan</label>
                            <input type="radio" name="multiselect" value="1"> Check Box
                            <input type="radio" name="multiselect" value="0"> Radio
                            <div id="message-nama_kriteria" style="margin-top: 5px;"></div>
                        </div>

    				</fieldset>
                    <p class="button upper" id="addDetail">+</p>
                        <div id="detailKriteria">
                            
                        </div>
                    <fieldset>
                            <div class="row between">
                            <button type="reset" class="button secondary outline w15">Reset</button>
                            <button type="submit" name="submit" value="KriteriaSave" class="button upper" id="kirim">Simpan</button>
                        </div>
                    </fieldset>
    			</form>
    		</div>
    	</div>
    </div>


    <script type="text/javascript">
        var nama_wisata;
        var alamat;
        var count=0;
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
    //add kriteria
    $("#addDetail").click(function(){
        count++;
       $("#detailKriteria").append("<div>Pilihan Kriteria "+count+" <fieldset>Nama Kriteria<input type='text' name='detail[kriteria"+count+"][]'>Nilai<input type='text' name='detail[kriteria"+count+"][]'></fieldset></div>");
    });
    </script>