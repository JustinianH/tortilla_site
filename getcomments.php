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

while($row = mysql_fetch_assoc($retval)) {
       //$rows[] = $r;

 echo "User: " . $row["user"]. "<br> - Date: " . $row["date"]. "<br> - Comment:" . $row["comment"]. "<br> - ID: ". $row["ID"]. "<br><button id='Approval_button' onclick='approval_click(".$row["ID"].")'> Approve</button> <button> Decline</button>"."<br><hr>";
}

    // JS that prints the getcomments and prints results. Another JS calls update.php. When update.php returns call get comments again
    //When button is clicked, post something to update.php that trigger the sql command for the appropriate row


    // Problem: When approve button gets clicked, AJAX needs to trigger update_table.php, which runs db query to update table for specific comment to create approved. 

    // What does data in ajax do?
    // how does parseJSON work?
    // Do we need an ID field to identify which comment is being approved and match to db?
    // Why doesn't Get Comment seem to be working on index?

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






<?php

mysql_close($conn); 
?>

<!-- Put comments on page in a JSON and iterate over it to create div with printed comments
-->












