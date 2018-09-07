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
			
	<form class="registerForm" method="POST" action="register.php">
	<fieldset>  <legend><strong>REGISTRATION DETAILS</strong></legend>
	<table cellspacing="8">
		<tr>
		<td>First Name:</td><td><input type="text" name ="fname" required></td>
		<tr>
		<td>Email Address:</td><td><input type="text" name ="email" required></td>
		<tr>
		<td>Telphone Number:</td><td><input type="text" name ="tel" required></td>
		<tr>
		<td>Password:</td><td><input type="password" name ="pass" required></td>
		<tr>
			<td>
	<td><button name="adduser"><a class="-buttonform" ><span class="-home">REGISTER</span></a></button></td>
	<tr>
		<td>
	<?php
		if(isset($_POST['adduser'])){
				include("include/conn.php");
				$fname = $_POST['fname'];
				$email = $_POST['email'];
				$tel = $_POST['tel'];
				$pass = $_POST['pass'];
				$query="INSERT INTO customer(fname, email, tel, pass) VALUES ('$fname','$email', '$tel', '$pass')";
					mysql_query($query);
					if($query){
						//echo "<font color='red'><blink>User Inserted!</blink></font>";
						echo "<script> window.alert ('Registered Successfuly' ) </script>";
						header('Location: login.php');
					}
					else
					echo "<script> window.alert ('Sorry, Registration could not be completed, try again!' ) </script>";
				}
	?>
	</td>
	</table>
	</fieldset>
	</form>
				
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