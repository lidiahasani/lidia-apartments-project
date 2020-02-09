<?php


include ('db.php');

			
			$id =$_GET['userID'];	
			$newsql ="DELETE FROM `login` WHERE id ='$id' ";
			if(mysqli_query($con,$newsql))
				{
				echo' <script language="javascript" type="text/javascript"> alert("Username and password Deleted"); </script>';
							
						
				}
			header("Location: usersettings.php");
		
?>


