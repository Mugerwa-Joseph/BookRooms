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
		
	</div>
		
		<div class="content">
			<div class="node">
			<div class="menu">
	<button name="listofborrowers" class="but">|<a href="usersList.php">List of Users</a>|</button>
	<br>
	<br>
<?php
	include("include/conn.php");
	//selecting data from records based on id
	$query = "SELECT * FROM user where user_id=$_GET[id]";
	//initializing result as a query
	$result = mysql_query($query);
	//display records from records table 
	while($rows = mysql_fetch_array($result))
	{	
		$id = $rows['user_id'];
		$username = $rows['user_name'];
		$password = $rows['password'];		
	}	
?>
<hr width="600">
<strong><h1>Edit User</h1></strong>
<hr width="600">
<table cellspacing="6">
<form class="form" action="userUpdate.php?id=<?php echo $id?>" method="POST">
	<td>Username</td>
	<td><input type="text" name="username" value='<?php echo $username?>' required></td>
	<tr>
	<td>Password</td>
	<td><input type="text" name="password" value='<?php echo $password?>' required></td>
	<tr>
		<td>
	<td><button name="updateuser"><a class="-buttonform" ><span class="">Update</span></a></button></td>
	<tr>
	<td>
	</td>
	</form>
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
