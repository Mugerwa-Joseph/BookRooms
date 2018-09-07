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
			<class="but">|<a href="ReservedRooms.php">Reserved Rooms</a>| <a href='addRoom.php'>Add Rooms</a>
			<br/><br/><hr/>
				<?php
				

    			 if (isset($_POST['cus_name'])) { 
					include('include/conn.php');
					//$id=$_POST['roomid'];
					$name=$_POST['cus_name'];
					$tel=$_POST['tel'];
					$IdNo=$_POST['id_no'];
					$address=$_POST['address'];
					$date=$_POST['date_use'];
					$room=$_POST['RoomName'];
					$price=$_POST['price'];
					$days=$_POST['no_of_days'];
					$query ="insert into booking (Cus_Name, Tel_No, National_Id, Address, Use_Date, Room_Name, Price, Usage_days) values
					('$name','$tel','$IdNo','$address','$date','$room','$price', '$days')";
					if(mysql_query($query)){
							echo "Room Booked Successfully |";
							echo "<h3 style='color:blue;'> List of Booked Rooms</h3>";
					}
					else{
							echo "Duplicate Entry, no Room added";
					}
						
			}
			
				?>
				
				<?php
			include('include/conn.php');
			echo "<table border=1 id='tab' width='100%' cellpadding=0 cellspacing=0>";
			$locate =mysql_query("select * from booking");
		if (mysql_num_rows($locate) > 0) {
			echo "<tr>";
			echo "<th>Book Id</th>";
			echo "<th>Name</th>";
			echo "<th>Tel Number</th>";
			echo "<th>National Id</th>";
			echo "<th>Address</th>";
			echo "<th>Date</th>";
			echo "<th>Room</th>";
			echo "<th>Price</th>";
			echo "<th>Usage Days</th>";
			echo "<td colspan='2'>Action</td>";
			echo "</tr>";
		} else{
			echo "<h3 style='color:red;'><Strong>No Rooms Booked</Strong></h3><a href = 'booking.php'>Book Here</a>";
		}

			while($rows=mysql_fetch_array($locate)){
		
				echo "<tr>";
				echo "<td>".$rows['Booking_Id']."</td>";
				echo "<td>".$rows['Cus_Name']."</td>";
				echo "<td>" .$rows['Tel_No']."</td>";
				echo "<td>".$rows['National_Id']."</td>";
				echo "<td>" .$rows['Address']."</td>";
				echo "<td>" .$rows['Use_Date']."</td>";
				echo "<td>" .$rows['Room_Name']."</td>";
				echo "<td>" .$rows['Price']."</td>";
				echo "<td>" .$rows['Usage_days']."</td>";
				echo "<td title ='Edit'><a href=\"editBooked.php?Room_Name=$rows[Room_Name]\"><center><img src='images/edit.png'></center></a></td>
			<td title ='Delete'><a href=\"deleteBooked.php?Room_Name=$rows[Room_Name]\"><center><img src='images/delete.png'></center></a></td>
			</td>";
				/*
				if($rows['Price']==!0){
				echo "<td>".$rows['Status']."</td>";
				}
				else{
				echo "<td>Not Available</td>";
				}
				if($rows['Price']==!0){
				echo "<td title=Book-Today><a href='booking.php?name=".$rows['Room_Name']."'><center><img src='images/brow.png'></center></a></td>";
				echo "<td title=Reserve><a href='reserving.php?name=".$rows['Room_Name']."'><center><img src='images/reserved.png'></center></a></td>";
				}
				*/
				echo "</tr>";
			}
			echo "</table>";
				
		?>
		
		<?php
		include("include/conn.php");

		$Room_Name=$_POST['RoomName'];
		$sql = mysql_query("select * from rooms where Room_Name='$Room_Name'");
		while($row=mysql_fetch_array($sql)){
		$state=$row['Status'];
	}

	$current = "Booked";

	$sql="update rooms set Status = '$current' where Room_Name = '$Room_Name'";
	mysql_query($sql) or die ('Error updating Room Name');


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
