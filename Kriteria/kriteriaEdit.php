<?php 


$id= $_GET['r'];
 

$sql = "select * from kriteria where kriteria_id=$id";
$hasil = mysqli_query ($koneksi,$sql) or die ("Gagal Akses");

$row = mysqli_fetch_assoc($hasil);
?>

    <div id="main">
        <div class="row align-center">
            <div class="col-6">
                <div class="head text-center">
                    <h1>Data Kriteria</h1>
                    
                </div>
                <form class="form" action="index.php" method="POST" name="form-kirim" enctype="multipart/form-data">
                    <fieldset>
                        <input type="hidden" name="kriteria_id" class="w50" id="kriteria_id" value="<?php echo $row['kriteria_id']?>">
                        <div class="form-item">
                            <label for="nama_kriteria">Nama Kriteria</label>
                            <input type="text" name="nama_kriteria" class="w50" id="nama_kriteria" value="<?php echo $row['nama_kriteria']?>">
                              <div id="message-nama_kriteria" style="margin-top: 5px;"></div>
                        </div>
                        <div class="form-item">
                            <label for="prioritas_kriteria">Prioritas</label>
                            <input type="number" name="prioritas_kriteria" class="w50" id="prioritas_kriteria" value="<?php echo $row['prioritas_kriteria']?>" step="0.01" min="0">
                            <div id="message-prioritas_kriteria" style="margin-top: 5px;"></div>
                        </div>
                        <div class="row between">
                            <button type="reset" class="button secondary outline w15">Reset</button>
                            <button type="submit" name="submit" value="kriteriaUpdate" class="button upper" id="kirim">Simpan</button>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>

    <!-- Kube JS + jQuery are used for some functionality, but are not required for the basic setup -->
    
    <script type="text/javascript">
        var nama_kriteria;
        var prioritas_kriteria;
    /*
     validasi nama propinsi , tidak bleh kosong
    */
        $("#nama_kriteria").blur(function(){
            nama_kriteria= $(this).val();
            if(nama_kriteria.length==0)
            {
              $("#message-nama_kriteria").show();
              $("#message-nama_kriteria").addClass("message error");
              $("#message-nama_kriteria").html("<span>Nama propinsi tidak boleh kosong!</span>");
            }else
            {
                $("#message-nama_kriteria").hide();
            } 
        });

    /*
     validasi nama prioritas_kriteria , tidak bleh kosong
    */
        $("#prioritas_kriteria").blur(function(){
            prioritas_kriteria= $(this).val();
            
            if(prioritas_kriteria.length==0)
            {
              $("#message-prioritas_kriteria").show();
              $("#message-prioritas_kriteria").addClass("message error");
              $("#message-prioritas_kriteria").html("<span>Nama ib ukota tidak boleh kosong!</span>");
            }else
            {
              $("#message-prioritas_kriteria").hide();
            } 
        });
      
    /*
    validasi kirim
    */
    $("#kirim").click(function(){
    $('form[name=form-kirim]').submit(function(){
        nama_kriteria       =$("#nama_kriteria").val();
        prioritas_kriteria         =$("#prioritas_kriteria").val();

           if(nama_kriteria.length==0){
               $("#nama_kriteria").focus();
               $("#message-nama_kriteria").addClass("message error");
               $("#message-nama_kriteria").html("<span>nama propinsi tidak boleh kosong!</span>");
               return false;
            }
            else if(prioritas_kriteria.length==0)
            {
                $("#prioritas_kriteria").focus();
                $("#message-prioritas_kriteria").addClass("message error");
                $("#message-prioritas_kriteria").html("<span>nama ibu kota tidak boleh kosong!</span>");
                return false;
            }

            else
            {
                return true;
            }
        
        });
    });

    </script>
