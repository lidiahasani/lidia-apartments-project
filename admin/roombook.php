<?php
session_start();
if (!isset($_SESSION["user"])) {
	header("location:index.php");
}
?>

<?php
if (!isset($_GET["reservationId"])) {

	header("location:home.php");
} else {
	$curdate = date("Y/m/d");
	include('db.php');
	$id = $_GET['reservationId'];


	$sql = "Select *, roombook.sasia as sasia, room.sasia as sasiatotal, room.id as rid
	from roombook as roombook join room as room on roombook.roomid = room.id 
	where roombook.id = '$id' ";
	$result = mysqli_query($con, $sql);
	while ($row = mysqli_fetch_array($result)) {

		$emri = $row['emri'];
		$mbiemri = $row['mbiemri'];
		$email = $row['Email'];
		$phone = $row['Phone'];
		$sasia = $row['sasia'];
		$hyrja = $row['hyrja'];
		$dalja = $row['dalja'];
		$status = $row['status'];
		$nrdite = $row['nrdite'];
		$availablerooms=$row['available'];
		$rid=$row['rid'];
		$sasiatotal=$row['sasiatotal'];
		$cmimi=$row['cmimi'];
		}
}



?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Administrator </title>
	<!-- Bootstrap Styles-->
	<link href="assets/css/bootstrap.css" rel="stylesheet" />
	<!-- FontAwesome Styles-->
	<link href="assets/css/font-awesome.css" rel="stylesheet" />
	<!-- Morris Chart Styles-->
	<link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
	<!-- Custom Styles-->
	<link href="assets/css/custom-styles.css" rel="stylesheet" />
	<!-- Google Fonts-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
	<div id="wrapper">
		<nav class="navbar navbar-default top-navbar" role="navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="home.php"> <?php echo $_SESSION["user"]; ?> </a>
			</div>

			<ul class="nav navbar-top-links navbar-right">
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
						<i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-user">
						<li><a href="usersettings.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
						</li>
						<li><a href="roomsettings.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
						</li>
						<li class="divider"></li>
						<li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
						</li>
					</ul>
					<!-- /.dropdown-user -->
				</li>
				<!-- /.dropdown -->
			</ul>
		</nav>
		<!--/. NAV TOP  -->
		<nav class="navbar-default navbar-side" role="navigation">
			<div class="sidebar-collapse">
				<ul class="nav" id="main-menu">

					<li>
						<a href="home.php"><i class="fa fa-dashboard"></i> Status</a>
					</li>
					<li>
						<a class="active-menu" href="roombook.php"><i class="fa fa-bar-chart-o"></i> Room Booking</a>
					</li>
					<li>
						<a href="invoice.php"><i class="fa fa-qrcode"></i> Invoice</a>
					</li>
					<li>
						<a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
					</li>


				</ul>

			</div>

		</nav>
		<!-- /. NAV SIDE  -->




		<div id="page-wrapper">
			<div id="page-inner">


				<div class="row">
					<div class="col-md-12">
						<h1 class="page-header">
							Room Booking<small> <?php echo  $curdate; ?> </small>
						</h1>
					</div>


					<div class="col-md-8 col-sm-8">
						<div class="panel panel-info">
							<div class="panel-heading">
								Booking Confirmation
							</div>
							<div class="panel-body">

								<div class="table-responsive">
									<table class="table">
										<tr>
											<th>DESCRIPTION</th>
											<th>INFORMATION</th>

										</tr>
										<tr>
											<th>Emer</th>
											<th><?php echo $emri . $mbiemri; ?> </th>

										</tr>
										<tr>
											<th>Email</th>
											<th><?php echo $email; ?> </th>

										</tr>
										<tr>
											<th>Phone No </th>
											<th><?php echo $phone; ?></th>

										</tr>
										<tr>
											<th>Numri i dhomave </th>
											<th><?php echo $sasia; ?></th>

										</tr>
										<tr>
											<th>Data e hyrjes </th>
											<th><?php echo $hyrja; ?></th>

										</tr>
										<tr>
											<th>Data e daljes</th>
											<th><?php echo $dalja; ?></th>

										</tr>
										<tr>
											<th>Numri i diteve</th>
											<th><?php echo $nrdite; ?></th>

										</tr>
										<tr>
											<th>Id e dhomes </th>
											<th><?php echo $rid; ?></th>

										</tr>
										<tr>
											<th>Status</th>
											<th><?php echo $status; ?></th>
										</tr> 
										
									</table>
								</div>



							</div>
							<div class="panel-footer">
								<form method="post">
									<!-- <div class="form-group">
										<label>Select the Confirmation</label>
										<select name="conf" class="form-control">
											<option value selected> </option>
											<option value="Confirm">Confirm</option>


										</select>
									</div> -->
									<input type="submit" name="confirm" value="Confirm" class="btn btn-success">
                                    <input type="submit" name="decline" value="Decline" class="btn btn-success">
								</form>
							</div>
						</div>
					</div>
					
					
					<div class="col-md-4 col-sm-4">
						<div class="panel panel-default">
							<div class="panel-heading">
								Available Room Details
							</div>
							<div class="panel-body">
							<div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
								<thead>
                                        <tr>
                                            <th>ID</th>
											<th>TIPI</th>
                                            <th>SASIA</th>
                                            <th>AVAILABLE</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
									<?php
									$rsql="SELECT * from `room`";
									$rre=mysqli_query($con,$rsql);
								while($row = mysqli_fetch_array($rre))
										{
											$rid = $row['id'];
											$tipi = $row['tipi'];
                                            $sasiatotal = $row['sasia'];
                                            $available=$row['available'];
                                            $cmimi=$row['cmimi'];
												echo"<tr class='gradeC'>
													<td>".$rid."</td>
													<td>".$tipi."</td>
                                                    <td>".$sasiatotal."</td>
                                                    <td>".$available."</td>
									</tr>";
										}
									?>
									</tbody>
									</table>
									</div>
									</div>
						
							<div class="panel-footer">

							</div>
						</div>
					</div>
				</div>
				<!-- /. ROW  -->

			</div>
			<!-- /. ROW  -->




		</div>
		<!-- /. PAGE INNER  -->
	</div>
	<!-- /. PAGE WRAPPER  -->
	</div>
	<!-- /. WRAPPER  -->
	<!-- JS Scripts-->
	<!-- jQuery Js -->
	<script src="assets/js/jquery-1.10.2.js"></script>
	<!-- Bootstrap Js -->
	<script src="assets/js/bootstrap.min.js"></script>
	<!-- Metis Menu Js -->
	<script src="assets/js/jquery.metisMenu.js"></script>
	<!-- Morris Chart Js -->
	<script src="assets/js/morris/raphael-2.1.0.min.js"></script>
	<script src="assets/js/morris/morris.js"></script>
	<!-- Custom Js -->
	<script src="assets/js/custom-scripts.js"></script>


