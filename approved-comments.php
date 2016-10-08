
<?php

// error_reporting(E_ALL);
// ini_set("display_errors", 1);


$servername = "localhost";
$username = "justinnh"; 
$password = 'Hostw|ththem0st75!';
$dbname = "justinnh_tortillasComments";  

// Create connection
$conn = mysql_connect($servername, $username, $password, $dbname);
// // Check connection
if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
} 


$sql = "SELECT ID, user, date, comment FROM commentTable WHERE Approved=1";

mysql_select_db($dbname);

$retval = mysql_query( $sql, $conn );

if(! $retval ) {
  die('Could not get data: ' . mysql_error());
}

while($row = mysql_fetch_assoc($retval)) {
       //$rows[] = $r;

  /* echo "User: " . $row["user"]. "<br> - Date: " . $row["date"]. "<br> - Comment:" . $row["comment"]. "<br> - ID: ". $row["ID"]."<br><hr>";
*/
           echo '<div class="row" style="padding-top: 5%; padding-bottom: 10%;"  >
        
                    <div class="col-md-2" id="Comments_date">
                        <h4>Date: ' . $row["date"]. '</h4>
                    </div>
        
                    <div class="col-md-3" id="Comments_user">
                        <h4>User: ' . $row["user"]. '</h4>
                                            </div>
        
                    <div class="col-md-7" id="Comments_comment">
                        <h4>Comment: '. $row["comment"].'</h4>
                    </div>
        
                    <hr>
                </div>';

}


?>