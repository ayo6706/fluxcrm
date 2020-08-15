<?php
include "php/db.php";



if(isset($_POST["register"])){
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $address = $_POST["address"];		
    $password = md5(md5(md5($_POST["password"])));    
    $phone = $_POST["phone"];
	
	

	$query=mysqli_query($conn,"select email from customers where email='$email'");
	$num=mysqli_fetch_array($query);
	if($num>1)
	{
	$_SESSION['msg']="<span style='color: red;'> Email-id already register with us</span> <br>";
	}
	else
	{
        mysqli_query($conn,"insert into customers (firstname,lastname, email,password,phone,address) values('$firstname','$lastname','$email','$password','$phone','$address')");	
        
        $_SESSION['msg']="Successfully register with us";
        header("location: index.php");
	}


	



}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title> Aurulias Basket</title>

    <?php
    
    include "link.php";
    ?>
	<!-- /theme JS files -->

</head>

<body class="bg-slate-800">

	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Content area -->
			<div class="content d-flex justify-content-center align-items-center">

				<!-- Login card -->
				<form class="login-form" method="post" action="signup.php">
					<div class="card mb-0">
						<div class="card-body">
							<div class="text-center mb-3">
                                <img src="assets/extension/images/logo.png" style="height: 85px;" alt="">
								<h5 class="mb-0">Sign up</h5>
								<span class="d-block text-muted"><?php if(isset($_SESSION['action1'])){ echo $_SESSION['action1'];}?>please kindly fill up your  info </span>
							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="text" name="firstname" class="form-control" placeholder="first name">
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							
							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="text" name="lastname" class="form-control" placeholder="last name">
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>


							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="email" name="email" class="form-control" placeholder="Email">
								<div class="form-control-feedback">
									<i class="icon-envelope text-muted"></i>
								</div>
							</div>


							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="tel" name="phone" class="form-control" placeholder="phone number">
								<div class="form-control-feedback">
									<i class="icon-phone text-muted"></i>
								</div>
							</div>


							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="text" name="address" class="form-control" placeholder="address">
								<div class="form-control-feedback">
									<i class="icon-map text-muted"></i>
								</div>
							</div>

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="password" name="password" class="form-control" placeholder="Password">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>

							

							<div class="form-group">
								<button type="submit" name="register" class="btn btn-primary btn-block">Sign Up <i class="icon-circle-right2 ml-2"></i></button>
							</div>

							
							
							<div class="form-group text-center text-muted content-divider">
								<span class="px-2">have an account?</span>
							</div>

							<div class="form-group">
								<a href="index.php" class="btn btn-light btn-block">Login</a>
							</div>

							<span class="form-text text-center text-muted">By continuing, you're confirming that you've read our <a href="#">Terms &amp; Conditions</a> and <a href="#">Cookie Policy</a></span>
						</div>
					</div>
				</form>
				<!-- /login card -->

			</div>
			<!-- /content area -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>
</html>
