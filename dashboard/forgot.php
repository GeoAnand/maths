<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
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
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card"  style="background-color:#fff !important;">
			<div class="card-header">
				<h3 style="color:#000;">Forgot Password</h3>
				<!--<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>-->
			</div>
			<div class="card-body">
				<form id="from1" name="from1" enctype="multipart/form-data" action="forgotpass.php" method="post" class="" style="">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" name="username"  placeholder="Enter email. " required >
						
					</div>
					
					<!--<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control"  name="password"  placeholder="password">
					</div>-->
					
					<!--<div class="row align-items-center remember">
						<input type="checkbox">Remember Me
					</div>-->
					
					<div class="input-group form-group">
						<div class="input-group-prepend">&nbsp;
					</div>
					</div>
						    
					<div class="form-group">
						<input type="submit" value="Submit" name="submit" id="submit" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<!--<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?<a href="#">Sign Up</a>
				</div>
				<div class="d-flex justify-content-center">
					<a href="#">Forgot your password?</a>
				</div>
			</div>-->
		</div>
	</div>
</div>
</body>
</html>