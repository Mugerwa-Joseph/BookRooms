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
	include("apule/header.php");
?>
<div class="navigation">
		<?php include("include/menu.php"); ?>
	</div>
	<div class="main">	
		
		<div class="content">
			<div class="node">
			<div class="menu">
				<class="but">|<a href="listOfBookedRooms.php">Booked Rooms</a>| <a href='addRoom.php'>Add Rooms</a> | <a href='roomsList.php'>Rooms List</a>
				<br /><br/><hr />
				
				<form class="form" method="POST" action="insertRoom.php" enctype="multipart/form-data">
				<fieldset>  <legend><strong>Room Details</strong></legend>
	 	<table cellspacing="6">
		
		<tr>
			<td>Room Name:</td>
			<td><input type="text" name="roomname"></td>
		</tr>
		<tr>
			<td>Room Category:</td>
			<td><input type="text" name="roomcat"></td>
		</tr>
		<tr>
			<td>Price (UGX):</td>
			<td><input type="text" name="price"></td>
		</tr>
		
		<tr>
			<td>Description:</td>
			<td><textarea name="roomdesc" id="proddesc" ></textarea></td>
		</tr>
		
		
		<tr>
			<td>Status:</td>
			<td><input type="text" name="roomstate"></td>
		</tr>
		
		<tr>
			<td>Photo:</td>
			<td><input type="file" name="photoToUpload" id="photoToUpload"></td>
			
		</tr>
		
		<tr>
				<td></td>
				<td><button name="borrowbook"><a class="-buttonform" ><span class="-home">Go</span></a></button></td>
		</tr>
		
		</table>
		</fieldset>
		</form>
		<br/>
		<?php
		
		/*

    		 if (isset($_POST['category'])) { 
			echo "<table border=1 id='tab' width='100%'>";
			$categ = $_POST['category'];
			$locate =mysql_query("select * from books where book_category like '%$categ%'");
		
			echo "<tr>";
			echo "<th>bookid</th>";
			echo "<th>book title</th>";
			echo "<th>category</th>";
			echo "<th>no. copies</th>";
			echo "<th>status</th>";
			echo "<th>Borrow</th>";
			echo "</tr>";

			while($rows=mysql_fetch_array($locate)){
				echo "<tr>";
				echo "<td>".$rows['book_id']."</td>";
				echo "<td>".$rows['book_title']."</td>";
				echo "<td>".$rows['book_category']."</td>";
				echo "<td>".$rows['no_copies']."</td>";
				echo "<td>".$rows['status']."</td>";
				echo "<td><a href='borrowedform.php?name=".$rows['book_title']."'>Borrow</a></td>";
				echo "</tr>";
			}
			echo "</table>";
		}
				
	*/
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
		<div class="copyright">
			<?php include("include/footer.php"); ?>
			
		</div>
</footer>
	</div>

</div>

</body>

</html>
