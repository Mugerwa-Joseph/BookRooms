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

<script src="datetimepicker_css.js"></script>
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
			<class="but">|<a href="listOfBookedRooms.php">Booked Rooms</a>| <a href='addRoom.php'>Add Rooms</a>
			<br/>
			<br/>
			<hr/>
				<?php
					echo "BOOK A ROOM FOR TODAY";
				?>
				
				<form method = "POST" action = "bookingProcess.php">
				<fieldset><legend>Booking Details </legend>
				<table cellspacing = "6">
				
				<tr>
				<td> Name:</td> 
				<td> <input type="text" name="cus_name" placeholder = "Enter your name"></td>
				
				</tr>
				<tr>
				<td> Tel No: </td>
				<td><input type="text" name="tel" placeholder = "Enter your phone Number"></td>
				
				</tr>
				<tr>
				<td> ID No:</td>
				<td><input type="text" name="id_no" placeholder = "National/passport"></td>
				
				</tr>
				
				
				<tr>
				<td> Home Address:</td>
				<td> <input type="text" name="address" placeholder = "Home Area"></td>
				
				</tr>
				
				<tr>
				<td>Date To Use:</td>
				<td><input name="date_use" type="text" id="demo6"  placeholder="YYYY-MM-DD" required ="date_use"/><img src="img/calender.gif" title="Pick date/time" onclick="javascript:NewCssCal ('demo6','yyyyMMdd')" style="cursor:pointer"></td>
				</tr>
				
				<td>Room Name:</td>
				<td><input type="text" name="RoomName" value="<?php echo $_GET['name'];?>" readonly></td>
				<tr>
				
				<td>Price:</td>
				<td><input type="text" name="price" value="<?php include("include/conn.php");
				$Room_Name = $_GET['name'];
				
				$price = mysql_query("select Price from Rooms where Room_Name = '$Room_Name'");
				while($row = mysql_fetch_array($price)){
					echo $row['Price'];
				}?>" readonly></td>
				<tr>
				
				<tr>
				<td>No. Days To Use:</td>
				<td><input type="text" name="no_of_days" placeholder = "No. of days to use the room"></td>
				</tr>
				
				<tr> <td> </td>
				<td><button name="borrowbook"><a class="-buttonform" ><span class="-home">Go</span></a></button></td>
				</tr>
				
				
				
				</table>
				
				</fieldset>
				</form>
				
				<script>
function addDate(){
date = new Date();
var month = date.getMonth()+1;
var day = date.getDate();
var year = date.getFullYear();

if (document.getElementById('date').value == ''){
document.getElementById('date').value = day + '/' + month + '/' + year;
}
}
</script>
<body onload="addDate();">
	</div>
	</div>
	  </div>
				
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
