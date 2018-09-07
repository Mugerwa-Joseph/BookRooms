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
			|<a href="reserved.php">List of Reserved Rooms</a>|
	<br>
	<br>
<hr width="600">
<strong><h1>Room Reservation</h1></strong>
<hr width="600">
<table cellspacing="6">
<form class="form" action="ReservedRooms.php" method="POST">
	<td><label>Name:<label></td>
	<td><input type="text" name="name" required = "name" title="Required field">*</td>
	<tr>
	<td>National Id No:</td>
	<td><input type="text" name="id_num" required = "id_num" placeholder = "National Id Number" title="Required field">*</td>
	<tr>
	<td>Origin Address:</td>
	<td><input type="text" name="address" required = "address" placeholder = "Address of Origin" title="Required field">*</td>
	
	<tr>
	<td>Date To Use:</td>
	<td><input name="date_to_use" type="text" id="demo6"  placeholder="YYYY-MM-DD" required = "date_to_use"/><img src="img/calender.gif" title="Pick date/time" onclick="javascript:NewCssCal ('demo6','yyyyMMdd')" style="cursor:pointer"></td></td>
	<tr>
	<td>Room Name:</td>
	<td><input type="text" name="room_name" value="<?php echo $_GET['name']; ?>" required = "room_name" readonly></td>
	
	<tr>
	<td>Price Per Day (UGX):</td>
				<td><input type="text" name="price" value="<?php include("include/conn.php");
				$Room_Name = $_GET['name'];
				
				$price = mysql_query("select Price from Rooms where Room_Name = '$Room_Name'");
				while($row = mysql_fetch_array($price)){
					echo $row['Price'];
				}?>" readonly></td>
	
	</tr>
	
	<tr>
	<td>No. Days To Use:</td>
	<td><input type="text" name="no_copies" placeholder = "No. of days to use the room"></td>
	<tr>
		<td>
	<td><button name="reserveRoom"><a class="-buttonform" ><span class="-home">Go</span></a></button></td>
	<tr>
	<td>
	<?php
	/*
		if(isset($_POST['borrowbook'])){
		if(empty($id_num) && empty($name) && empty($course) && empty($year) && empty($section) && empty($date_borrow) && empty($date_will_return) && empty($book_title) && empty($no_copies)){
			
		}
		else
			header("Location: library/borrowedbookprocess.php");
	}
	*/?>
	</td>
	</form>
	</table>

<script>
function addDate(){
date = new Date();
var month = date.getMonth()+1;
var day = date.getDate();
var year = date.getFullYear();

if (document.getElementById('date').value == ''){
document.getElementById('date').value = day + '-' + month + '-' + year;
}
}
</script>
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
