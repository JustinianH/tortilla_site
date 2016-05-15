<?php
	

	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	$servername = "localhost";
	$username = "justinnh";
	$password = 'Hostw|ththem0st75!';
	$dbname = "justinnh_tortillasComments";

	$id = $_POST["id"];


	// Create connection
	
	mysql_connect($servername, $username, $password);
	
	$selected = mysql_select_db("justinnh_tortillasComments");


	//$conn = mysql_connect($servername, $username, $password, $dbname);
	// // Check connection  

	$update = "UPDATE commentTable SET Approved=1 WHERE ID=".$id;

	//echo($update);

	mysql_query($update);




?>