</body>

</html>

<?php
if (isset($_POST['decline'])){
		$del = "DELETE FROM `roombook` WHERE id = '$id'";
		if(mysqli_query($con,$del))
				{
					$to=$_POST['email'];
			$subject="Booking Confirmation";
			$message="We are sorry, your booking is declined.";
            $headers="From: lidiahasani98@gmail.com";
			mail($to, $subject, $message, $headers);
					echo "<script type='text/javascript'> alert('Booking Declined')</script>";
					echo "<script type='text/javascript'> window.location='roombook.php'</script>";							
				}
			}
if (isset($_POST['confirm'])) {
	$stat = "Confirmed";
		$upd = "UPDATE `roombook` SET `status`='$stat' WHERE id = '$id'";
		if ($availablerooms < $sasia) {
			echo "<script type='text/javascript'> alert('Sorry, Not Available!')</script>";
			$to=$_POST['email'];
			$subject="Booking Confirmation";
			$message="We are sorry, there is no room availability for your dates.";
            $headers="From: lidiahasani98@gmail.com";
			mail($to, $subject, $message, $headers);
		} else if (mysqli_query($con, $upd)) {
			
			$total = $cmimi * $nrdite * $sasia;
			$tsql = "INSERT INTO `invoice`( `total`,`roombookid`) 
					 VALUES ('$total','$id')";
			
			$to=$_POST['email'];
			$subject="Booking Confirmation";
			$message="Your booking is confirmed. We look forward to welcoming you!";
            $headers="From: lidiahasani98@gmail.com";
			mail($to, $subject, $message, $headers);
			
			if (mysqli_query($con, $tsql)) {
				$available=$availablerooms - $sasia;
				$rupsql = "UPDATE `room` SET `available`='$available' where id='$rid' ";
				if (mysqli_query($con, $rupsql)) {
					echo "<script type='text/javascript'> alert('Booking Confirmed $rid')</script>";
					echo "<script type='text/javascript'> window.location='roombook.php'</script>";
				}
			}
		}
	}




?>