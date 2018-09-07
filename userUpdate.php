<?php
		include("include/conn.php");
		if(isset($_POST['updateuser'])){
				$id=$_GET['user_id'];
				$username=$_POST['user_name'];
				$password = $_POST['password'];
				//updating database from your table
				$sql="UPDATE user set username='$username',password='$password' 
				where id='".$id."'";
				mysql_query($sql) or die('Error');
				header("Location: usersList.php");
			}
			?>
