<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

$comment = $_POST['comment'];
$name = $_POST['username'];


$servername = "localhost";
$username = "justinnh";
$password = 'Hostw|ththem0st75!';
$dbname = "justinnh_tortillasComments";

// Create connection
	
mysql_connect($servername, $username, $password);
	
$selected = mysql_select_db("justinnh_tortillasComments");

$sql = "INSERT INTO commentTable (comment, user)
VALUES ('$comment', '$name')";

mysql_query($sql);


 ?>

