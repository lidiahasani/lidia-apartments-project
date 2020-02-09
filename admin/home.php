<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Administrator</title>
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
                        <a class="active-menu" href="home.php"><i class="fa fa-dashboard"></i> Status</a>
                    </li>
                    <li>
                        <a href="roombook.php"><i class="fa fa-bar-chart-o"></i> Room Booking</a>
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
                            Status <small>Room Booking </small>
                        </h1>
                    </div>
                </div>
                <!-- /. ROW  -->
                <?php
                include('db.php');
                $sql = "select * from roombook";
                $result = mysqli_query($con, $sql);
                $count = 0;
                while ($row = mysqli_fetch_array($result)) {
                    $newstatus = $row['status'];
                    // $hyrja = $row['hyrja'];
                    // $id = $row['id'];
                    if ($newstatus == "Not Confirmed") {
                        $count = $count + 1;
                    }
                }





                ?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">

                            </div>
                            <div class="panel-body">
                                <div class="panel-group" id="accordion">

                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                                    <button class="btn btn-default" type="button">
                                                        New Room Bookings <span class="badge"><?php echo $count; ?></span>
                                                    </button>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse in" style="height: auto;">
                                            <div class="panel-body">
                                                <div class="panel panel-default">

                                                    <div class="panel-body">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Emer</th>
                                                                        <th>Email</th>
                                                                        <th>Hyrja</th>
                                                                        <th>Dalja</th>
                                                                        <th>Status</th>
                                                                        <th>Nr i Diteve</th>
                                                                        <th>Tipi i dhomes</th>
                                                                        <th>Sasia</th>
                                                                        <th>Tjeter</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                    <?php
                                                                    $sql = "Select *, roombook.id as id, roombook.sasia as sasia 
                                                                    from roombook as roombook 
                                                                    join room as room on roombook.roomid = room.id";
                                                                    $result = mysqli_query($con, $sql);
                                                                    while ($trow = mysqli_fetch_array($result)) {
                                                                        $confirmation = $trow['status'];
                                                                        if ($confirmation == "Not Confirmed") {
                                                                            echo "<tr>
												<th>" . $trow['id'] . "</th>
												<th>" . $trow['emri'] . " " . $trow['mbiemri'] . "</th>
                                                <th>" . $trow['Email'] . "</th>
                                                <th>" . $trow['hyrja'] . "</th>
												<th>" . $trow['dalja'] . "</th>
												<th>" . $trow['status'] . "</th>
                                                <th>" . $trow['nrdite'] . "</th>
                                                <th>" .$trow['tipi'] . "</th>
                                                <th>" .$trow['sasia'] . "</th>
												<th><a href='roombook.php?reservationId=" . $trow['id'] . " ' class='btn btn-primary'>Action</a></th>
												</tr>";
                                                                        }
                                                                    }
                                                                    ?>

                                                                </tbody>
                                                            </table>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End  Basic Table  -->
                                            </div>
                                        </div>
                                    </div>
                                    <?php

                                    $sql = "SELECT * FROM `roombook`";
                                    $result = mysqli_query($con, $sql);
                                    $count = 0;
                                    while ($row = mysqli_fetch_array($result)) {
                                        $confirmation = $row['status'];
                                        if ($confirmation == "Confirmed") {
                                            $count = $count + 1;
                                        }
                                    }

                                    ?>
                                    <div class="panel panel-info">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed">
                                                    <button class="btn btn-primary" type="button">
                                                        Booked Rooms <span class="badge"><?php echo $count; ?></span>
                                                    </button>

                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse" style="height: 0px;">
                                            <div class="panel-body">
                                                <?php
                                                $sql = "Select *, roombook.id as id from roombook as roombook 
                                                join room as room on roombook.roomid = room.id";
                                                $result = mysqli_query($con, $sql);

                                                while ($mrow = mysqli_fetch_array($result)) {
                                                    $mstatus = $mrow['status'];
                                                    if ($mstatus == "Confirmed") {

                                                        echo "<div class='col-md-3 col-sm-12 col-xs-12'>
													<div class='panel panel-primary text-center no-boder bg-color-blue'>
														<div class='panel-body'>
															<i class='fa fa-users fa-5x'></i>
															<h3>" . $mrow['emri'] . "</h3>
														</div>
														<div class='panel-footer back-footer-blue'>
														<a href=show.php?roombookId=" . $mrow['id'] . "><button  class='btn btn-primary btn' data-toggle='modal' data-target='#myModal'>
													Show
													</button></a>
															" . $mrow['tipi'] . "
														</div>
													</div>	
											</div>";
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>

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