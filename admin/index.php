<?php

session_start();
error_reporting(0);
include "../php/db.php";
if(isset($_POST['adminlogin']))
{









$email = $_POST["email"];
$password = md5(md5(md5($_POST["password"])));
$stmt = $conn->prepare("SELECT id,fullname,email FROM admin WHERE email=? and password= ?");
// Bind parameters s - string, b - boolean, i - int, etc
$stmt->bind_param("ss", $email, $password);
// Execute SQL
$stmt->execute();
// Store result
$stmt->store_result();
// Bind the result
$stmt->bind_result($id, $fullname, $email);
if ($stmt->num_rows == 1) {
	// Fetching data
	while ($row = $stmt->fetch()) {
		$extra="dashboard.php";
		$_SESSION['adminemail']= $email;
		$_SESSION['id']=$id;
		$_SESSION['fullname']=$fullname;
		
	echo "<script>window.location.href='".$extra."'</script>";
	
	}
	} else {
	$_SESSION['action1']="<span style='color: red;'> Invalid username or password</span> <br>";
	$extra="index.php";

	echo "<script>window.location.href='".$extra."'</script>";
	}
	// Close the statement
	$stmt->close();
}
	// Close the connection
	mysqli_close($conn);






?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Aurulias Basket</title>
<?php include "link.php";?>
</head>

<body>

	<!-- Main navbar -->
	
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main content -->
		<div class="content-wrapper">

			
			<!-- Content area -->
			<div class="content d-flex justify-content-center align-items-center">

				<!-- Login card -->
				<form class="login-form" method="post" action="index.php">
					<div class="card mb-0">
						<div class="card-body">
							<div class="text-center mb-3">
							<img src="../assets/extension/images/logo.png" style="height: 85px;" alt="">
								<h5 class="mb-0">Login</h5>
								<span class="d-block text-muted"><?php if(isset($_SESSION['action1'])){ echo $_SESSION['action1'];}?>please kindly fill up your  info </span>
							</div>


							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="text" name="email" class="form-control" placeholder="Email">
								<div class="form-control-feedback">
									<i class="icon-envelope text-muted"></i>
								</div>
							</div>


						

							<div class="form-group form-group-feedback form-group-feedback-left">
								<input type="password" name="password" class="form-control" placeholder="Password">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>

							

							<div class="form-group">
								<button type="submit" name="adminlogin" class="btn btn-primary btn-block">Login <i class="icon-circle-right2 ml-2"></i></button>
							</div>

							
							
							
							<div class="form-group">
								<a href="../index.php" class="btn btn-light btn-block">Client Area</a>
							</div>

							
						</div>
					</div>
				</form>
				<!-- /login card -->

			</div>
			<!-- /content area -->
			


			<!-- Footer -->
			    <?php include "../footer.php";?>
            <!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>
</html>
