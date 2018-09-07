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
<div class="navigation">
		<?php  include("include/menu.php"); ?>
	</div>
	<div class="main">	
		
		<div class="content">
			<div class="node">
			<div class="menu">
				<class="but">|<a href="bookingProcess.php">Booked Rooms</a>| <a href='addRoom.php'>Add Rooms</a> | <a href='roomsList.php'>Rooms List</a>
				<br /><br/><hr /> <hr/>
	 	
		
		<form class="form" method="POST" action="rooms.php">
		<table cellspacing="6">
		<tr>
		<td>Search Category: </td>
		<td><select name="category" onchange="this.form.submit();">
				<?php 
					include("include/conn.php");
					$query =mysql_query("select DISTINCT Room_Category from rooms ORDER BY Room_Category ASC");
						echo "<option>select category</option>";
					while($rs=mysql_fetch_array($query)){
						echo "<option>".$rs['Room_Category']."</option>";
					}
				?>
		</select></td>
		</table><br/>
		</form>
		<?php

    		 if (isset($_POST['category'])) { 
			echo "<table border=1 id='tab' width='100%' cellpadding=0 cellspacing=0";
			$categ = $_POST['category'];
			$locate =mysql_query("select * from rooms where Room_Category like '%$categ%'");
		
			echo "<tr>";
			echo "<th>Room Id</th>";
			echo "<th>Room Name</th>";
			echo "<th>Category</th>";
			echo "<th>Price</th>";
			echo "<th>Status</th>";
			echo "<th>Book Today</th>";
			echo "<th>Reserve</th>";
			echo "</tr>";

			while($rows=mysql_fetch_array($locate)){
				echo "<tr>";
				echo "<td>".$rows['Room_Id']."</td>";
				echo "<td>".$rows['Room_Name']."</td>";
				echo "<td>".$rows['Room_Category']."</td>";
				echo "<td>".$rows['Price']."</td>";
				echo "<td>".$rows['Status']."</td>";
				echo "<td title=Book-Today><a href='booking.php?name=".$rows['Room_Name']."'><center><img src='images/brow.png'></center></a></td>";
				echo "<td title=Reserve><a href='reserving.php?name=".$rows['Room_Name']."'><center><img src='images/reserved.png'></center></a></td>";
				echo "</tr>";
			}
			echo "</table>";
		}
				
	
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
		
		<?php include("include/footer.php"); ?>
		
</footer>
	</div>

</div>

</body>

</html>
