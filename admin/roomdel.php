<?php


include ('db.php');
			
			$id =$_GET['roomID'];
			$newsql ="DELETE FROM `room` WHERE id ='$id' ";
			if(mysqli_query($con,$newsql))
				{
				echo' <script language="javascript" type="text/javascript"> alert("Room Deleted"); </script>';
							
						
				}
			header("Location: roomsettings.php");
		
?>


