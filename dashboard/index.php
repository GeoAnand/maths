<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>

	<link rel="stylesheet" type="text/css" href="login/bootstrap.min.css">
    
    <!--Fontawesome CDN-->
	<!--<link rel="stylesheet" type="text/css" href="all.css">-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="login/styles.css">
	<style>

	</style>
</head>
<body>
<div class="page-wraper">
		<div id="loading-icon-bx"></div>
		<div class="account-form">
			<div class="account-head" style="background-image:url(login/maths_loginbg.png);">
				<a href="#"><img src="login/maths.png" alt=""></a>
			</div>
			<div class="account-form-inner">
				<div class="account-container">
					<div class="heading-bx left">
						<h2 class="title-head">Login</span></h2>
						<!-- <p>Don't have an account? <a href="register.html">Create one here</a></p> -->
					</div>	
					<form class="contact-bx" id="from1" name="from1" enctype="multipart/form-data" action="connection-db.php" method="post"  style="">
						<div class="row placeani">
							<div class="col-lg-12">
								<div class="form-group">
									<div class="input-group">
										<label>UserName</label>
										<input name="username" type="text" required="" class="form-control">
									</div>
								</div>
							</div>
							<div class="col-lg-12">
								<div class="form-group">
									<div class="input-group"> 
										<label>Your Password</label>
										<input name="password" type="password" class="form-control" required="">
									</div>
								</div>
							</div>							
							<div class="col-lg-12 m-b30">
								<button name="submit" type="submit" value="Login" id="submit" class="btn button-md">Login</button>
							</div>
							<div class="col-lg-12">
								<div class="form-group form-forget">
									<!-- <div class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input" id="customControlAutosizing">
										<label class="custom-control-label" for="customControlAutosizing">Remember me</label>
									</div> -->
									<a href="<?php echo $home_path1; ?>/forgot.php" class="ml-auto">Forgot Password?</a>
								</div>
							</div>
							<!-- <div class="col-lg-12">
								<h6>Login with Social media</h6>
								<div class="d-flex">
									<a class="btn flex-fill m-r5 facebook" href="#"><i class="fa fa-facebook"></i>Facebook</a>
									<a class="btn flex-fill m-l5 google-plus" href="#"><i class="fa fa-google-plus"></i>Google Plus</a>
								</div>
							</div> -->
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script src="login/js/jquery.min.js"></script>
	<script src="login/js/functions.js"></script>
<!-- <div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Sign In </h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>
			<div class="card-body">
				<form id="from1" name="from1" enctype="multipart/form-data" action="connection-db.php" method="post" class="" style="">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" name="username"  placeholder="username">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control"  name="password"  placeholder="password">
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox">Remember Me
					</div>
					<div class="form-group">
						<input type="submit" value="Login" name="submit" id="submit" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?<a href="#">Sign Up</a>
				</div>
				<div class="d-flex justify-content-center">
					<a href="<?php echo $home_path1; ?>/forgot.php">Forgot your password?</a>
				</div>
			</div>
		</div>
	</div>
</div> -->
</body>
</html>