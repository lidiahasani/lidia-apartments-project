<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("location:index.php");
}
ob_start();
?>

<?php
include('db.php');
$rsql = "select * from room";
$rre = mysqli_query($con, $rsql);

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LIDIA APARTMENTS</title>
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
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php">MAIN MENU </a>
            </div>

            <ul class="nav navbar-top-links navbar-right">

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
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
                        <a class="active-menu" href="roomsettings.php"><i class="fa fa-pencil-square-o"></i> Update Room Settings</a>
                    </li>



            </div>

        </nav>
        <!-- /. NAV SIDE  -->

        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-header">
                            UPDATE OR DELETE ROOM <small></small>
                        </h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <!-- Advanced Tables -->
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>ID E DHOMES</th>
                                                <th>TIPI</th>
                                                <th>SASIA</th>
                                                <th>AVAILABLE</th>
                                                <th>CMIMI</th>
                                                <th>Update</th>
                                                <th>Remove</th>

                                            </tr>
                                        </thead>
                                        <tbody>


                                            <?php
                                            while ($row = mysqli_fetch_array($rre)) {

                                                $id = $row['id'];
                                                $tipi = $row['tipi'];
                                                $sasia = $row['sasia'];
                                                $available = $row['available'];
                                                $cmimi = $row['cmimi'];
                                                echo "<tr class='gradeC'>
													<td>" . $id . "</td>
													<td>" . $tipi . "</td>
                                                    <td>" . $sasia . "</td>
                                                    <td>" . $available . "</td>
                                                    <td>" . $cmimi . "</td>
													
													<td><button class='btn btn-primary btn' data-toggle='modal' data-target='#myModal'>
															 Update 
													</button></td>
													<td><a href=roomdel.php?roomID=" . $id . " <button class='btn btn-danger'> <i class='fa fa-edit' ></i> Delete</button></td>
												</tr>";
                                            }

                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <button class="btn btn-primary btn" data-toggle="modal" data-target="#myModal1">
                                Shto dhome te re </button>
                        </div>
                        <div class="imageup" style="padding-top: 30px; padding-left:20px; padding-right: 700px">
                            <form action="roomsettings.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Upload image per dhomen qe do zgjidhni:</label>
                                    <select name="tipi" class="form-control" required>
                                        <option value selected></option>
                                        <?php
                                        $sql = "SELECT id, tipi from room";
                                        $result = mysqli_query($con, $sql);
                                        while ($row = mysqli_fetch_array($result)) {
                                            $roomid = $row['id'];
                                            $text = $row['tipi'];

                                            echo "<option value=" . $roomid . ">" . $text . "</option>";
                                        }
                                        ?>
                                        <input type="file" name="image" style="padding: 10px 2px">
                                        <input type="submit" name="submitimage" value="UPLOAD" class="btn btn-primary">
                            </form>
                            <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Shto tipin, sasine dhe cmimin</h4>
                                        </div>
                                        <form method="post">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Tipi</label>
                                                    <input name="newtipi" class="form-control" placeholder="Vendos tipin e dhomes se re">
                                                </div>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Sasia</label>
                                                    <input name="newsasia" class="form-control" placeholder="Vendos sasine">
                                                </div>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Cmimi</label>
                                                    <input name="newcmimi" class="form-control" placeholder="Vendos cmimin e dhomes se re">
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                                <input type="submit" name="in" value="Shto" class="btn btn-primary">
                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <?php
                    if (isset($_POST['in'])) {
                        $newtipi = $_POST['newtipi'];
                        $newsasia = $_POST['newsasia'];
                        $newcmimi = $_POST['newcmimi'];
                        $newsql = "Insert into room (tipi,sasia, available, cmimi) values ('$newtipi','$newsasia', '$newsasia', '$newcmimi')";
                        if (mysqli_query($con, $newsql)) {
                            echo ' <script language="javascript" type="text/javascript"> alert("Dhoma u shtua me sukses!") </script>';
                        }
                        header("Location: roomsettings.php");
                    }
                    if (isset($_POST["submitimage"])) {
                        $check = getimagesize($_FILES["image"]["tmp_name"]);
                        if ($check !== false) {
                            $image = $_FILES['image']['tmp_name'];
                            $imgContent = addslashes(file_get_contents($image));

                            $imsql = "UPDATE `room` SET `image`='$imgContent' WHERE id = '$_POST[tipi]'";
                            if (mysqli_query($con, $imsql)) {
                                echo "File uploaded successfully.";
                            } else {
                                echo "File upload failed, please try again.";
                            }
                        }
                    }
                    ?>
                    <div class="panel-body">

                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">Ndrysho sasine</h4>
                                    </div>
                                    <form method="post">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Sasia e re</label>
                                                <input name="sasia" value="<?php echo $sasia; ?>" class="form-control" placeholder="Jep sasine e re">
                                            </div>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Cmimi i ri</label>
                                                <input name="cmimi" value="<?php echo $cmimi; ?>" class="form-control" placeholder="Jep cmimin e ri">
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                                            <input type="submit" name="up" value="Update" class="btn btn-primary">
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- /. ROW  -->
        <?php
        if (isset($_POST['up'])) {
            $usasia = $_POST['sasia'];
            $ucmimi = $_POST['cmimi'];
            $upsql = "UPDATE `room` SET `sasia`='$usasia', `cmimi`='$ucmimi'  WHERE id = '$id'";
            if (mysqli_query($con, $upsql)) {
                echo ' <script language="javascript" type="text/javascript"> alert("Te dhenat u ndryshuan") </script>';
            }
            header("Location: roomsettings.php");
        }
        ob_end_flush();
        ?>

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