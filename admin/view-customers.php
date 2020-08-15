<?php
session_start();
if(!isset($_SESSION['adminemail'])){
	header("location: login.php");

}

include "../php/db.php";

$id="";
$action="";

if(isset($_GET['id']) And isset($_GET['action']) ){

    $id= $_GET['id'];
    $action= $_GET['action'];
}



if($action=='delete')
		{
			$id= $_GET['id'];
			$delete="DELETE FROM customers where id=$id";
			if(mysqli_query($conn, $delete))
				{
                    echo "<script>alert('deleted successfully')</script>";
                    header("location: view-customers.php");
                    
				}
				
			else
				{
					$msg='error:'.mysql_error();
				}
	
		}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Aurulias Basket- CRM</title>

	<!-- Global stylesheets -->
	<?php include "link.php"; ?>
	<!-- /theme JS files -->

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
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Users</span></h4>
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
							<a href="dashboard.php" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>Dashboard</a>
							<a href="event-list.php" class="breadcrumb-item">Users</a>
							
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

				<!-- Basic datatable -->
                
                <!-- /basic datatable -->


				<!-- Striped rows -->
				
				<!-- /striped rows -->


				<!-- Hover rows -->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">registered users</h5>
						<div class="header-elements">
							<div class="list-icons">
		                		<a class="list-icons-item" data-action="collapse"></a>
		                		<a class="list-icons-item" data-action="reload"></a>
		                		<a class="list-icons-item" data-action="remove"></a>
		                	</div>
	                	</div>
					</div>

					
					<div class="card-header card-header-primary">
                        <h3 class="card-title ">Search Result</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">


							<table id="example" class="display" style="width:100%">
								<thead>
									<tr>
										<th>First Name</th>
										<th>Last Name</th>
										<th>Email</th>
										<th>phone</th>
										<th>Location</th>
										<th class="text-center">Actions</th>
									</tr>
								</thead>
								<tbody>
									<?php $ret=mysqli_query($conn,"select * from customers");
									$cnt=1;
									while($row=mysqli_fetch_array($ret))
										{?>
									<tr>
										<td><?php echo $row['firstname'];?></td>
										<td><a href="#"><?php echo $row['lastname'];?></a></td>
										<td><?php echo $row['email'];?></td>
										<td><?php echo $row['phone'];?></td>
										<td><?php echo $row['address'];?></td>
										<td class="text-center">
											<div class="list-icons">
												<div class="dropdown">
													<a href="#" class="list-icons-item" data-toggle="dropdown">
														<i class="icon-menu9"></i>
													</a>

													<div class="dropdown-menu dropdown-menu-right">
														<a href="view-customers.php?action=delete&id=<?php echo $row['id'];?>" class="dropdown-item btn btn-danger"><i class="fa fa-cancel"></i> Delete</a>
														
													</div>
												</div>
											</div>
										</td>
									</tr>
									<?php  } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<!-- /hover rows -->


				<!-- Bordered table -->
				
				<!-- /bordered table -->


				<!-- Style combinations -->
				
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
