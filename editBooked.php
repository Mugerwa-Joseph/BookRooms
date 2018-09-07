<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="imagetoolbar" content="no" />	
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
<meta name="description" content="description"/>
<meta name="keywords" content="keywords"/> 
<meta name="author" content="author"/> 
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen"/>
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

</div>

<div class="container">	
<?php
	include("include/header.php");
?>
	<div class="main">		
		
		<div class="navigation">
		<?php include("include/menu.php"); ?>
	</div>
		
		<div class="content">
			<div class="node">
			<div class="menu">
	<button name="listofborrowers" class="but">|<a href="roomsList.php">List of Rooms</a>|</button>
	<br>
	<br>
<?php


	include("include/conn.php");
	//selecting data from records based on id
	$query = "SELECT * FROM booking where Booking_Id='".$_GET['id_number']."'";
	//initializing result as a query
	$result = mysql_query($query);
	//display records from records table 
	while($rows = mysql_fetch_array($result))
	{	
		$id_number = $rows['Booking_Id'];
		$name = $rows['Cus_Name'];
		$tel = $rows['Tel_No'];
		$national = $rows['National_Id'];		
		$address = $rows['Address'];		
		$date	= $rows['Use_Date'];		
		$room= $rows['Room_Name'];		
		$price	= $rows['Price'];		
		$usage_days = $rows['Usage_days'];			
	}	
	
	
?>
<hr width="600">
<strong><h1>Edit <?php //echo $name ?> Booking Details</h1></strong>
<hr width="600">
<table cellspacing="6">
<form class="form" action="updateBooked.php?Booking_Id=<?php echo $id_number?>" method="POST">
	<td><label>Booking Id<label></td>
	<td><input type="text" name="id_number" value="<?php ?>" required></td>
	<tr>
	<td>Name</td>
	<td><input type="text" name="cus_name" value='<?php ?>' required></td>
	<tr>
	<td>Telphone</td>
	<td><input type="text" name="tel" value='<?php ?>' required></td>
	<tr>
	<td>National Id</td>
	<td><input type="text" name="national" value='<?php ?>' required></td>
	<tr>
	<td>Address</td>
	<td><input type="text" name="address" value='<?php ?>' required></td>
	<tr>
	<td>Date Booked</td>
	<td><input type="text" name="date"  value='<?php ?>' required></td>
	<tr>
	<td>Room Booked</td>
	<td><input type="text" name="room"  value='<?php ?>' required></td>
	<tr>
	<td>Price</td>
	<td><input type="text" name="price"  value='<?php ?>' required></td>
	<tr>
	<td>Number Of Usage Days</td>
	<td><input type="text" name="days"  value='<?php ?>' required></td>
	<tr>
		<td>
	<td><button name="update"><a class="-buttonform" ><span class="">Go</span></a></button></td>
	<tr>
	<td>
	</td>
	</form>
	</table>


<body onload="addDate();">
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
		<div class="copyright">
			<?php include("include/footer.php"); ?>
			</div>
	</footer>
	</div>

</div>

</body>

</html>
