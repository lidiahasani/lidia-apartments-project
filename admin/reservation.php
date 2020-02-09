<?php
include('db.php')
?>
<!DOCTYPE html>
<html>

<head>
    <title>RESERVATION LIDIA APARTMENTS</title>
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="../index.php"><i class="fa fa-home"></i> Homepage</a>
                    </li>

                </ul>

            </div>

        </nav>

        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            RESERVATION <small></small>
                        </h1>
                    </div>
                </div>


                <div class="row">

                    <div class="col-md-5 col-sm-5">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                PERSONAL INFORMATION
                            </div>
                            <div class="panel-body">
                                <form name="form" method="post">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input name="emri" class="form-control" required>

                                    </div>
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input name="mbiemri" class="form-control" required>

                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input name="email" type="email" class="form-control" required>

                                    </div>
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input name="phone" type="text" class="form-control" required>

                                    </div>

                            </div>

                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    RESERVATION INFORMATION
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label>Type Of Room *</label>
                                        <select name="tipi" class="form-control" required>
                                            <option value selected></option>
                                            <?php
                                            $sql="SELECT id, tipi from room";
                                            $result=mysqli_query($con,$sql);
                                            while($row=mysqli_fetch_array($result)){
                                                $roomid=$row['id'];
                                                $text=$row['tipi'];

                                                echo "<option value=".$roomid.">".$text."</option>";
                                            
                                            }
                                            ?>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>No.of Rooms *</label>
                                        <select name="sasia" class="form-control" required>
                                            <option value selected></option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Check-In</label>
                                        <input name="hyrja" type="date" class="form-control">

                                    </div>
                                    <div class="form-group">
                                        <label>Check-Out</label>
                                        <input name="dalja" type="date" class="form-control">

                                    </div>
                                </div>

                            </div>
                        </div>


                        <div  class="col-md-12 col-sm-12">
                                <input type="submit" name="submit" class="btn btn-primary">
</form>
                                <?php
                                 include('db.php');
                                if (isset($_POST['submit'])) {
                                    $check = "SELECT * FROM roombook WHERE email = '$_POST[email]'";
                                    $result = mysqli_query($con, $check);
                                    $data = mysqli_fetch_array($result, MYSQLI_NUM);
                                    if ($data[0] > 1) {
                                        echo "<script type='text/javascript'> alert('User Already Exists')</script>";
                                    } else {
                                        $newstatus = "Not Confirmed";
                                        $newUser = "INSERT INTO `roombook`(`emri`, `mbiemri`, `Email`, `Phone`, `sasia`, `hyrja`, `dalja`, `status`, `nrdite`, `roomid`) 
                                        VALUES ('$_POST[emri]','$_POST[mbiemri]','$_POST[email]','$_POST[phone]','$_POST[sasia]','$_POST[hyrja]','$_POST[dalja]','$newstatus',datediff('$_POST[dalja]','$_POST[hyrja]'), '$_POST[tipi]')";
                                        if (mysqli_query($con, $newUser)) {
                                            echo "<script type='text/javascript'> alert('Your Booking application has been sent.')</script>";
                                        } else {
                                            echo "<script type='text/javascript'> alert('Error adding user in database')</script>";
                                        }
                               
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
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script>


</body>

</html>