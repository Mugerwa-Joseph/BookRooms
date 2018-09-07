<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="imagetoolbar" content="no" />	
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
<meta name="description" content="description"/>
<meta name="keywords" content="keywords"/> 
<meta name="author" content="Harold" /> 
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen"/>
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen"/>

<script language="Javascript" src="js/CalendarControl.js" ></script>
<title>Apule Lodges</title>

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
		<?php include("include/menu.php") ?>
	</div>
	<div class="main">		
		
		<div class="content">
			<div class="node">
			<div class="menu">
<form class="adduserform" method="POST" action="usersList.php">
	<table>
		<td colspan="2"><strong><h3><center>Add User Account</center></h3></td>
		<tr>
		<td>Username</td><td><input type="text" name ="user" required></td>
		<tr>
		<td>Password</td><td><input type="password" name ="pass" required></td>
		<tr>
			<td>
	<td><button name="adduser"><a class="-buttonform" ><span class="-home">Add user</span></a></button></td>
	<tr>
		<td>
	<?php
		if(isset($_POST['adduser'])){
				include("include/conn.php");
				$user = $_POST['user'];
				$pass = $_POST['pass'];
				$query="INSERT INTO user(user_name, password) VALUES ('$user','$pass')";
					mysql_query($query);
					if($query){
						//echo "<font color='red'><blink>User Inserted!</blink></font>";
						echo "<script> window.alert ('User Registered Successfuly' ) </script>";
						header('Location: usersList.php');
					}
					else
					echo "User Connot Insert!";
				}
	?>
	</td>
	</table>
	</form>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<hr width="625">
<strong><h1>List of User Accounts</h1></strong>
<hr width="625">
<br>

<?php
include("include/conn.php");
 $sql = mysql_query("select * from user")
   or die('Error in query : $sql. ' .mysql_error());
   
if (mysql_num_rows($sql) > 0) 
{            
	echo "<table border='1' cellspacing='0' cellpadding='10' class='table' width='600'>";
	echo "<td>Username</td>";
	echo "<td>Password</td>";
	echo "<td colspan='2'>Action</td>";
	echo "<tr>";
		}
else
	echo "No User Record form the Database!";	 
						
while ($row = mysql_fetch_array($sql))
	{
	echo "<tr>";
	echo "<td>".$row['user_name']."</td>";
	echo "<td>".$row['password']."</td>";
	echo "<td title ='Edit'><a href=\"userEdit.php?id=$row[user_id]\"><center><img src='images/edit.png'></center></a></td>
	<td title ='Delete'><a href=\"userDel.php?id=$row[user_id]\"><center><img src='images/delete.png'></center></a></td>";
}	

mysql_free_result($sql);

?>
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
			<?php include("include/footer.php") ?>
			
			</div>
	</footer>
	</div>

</div>

</body>

</html>


