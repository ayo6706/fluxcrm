<?php
session_start();
if(!isset($_SESSION['adminemail'])){
	header("location: index.php");

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
			$delete="DELETE FROM event where id=$id";
			if(mysqli_query($conn, $delete))
				{
                    echo "<script>alert('deleted successfully')</script>";
                    header("location: dashboard.php");
                    
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
	<title>Aurulias Basket- CRM </title>

	<!-- Global stylesheets -->
	<?php include "link.php"; ?>
	<!-- /theme JS files -->

</head>

<body class="sidebar-xs">

	<!-- Main navbar -->
	<?php include "mainnav.php";?>
	<!-- /main navbar -->


	<!-- Page content -->
	<div class="page-content">

		<!-- Main sidebar -->
		
		<?Php include "sidebar.php";?>		
		<!-- /main sidebar -->


		<!-- Main content -->
		<div class="content-wrapper">

			<!-- Page header -->
			<div class="page-header page-header-light">
				<div class="page-header-content header-elements-md-inline">
					<div class="page-title d-flex">
						<h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Admin Dashboard</span>- upcoming Events</h4>
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
							<a href="dashboard.php" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboard</a>
							
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

				<!-- Inner container -->
				<div class="d-flex align-items-start flex-column flex-md-row">

					<!-- Left content -->
					<div class="w-100 order-2 order-md-1">

						<!-- Filter toolbar -->
						<div class="navbar navbar-expand-lg navbar-light navbar-component rounded">
							<div class="text-center d-lg-none w-100">
								<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-filter">
									<i class="icon-unfold mr-2"></i>
									Filters
								</button>
							</div>

							<div class="navbar-collapse collapse" id="navbar-filter">
								<span class="navbar-text mr-3">
									Filter:
								</span>

								<ul class="navbar-nav flex-wrap">
									<li class="nav-item dropdown">
										<a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
											<i class="icon-sort-time-asc mr-2"></i>
											By date
										</a>

										<div class="dropdown-menu">
											<a href="#" class="dropdown-item">Show all</a>
											<div class="dropdown-divider"></div>
											<a href="#" class="dropdown-item">Today</a>
											<a href="#" class="dropdown-item">Yesterday</a>
											<a href="#" class="dropdown-item">This week</a>
											<a href="#" class="dropdown-item">This month</a>
											<a href="#" class="dropdown-item">This year</a>
										</div>
									</li>

									<li class="nav-item dropdown">
										<a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
											<i class="icon-sort-amount-desc mr-2"></i>
											By status
										</a>

										<div class="dropdown-menu">
											<a href="#" class="dropdown-item">Show all</a>
											<div class="dropdown-divider"></div>
											<a href="#" class="dropdown-item">Open</a>
											<a href="#" class="dropdown-item">On hold</a>
											<a href="#" class="dropdown-item">Resolved</a>
											<a href="#" class="dropdown-item">Closed</a>
											<a href="#" class="dropdown-item">Duplicate</a>
											<a href="#" class="dropdown-item">Invalid</a>
											<a href="#" class="dropdown-item">Wontfix</a>
										</div>
									</li>

									<li class="nav-item dropdown">
										<a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
											<i class="icon-sort-numeric-asc mr-2"></i>
											By priority
										</a>

										<div class="dropdown-menu">
											<a href="#" class="dropdown-item">Show all</a>
											<div class="dropdown-divider"></div>
											<a href="#" class="dropdown-item">Highest</a>
											<a href="#" class="dropdown-item">High</a>
											<a href="#" class="dropdown-item">Normal</a>
											<a href="#" class="dropdown-item">Low</a>
										</div>
									</li>
								</ul>

								<span class="navbar-text mr-3 ml-lg-auto">
									Sorting:
								</span>

								<ul class="navbar-nav flex-wrap">
									<li class="nav-item">
										<a href="#" class="navbar-nav-link active">
											<i class="icon-sort-alpha-asc"></i>
											<span class="d-lg-none ml-2">Ascending</span>
										</a>
									</li>

									<li class="nav-item">
										<a href="#" class="navbar-nav-link">
											<i class="icon-sort-alpha-desc"></i>
											<span class="d-lg-none ml-2">Descending</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
						<!-- /filter toolbar -->


						<!-- Invoice grid -->
						<div class="row">

							<?php $ret=mysqli_query($conn,"select * from event");
							$cnt=1;
							while($row=mysqli_fetch_array($ret))
								{?>
							<div class="col-lg-6">
								<div class="card border-left-3 border-left-danger rounded-left-0">
									<div class="card-body">
										<div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
											<div>
												<h6 class="font-weight-semibold"><?php echo $row['username'];?></h6>
												<ul class="list list-unstyled mb-0">
													<li>Event Title: <a href="#"><?php echo $row['eventtitle'];?></a></li>
													<li>Date: <span class="font-weight-semibold"><?php echo $row['date'];?></span></li>
												</ul>
											</div>

											<div class="text-sm-right mb-0 mt-3 mt-sm-0 ml-auto">
												<h6 class="font-weight-semibold"></h6>
												<ul class="list list-unstyled mb-0">
													<li>Method: <span class="font-weight-semibold"></span></li>
													<li class="dropdown">
														Status: &nbsp;
														<a href="#" class="badge bg-danger-400 align-top dropdown-toggle" data-toggle="dropdown">Overdue</a>
														<div class="dropdown-menu dropdown-menu-right">
															<a href="#" class="dropdown-item active"><i class="icon-alert"></i> Overdue</a>
															<a href="#" class="dropdown-item"><i class="icon-alarm"></i> Pending</a>
															<a href="#" class="dropdown-item"><i class="icon-checkmark3"></i> Paid</a>
															<div class="dropdown-divider"></div>
															<a href="#" class="dropdown-item"><i class="icon-spinner2 spinner"></i> On hold</a>
															<a href="#" class="dropdown-item"><i class="icon-cross2"></i> Canceled</a>
														</div>
													</li>
												</ul>
											</div>
										</div>
									</div>

									<div class="card-footer d-sm-flex justify-content-sm-between align-items-sm-center">
										<span>
											<span class="badge badge-mark border-danger mr-2"></span>
											<!--Due:
											<span class="font-weight-semibold">2018/02/25</span>-->
										</span>

										<ul class="list-inline list-inline-condensed mb-0 mt-2 mt-sm-0">
											<!-- <li class="list-inline-item">
												<a href="#" class="text-default" data-toggle="modal" data-target="#invoice"><i class="icon-eye8"></i></a>
											</li> -->
											<li class="list-inline-item dropdown">
												<a href="#" class="text-default dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>

												<div class="dropdown-menu dropdown-menu-right">
													<a href="dashboard.php?action=delete&id=<?php echo $row['id'];?>" class="dropdown-item"><i class="icon-cancel"></i>Delete </a>
													
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>

							<?php  } ?>
							
						</div>

						<!-- /invoice grid -->


						<!-- Pagination -->
						<div class="d-flex justify-content-center mt-3 mb-3">
							<ul class="pagination">
								<li class="page-item"><a href="#" class="page-link"><i class="icon-arrow-small-right"></i></a></li>
								<li class="page-item active"><a href="#" class="page-link">1</a></li>
								<li class="page-item"><a href="#" class="page-link">2</a></li>
								<li class="page-item"><a href="#" class="page-link">3</a></li>
								<li class="page-item"><a href="#" class="page-link">4</a></li>
								<li class="page-item"><a href="#" class="page-link">5</a></li>
								<li class="page-item"><a href="#" class="page-link"><i class="icon-arrow-small-left"></i></a></li>
							</ul>
						</div>
						<!-- /pagination -->

					</div>
					<!-- /left content -->


					<!-- Right sidebar component -->
					<div class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-right border-0 shadow-0 order-1 order-md-2 sidebar-expand-md">

						<!-- Sidebar content -->
						<div class="sidebar-content">

							<!-- Invoice actions -->
							<div class="card">
								<div class="card-header bg-transparent header-elements-inline">
									<span class="text-uppercase font-size-sm font-weight-semibold">Actions</span>
									<div class="header-elements">
										<div class="list-icons">
					                		<a class="list-icons-item" data-action="collapse"></a>
				                		</div>
			                		</div>
								</div>

								<div class="card-body">
									<div class="row">
										<div class="col">
											<button type="button" class="btn bg-teal-400 btn-block btn-float">
												5000
												<span>Active Event</span>
											</button>

											<button type="button" class="btn bg-purple-300 btn-block btn-float">
												2000
												<span>Total Event</span>
											</button>
										</div>
										
										<div class="col">
											<button type="button" class="btn bg-warning-400 btn-block btn-float">
												1000
												<span>Users</span>
											</button>

											<button type="button" class="btn bg-blue btn-block btn-float">
												<i class="icon-cog3 icon-2x"></i>
												<span>Settings</span>
											</button>
										</div>
									</div>
								</div>
							</div>
							<!-- /invoice actions -->


							<!-- Navigation -->
							
							<!-- /navigation -->


							<!-- Filter -->
							
							<!-- /filter -->


							<!-- Latest updates 
							<div class="card">
								<div class="card-header bg-transparent header-elements-inline">
									<span class="text-uppercase font-size-sm font-weight-semibold">Latest updates</span>
									<div class="header-elements">
										<div class="list-icons">
					                		<a class="list-icons-item" data-action="collapse"></a>
				                		</div>
			                		</div>
								</div>

								<div class="card-body">
									<ul class="media-list">
										<li class="media">
											<div class="mr-3">
												<a href="#" class="btn bg-transparent border-success text-success rounded-round border-2 btn-icon">
													<i class="icon-checkmark3"></i>
												</a>
											</div>

											<div class="media-body">
												<a href="#">Richard Vango</a> paid invoice #0020
												<div class="text-muted font-size-sm">4 minutes ago</div>
											</div>
										</li>

										<li class="media">
											<div class="mr-3">
												<a href="#" class="btn bg-transparent border-slate text-slate rounded-round border-2 btn-icon">
													<i class="icon-infinite"></i>
												</a>
											</div>
											
											<div class="media-body">
												Status of invoice <a href="#">#0029</a> has been changed to "On hold"
												<div class="text-muted font-size-sm">36 minutes ago</div>
											</div>
										</li>

										<li class="media">
											<div class="mr-3">
												<a href="#" class="btn bg-transparent border-success text-success rounded-round border-2 btn-icon">
													<i class="icon-checkmark3"></i>
												</a>
											</div>

											<div class="media-body">
												<a href="#">Chris Arney</a> paid invoice #0031 with Paypal
												<div class="text-muted font-size-sm">2 hours ago</div>
											</div>
										</li>

										<li class="media">
											<div class="mr-3">
												<a href="#" class="btn bg-transparent border-danger text-danger rounded-round border-2 btn-icon">
													<i class="icon-cross2"></i>
												</a>
											</div>
											
											<div class="media-body">
												Invoice <a href="#">#0041</a> has been canceled
												<div class="text-muted font-size-sm">Mar 18, 18:36</div>
											</div>
										</li>

										<li class="media">
											<div class="mr-3">
												<a href="#" class="btn bg-transparent border-primary text-primary rounded-round border-2 btn-icon">
													<i class="icon-plus3"></i>
												</a>
											</div>
											
											<div class="media-body">
												New invoice #0029 has been sent to <a href="#">Beatrix Diaz</a>
												<div class="text-muted font-size-sm">Dec 12, 05:46</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
							/latest updates -->

						</div>
						<!-- /sidebar content -->

					</div>
					<!-- /right sidebar component -->

				</div>
				<!-- /inner container -->

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
