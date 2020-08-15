<?php
session_start();
if(!isset($_SESSION['adminemail'])){
	header("location: index.php");

}

include "../php/db.php";

if(isset($_POST['changepass']))
{

$oldpassword = md5(md5(md5($_POST["oldpass"])));
$newpassword = md5(md5(md5($_POST["newpass"])));   
 $sql=mysqli_query($conn,"SELECT password FROM  admin where password='".$oldpassword."' && email='".$_SESSION['adminemail']."'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
 $con=mysqli_query($conn,"update  admin set password='".$newpassword."' where email='".$_SESSION['adminemail']."'");
$_SESSION['msg1']="<span style='color: green;'>Password Changed Successfully!</span>";
//header('location:user.php');
}
else
{
$_SESSION['msg1']="<span style='color: red;'>Old Password not match !!</span>";
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

<?php include "link.php"; ?>
</head>

<body>

	<!-- Main navbar -->
	<?php include "mainnav.php";?>
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		<?php include "sidebar.php";?>
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Change Password</span></h4>
						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

					<div class="header-elements d-none">
						<div class="d-flex justify-content-center">
							<a href="#" class="btn btn-link btn-float font-size-sm font-weight-semibold text-default">
								<i class="icon-bars-alt text-pink-300"></i>
								<span>Statistics</span>
							</a>
							<a href="#" class="btn btn-link btn-float font-size-sm font-weight-semibold text-default">
								<i class="icon-calculator text-pink-300"></i>
								<span>Invoices</span>
							</a>
							<a href="#" class="btn btn-link btn-float font-size-sm font-weight-semibold text-default">
								<i class="icon-calendar5 text-pink-300"></i>
								<span>Schedule</span>
							</a>
						</div>
					</div>
				</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                            <a href="form_floating_labels.html" class="breadcrumb-item">Admin</a>
                            <span class="breadcrumb-item active">Change Password</span>
							
						</div>

						<a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
					</div>

					<div class="header-elements d-none">
						<div class="breadcrumb justify-content-center">
							<a href="#" class="breadcrumb-elements-item">
								<i class="icon-comment-discussion mr-2"></i>
								Support
							</a>

							<div class="breadcrumb-elements-item dropdown p-0">
								<a href="#" class="breadcrumb-elements-item dropdown-toggle" data-toggle="dropdown">
									<i class="icon-gear mr-2"></i>
									Settings
								</a>

								<div class="dropdown-menu dropdown-menu-right">
									<a href="#" class="dropdown-item"><i class="icon-user-lock"></i> Account security</a>
									<a href="#" class="dropdown-item"><i class="icon-statistics"></i> Analytics</a>
									<a href="#" class="dropdown-item"><i class="icon-accessibility"></i> Accessibility</a>
									<div class="dropdown-divider"></div>
									<a href="#" class="dropdown-item"><i class="icon-gear"></i> All settings</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- /page header -->


			<!-- Content area -->
			<div class="content">

				<!-- Floating labels -->
				<div class="row">
					<div class="col-md-8">

						<!-- Title -->
						<div class="mb-3">
							<h6 class="mb-0 font-weight-semibold">
								Add Admins
							</h6>
							
						</div>
						<!-- /title -->


						<!-- Text inputs -->
						<form method="post" action="#">
							<div class="card">
								

								<div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Old Passowrd</label>
                                        <input type="text" name="oldpass" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter your current password ">
                                        
                                    </div>
                                
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">New Password</label>
                                        <input type="text" name="newpass" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter New password">
                                       
                                    </div>
                                   
                                    <div class="form-group">
								        <button type="submit" name="changepass" class="btn btn-primary btn-block">submit <i class="icon-circle-right2 ml-2"></i></button>
							        </div>
                            
							</div>

						</form>
						
                            <?php
                            
                            if(isset($_SESSION['msg1'])){
                                echo $_SESSION['msg1'];
                            }
                            ?>
						
						<!-- /text inputs -->


					</div>

					
					
				</div>
				<!-- /floating labels -->

			</div>
			<!-- content area -->


			<!-- Footer -->
			<?php include "../footer.php";?>
			<!-- /footer -->

		</div>
		<!-- /main content -->

	</div>
	<!-- /page content -->

</body>
</html>
