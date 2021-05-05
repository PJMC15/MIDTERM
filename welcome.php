<?php 
session_start();
  
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html>

<head>
<title>LOGGED IN</title>
<style>
input[type=submit] 
{
  background-color: #4CAF50;
  color: white;
  padding: 14px 10px;
  margin: 100px 510px;
  border: none;
  cursor: pointer;
  width: 20%;

}
body
{
  background-image: url("Background.jpg");
}
input[type=submit]:hover {
  opacity: 0.8;
}
</style>
</head>

<center><h1> SUCCESSFULY LOGGED IN.</h1></center>
<center><h1> WELCOME! </h1></center>
<form method = POST>
<center>
<input type= "Submit" value = "Logout" name= "submit" id= "Sub"> </center>
</form>
</html>

<?php
  
  include "config.php";

    if (isset($_POST['submit']))
  {
    date_default_timezone_set('Asia/Manila');
    $currentDate = date('Y-m-d H:i:s');
    $db = mysqli_connect('localhost', 'root', '', 'accounts');
    $query = "SELECT username FROM events WHERE event_id = (SELECT MAX(event_id) FROM events)";
    $result = $link->query($query);
        if ($result->num_rows > 0){
          while($row = $result->fetch_assoc())
          {
              $user = $row['username'];
          }
        }
    $query2 = "INSERT INTO events (username, event, date_time) VALUES ('$user','Logout','$currentDate')";
    mysqli_query($db, $query2);
    echo '<script>alert("Thanks for coming! Successfully logged out.")</script>'; 

    header('Location: login.php');
  
}
?>