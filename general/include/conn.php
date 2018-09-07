<?php
//first connecting to the database
$server = "localhost";
$db_name = "apule";
$db_user = "root";
$pass = "";


//first create a connection to the server and database;
$con = mysql_connect("$server","$db_user","$pass");
mysql_select_db("$db_name", $con);

?>