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
	 	<table cellspacing="6">
		<form class="form" method="POST" action="insertRoom.php" enctype="multipart/form-data">
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
			<td><textarea name="roomdescrip" id="roomdes" ></textarea></td>
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
				<td><button name="roomAdd"><a class="-buttonform" ><span class="-home">Go</span></a></button></td>
		</tr>
		<tr><td>
		<td>
			<?php

			
			//$target_dir = "image/";
			//$target_file = $target_dir . basename($_FILES["photoToUpload"]["name"]);
			//$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			//$uploadOk = 1;
			
			
			/* Check if image file is a actual image or fake image
		if(isset($_POST["roomAdd"])) {
    $check = getimagesize($_FILES["photoToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
	*/		
			
    			 if (isset($_POST['roomname'])) { 
					include('include/conn.php');
					
					$dir="imageUploads/";
					$file=$dir . basename($_FILES["photoToUpload"]["name"]);
					//$id=$_POST['roomid'];
					$name=$_POST['roomname'];
					$cat=$_POST['roomcat'];
					$price=$_POST['price'];
					$descr=$_POST['roomdescrip'];
					$state=$_POST['roomstate'];
					//$photo=$_POST['photoToUpload'];
					
					if (move_uploaded_file($_FILES['photoToUpload']['tmp_name'], $file)){
					$query ="insert into rooms (Room_Name, Room_Category, Price, description, Status, photo) values('$name','$cat','$price', '$descr', '$state', '$file')";
					if(mysql_query($query)){
							echo "<script>window.alert('Room Added Successfully')</script>";
							echo "Room Added Successfully | <a href='roomsList.php'>Rooms List</a>";
					}else {
							echo "<script>window.alert('Room Addition Failed')</script>";
						}
					}
					else{
							echo "Image Upload failed";
					}
						
			}
			

		?>
		</td>
		</tr>
		</table>
		
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