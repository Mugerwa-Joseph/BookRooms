
<!DOCTYPE HTML>
<html>
<head>
<title>Login</title>
<meta charset="UTF-8" />
<meta name="Designer" content="PremiumPixels.com">
<meta name="Author" content="$hekh@r d-Ziner, CSSJUNTION.com">
<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/structure.css">
</head>

<body>

<form action ="login.php" class="box login" method="POST">
	<label align="center"><font size="6" color="grey">Apule Safari Lodges</font></label>
	<fieldset class="boxBody">
	  <label>Username</label>
	  <input type="text"  placeholder="Your Email Address" required name="username">
	  <label><a href="#" class="rLink" tabindex="5" ></a>Password</label>
	  <input type="password" placeholder="Password" required name="password">
	  <input type="submit" class="btnLogin" value="Login"  name="login">
	   <input type="reset" class="btnLogin" value="Reset"  name="reset" >
	  <label>
	  <?php
	
// Check, if username session is NOT set then this page will jump to login page
	if (isset($_SESSION['username'])) {
	header('Location: index.php');
	}
	else{
		
	}
	if(isset($_POST['login'])){		
	session_start();
	$username=$_POST['username'];
	$password=$_POST['password'];
	// Include database connection settings
	include('include/conn.php');
	// Retrieve username(Email Address) and password from database according to user's input
	$login = mysql_query("SELECT * FROM customer WHERE email = '$username' and pass = '$password'");
	// Check username and password match
	if (mysql_num_rows($login) == 1){
	// Set username session variable
	$_SESSION['username']=$_POST['username'];
	// Jump to secured page
	header("Location: /Apule/lodge/index.php");
}
	else{
	echo "<br><font color='red'>Note: Wrong Username and Password</font><br>";
	}
}

?>


</form>

</html>

</div>
