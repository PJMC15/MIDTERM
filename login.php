<?php 
session_start();
  
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] !== true){
    header("location: welcome.php");
    exit;
}
  
include "config.php";
$_SESSION["verify"] = false;
$_SESSION["code_access"] = false;
date_default_timezone_set('Asia/Manila');
$currentDate = date('Y-m-d H:i:s');
 
 
  $DBHOST = "localhost";
  $DBUSER = "root";
  $DBPASSWORD = "";
  $DBDATABASE = "accounts";
  $db = mysqli_connect($DBHOST,$DBUSER,$DBPASSWORD,$DBDATABASE);
  
  if (isset($_POST['submit']))
  {
      $user = $_POST['username'];
      $pass = $_POST['password'];
      $fpass = md5($pass);
      $sql = ("SELECT password FROM users WHERE username ='$user' ");
      $result = mysqli_query($db,$sql);
      
      if ($row = mysqli_fetch_array( $result ))
      {
        if ($fpass==$row['password'])
        {
                 $query= "INSERT INTO events (username, event, date_time) VALUES ('$user','Login','$currentDate')";
                 mysqli_query($db, $query);
                 $_SESSION["verify"] = true;
                 $_SESSION["code_access"] = true;
                 $_SESSION["id"] = $id;
                 echo '<script>alert("Successfully Logged In.")</script>'; 
                 header("location: verification.php");
        
        }
        else
        {
          echo '<script>alert("Wrong PASSWORD")</script>';
        } 
      }

      else
      {
        echo '<script>alert("USERNAME not FOUND.")</script>';
      }



  }
?>
                            

  
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="Test.css">
    <meta charset="UTF-8">
    <title>Login</title>
   
   
</head>  
<body>
       
    <div class="wrapper">
        <form action="" method="post">
        <div class="imgcontainer">
        <img src="Avatar.jpg" alt="Avatar" class="avatar">
      </div>

      <div class="container">
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" class= "text" required>

        <label for="pword"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" class= "text" required>

        <input type= "Submit" value = "Login" name= "submit" id= "Sub">
        
        <label>
          <input type="checkbox" checked="checked" name="remember"> Remember me
          <span class="psw">Forgot <a href="forgot.php">password?</a></span>
        </label>
      </div>
        </form>

  
</body>
</html>