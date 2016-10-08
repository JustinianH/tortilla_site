<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

<?php


error_reporting(E_ALL);
ini_set("display_errors", 1);


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

$sql = "SELECT ID, user, date, comment FROM commentTable WHERE Approved=0";

mysql_select_db($dbname);

$retval = mysql_query( $sql, $conn );

if(! $retval ) {
  die('Could not get data: ' . mysql_error());
}
    // output data of each row

echo "<h1> Unapproved Comments</h1>";

while($row = mysql_fetch_assoc($retval)) {
       //$rows[] = $r;

   echo "User: " . $row["user"]. "<br> - Date: " . $row["date"]. "<br> - Comment:" . $row["comment"]. "<br> - ID: ". $row["ID"]. "<br><button id='Approval_button' onclick='approval_click(".$row["ID"].")'> Approve</button> <button> Decline</button>"."<br><hr>";
}


?>

<script type="text/javascript">

  function approval_click(ID) {   
    
      $.ajax({
        url: 'http://tortillasrecipe.com/update_table.php',
        type: 'POST',
        data: 'id='+ID,
        success: function(data) {
                    //$("#comments").html(data);
                    var parseData = $.parseJSON(data);


                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert('failure!');
                }
            });
  }



</script>

<hr>

<?php

mysql_close($conn); 
?>

<!-- Put comments on page in a JSON and iterate over it to create div with printed comments
-->












