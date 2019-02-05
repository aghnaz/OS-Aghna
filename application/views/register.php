<!DOCTYPE html>
<html lang="en">
<head>
	<title>HAUSA - Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?=base_url();?>assets/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css2/util.css">
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/css2/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="<?=base_url();?>assets/img/hausa.png" alt="IMG" style="margin-top:40%;">
					<!-- <img src="<?=base_url();?>assets/images/img-01.png" alt="IMG"> -->
				</div>

				<form class="login100-form validate-form" action="<?=base_url('index.php/user/simpan')?>" method="post">
					<span class="login100-form-title">
						Sign In
					</span>

          <div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="input100" type="text" name="nama_user" placeholder="Nama Lengkap" autofocus>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-id-card" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
          <div class="wrap-input100 validate-input" data-validate = "Password is required" style="margin-left:5%; font-size:15px;">
            <input type="radio" value="user" name="level"> Saya Mensetujui persyaratan sebagai User
						<span class="focus-input100"></span>
						<!-- <span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span> -->
					</div>

					<div class="container-login100-form-btn">
						<!-- <button class="login100-form-btn" name="login" >
							Login
            </button> -->
            <input name="daftar" class="login100-form-btn" value="Daftar" type="submit">
					</div>

					<!-- <div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="<?=base_url();?>assets/login/#">
							Username / Password?
						</a>
					</div> -->

					<div class="text-center p-t-12" style="margin-top: 5%">
						<a class="txt2" href="<?=base_url('index.php/user')?>">
							Already have an account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
                    <?php
                    if($this->session->flashdata('pesan')!= null){
                    echo"<div class='alert alert-danger' style='width:300px'>".$this->session->flashdata('pesan')."</div>";
                    }?>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="<?=base_url();?>assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url();?>assets/vendor/bootstrap/js/popper.js"></script>
	<script src="<?=base_url();?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url();?>assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=base_url();?>assets/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="<?=base_url();?>assets/js2/main.js"></script>

</body>
</html>