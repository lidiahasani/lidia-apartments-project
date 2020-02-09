<?php
include('admin/db.php');
	$id = $_GET['reviewId'];

	$sql = "Select * from `reviews` where id = '$id' ";
	$result = mysqli_query($con, $sql);
	while ($row = mysqli_fetch_array($result)) {

		$emri = $row['emri'];
		$email = $row['Email'];
		$piket = $row['piket'];
		$text = $row['text'];
    }
?>
<html>
    <div class="wrapper">
    <div class="first">
    <p>Emri: <?php echo $emri?> Piket: <?php echo $piket?><p>
    <p>Comment: <?php echo $text ?><p>
</div>
</div>
</html>