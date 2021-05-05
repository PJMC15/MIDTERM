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

        <label for="pword"><b>Confirm Password</b></label>
        <input type="password" placeholder="Enter Password" name="cpassword" class= "text" required>

        <label for="uname"><b>Security Question</b></label>
        <input type="text" placeholder="Enter Security Question" name="question" class= "text" required>

         <label for="uname"><b>Answer</b></label>
        <input type="text" placeholder="Enter Your Answer" name="answer" class= "text" required>




        <input type= "Submit" value = "Register" name= "submit" id= "Sub">
        
        <label>
          <input type="checkbox" checked="checked" name="remember"> Remember me
          <span class="psw">Forgot <a href="forgot.php">password?</a></span>
        </label>
      </div>
        </form>

  
</body>
</html>

<?php
  date_default_timezone_set('Asia/Manila');
  $currentDate = date('Y-m-d H:i:s');
  include "config.php";

  $username = "";
  $password   = "";
  $cpassword   = "";
  $question  = "";
  $answer  = "";


$db = mysqli_connect('localhost', 'root', '', 'accounts');

if (isset($_POST['submit'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);
  $cpassword = mysqli_real_escape_string($db, $_POST['cpassword']);
  $question = mysqli_real_escape_string($db, $_POST['question']);
  $answer = mysqli_real_escape_string($db, $_POST['answer']);


  $user_check_query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) {
      if ($user['username'] === $username) {
        echo ("<script>alert('Username already exists');</script>");
      }
    }

      else if ($password != $cpassword)
    {
       echo ("<script>alert('Passwords Do Not Match!');</script>");
    }
     
      else{
      $fpassword = md5($password);

      $query = "INSERT INTO users (username, password, created_at, question, answer) 
            VALUES('$username', '$fpassword', '$currentDate', '$question', '$answer')";
      mysqli_query($db, $query);
      $query3 = "INSERT INTO events (username, event, date_time) VALUES ('$username','Register','$currentDate')";
      mysqli_query($db, $query3);
      echo '<script>alert("Thanks for coming! Successfully logged out.")</script>'; 


      header('location: login.php');
    }
}




?>