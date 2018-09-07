<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


<link rel="stylesheet" type="text/css" href="css/style.css" media="screen"/>

<script language="Javascript" src="js/CalendarControl.js" ></script>
<title>APULE LODGES</title>

</head>


<?php

// Inialize session
session_start();

// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
header('Location: login.php');
}

?>

<body>


<div class="container">	
<?php
	include("include/header.php");
?>
<div class="navigation">
		<?php
		
		include("include/menu.php");
		
		?>
	</div>
	<div class="main">		
		
		<div class="content">
			<div class="node">
			<div class="menu">
			
			<h1> CLEARED ROOMS
			
				<?php
				
			include('include/conn.php');
			$book_id = $_POST['Booking_Id'];
			$name = $_POST['RoomName'];
			$date = $_POST['date_use'];
			
			$clear = "insert into Cleared (Booked_Id, Room_Name, Clear_Date) values ('$book_id','$name','$date')";
			 mysql_query("$clear");
			 

			$update = mysql_query("select * from rooms where Room_Name='$name'");
			while($row=mysql_fetch_array($update)){
				$cur_status=$row['Status'];
			}
			$retvalue = "Available";
	
			$return="update rooms set Status = '$retvalue' where Room_Name = '$name'";
			if(mysql_query($return)){
				echo "<script> window.alert ('Cleared Successfuly' ) </script>";
			}

			$delvalue = "delete from booking where Booking_Id='$book_id'";
			mysql_query($delvalue) or die('Error Deleting booked info');
			
			header('Location: clearRoom.php');
		?>
				
				
	</div>
	</div>
	  </div>
	  


<div class="sidenav">
		<div class="right-menu">
		<h2>Calendar</h2>
		</div>
	<div class="right-content">
		<?php include("apule/calender.php");?>
</table>
</td>
</tr>

</table>


	</div>
	
</div>
	
		<div class="clearer"><span></span></div>

	</div>

	
		<div class="clearer"><span></span></div>
<footer>	
		<?php include("include/footer.php") ?>
</footer>
	</div>

</div>

</body>

</html>
