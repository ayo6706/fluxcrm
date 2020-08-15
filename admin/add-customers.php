<?php
session_start();
if(!isset($_SESSION['adminemail'])){
	header("location: index.php");

}

include "../php/db.php";



if(isset($_POST["addcustomer"])){
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
	$fullname = $firstname ." ". $lastname;
    $email = $_POST["email"];
    $address = $_POST["address"];		
	
    $password = md5(md5(md5($_POST["password"])));
    $userid = $_SESSION['id'];
    $eventtitle = $_POST["eventtitle"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
	$eventdesc = $_POST["eventdesc"];	
	$reminder = $_POST["reminder"];
	$eventdate = $_POST["eventdate"];
	
	$currentDate = new DateTime(''.$eventdate.'');
	
	//Subtract a day using DateInterval
	$thirdDT = $currentDate->sub(new DateInterval('P3D'));
	
	//Get the date in a YYYY-MM-DD format.
	$thirdDT = $thirdDT->format('Y-m-d');
	//Print it out.
	$adminalert = $thirdDT;

	

	$query=mysqli_query($conn,"select email from customers where email='$email'");
	$num=mysqli_fetch_array($query);
	if($num>1)
	{
	$_SESSION['msg']="Email-id already register with us";	
	}
	else
	{
		mysqli_query($conn,"insert into customers (firstname,lastname, email,password,phone,address) values('$firstname','$lastname','$email','$password','$phone','$address')");	$_SESSION['msg']="Successfully register with us";
	}


	mysqli_query($conn,"insert into event(username,email,eventtitle,eventdesc,reminder,date, adminalert) values('$fullname','$email','$eventtitle','$eventdesc','$reminder','$eventdate', '$adminalert')");
		$_SESSION['msg']="Successfully inserted with us";



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
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Add Event</span></h4>
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
                            <span class="breadcrumb-item active">Add Customers Event</span>
							
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
								Add Customers Event
							</h6>
							
						</div>
						<!-- /title -->


						<!-- Text inputs -->
						<form method="post" action="add-customers.php">
							<div class="card">
								

								<div class="card-body">
                                    <div class="form-group">
                                        <label for="firstname">First Name</label>
                                        <input type="text" name="firstname" class="form-control"  aria-describedby="firstname" placeholder="Enter first name ">
                                        
                                    </div>

                                    <div class="form-group">
                                        <label for="lastname">Last Name</label>
                                        <input type="text" name="lastname" class="form-control"  aria-describedby="lastname" placeholder="Enter  last name ">
                                        
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                        
                                    </div>

                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="tel" name="phone" class="form-control"  aria-describedby="phone" placeholder="Enter phone number">
                                        
                                    </div>

                                    <div class="form-group">
                                        <label for="address">address</label>
                                        <input type="text" name="address" class="form-control"  aria-describedby="address" placeholder="Enter address">
                                        
                                    </div>

                                    <div class="form-group">
                                        <label for="eventtitle">Event Title</label>
                                        <input type="text" name="eventtitle" class="form-control"  aria-describedby="eventtitle" placeholder="Enter Event Title ">
                                        
                                    </div>


                                    <div class="form-group">
                                        <label for="eventdescription">Event Description </label>
                                        <input type="text" name="eventdesc" class="form-control"  aria-describedby="eventdescription" placeholder="Enter event description ">
                                        
                                    </div>


                                    <div class="form-group">
                                        <label for="dateofevent">Date of event </label>
                                        <input type="date" name="eventdate" value="2020-08-19" class="form-control"  id="example-date-input">
                                       
                                    </div>

                                    <div class="form-group">
                                        <label for="emailreminder">Customers Date Email Reminder </label>
                                        <input type="date" name="reminder"  class="form-control" >
                                       
                                    </div>



                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Customers Password</label>
                                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="give the customer a password">
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                    </div>
                                    <div class="form-group">
								        <button type="submit" name="addcustomer" class="btn btn-primary btn-block">submit <i class="icon-circle-right2 ml-2"></i></button>
							        </div>
                            
							</div>

						</form>
						
						
						
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
