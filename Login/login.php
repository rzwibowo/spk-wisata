
	<div class="row align-center">
		<div class="col-4">
			<div class="text-center">
				<h1>Masuk sebagai Administrator</h1>
			</div>
			<form class="form" action="index.php" method="POST" name="form-login">
				<fieldset>
					<div class="form-item">
						<label for="username">Nama Pengguna</label>
						<input type="text" name="username" id="username">
						<div id="error_username" style="margin-top: 5px;"></div>
					</div>
					<div class="form-item">
						<label for="password">Kata Kunci</label>
						<input type="password" name="password" id="password">
						<div id="error_password" style="margin-top: 5px;"></div>
					</div>
					 <div class="form-item">
                            <label for="level">Level User</label>
                            <select name="level" class="w50" id="level">
                                <option value="0">Admin</option>
                                <option value="1">Pemimpin</option>
                            </select>
                            <div id="error_level" style="margin-top: 5px;"></div>
                        </div>
					<div class="row align-center">
						<button type="submit" name="submit" value="LOGIN_PROSES" class="button big" id="login">Masuk</button>
					</div>
				</fieldset>
			</form> 
		</div>
	</div>
	<div>

</div>
	<!-- Kube JS + jQuery are used for some functionality, but are not required for the basic setup -->
   
    <script type="text/javascript">
    	$("#login").click(function(){
			$('form[name=form-login]').submit(function(){
		        var username       =$("#username").val();
		        var password       =$("#password").val();
		        var level          =$("#level").val() ;
			       

		       if(username.length==0){
		           $("#username").focus();
		           $("#error_username").addClass("message error");
		           $("#error_username").html("<span>Username belum di isi</span>");
		           return false;
		        }
		       
		        else if(password.length==0)
		        {
		            $("#password").focus();
		            $("#error_password").addClass("message error");
		            $("#error_password").html("<span>Password belum di isi</span>");
		            return false;
		        } 
		        else if(level.length==0)
		        {
		            $("#level").focus();
		            $("#error_level").addClass("message error");
		            $("#error_level").html("<span>level belum di isi</span>");
		            return false;
		        }
		        else
		        {
		            return true;
		        }
		    });
		});
		$("button").click(function(){
		 	$('#my-modal').on('open.modal', function()
				{
				   
				});
		});
    </script>
