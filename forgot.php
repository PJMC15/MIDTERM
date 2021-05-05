<?php
$question = '';
$user = '';
include "config.php";
date_default_timezone_set('Asia/Manila');
$currentDate = date('Y-m-d H:i:s');
$db = mysqli_connect('localhost', 'root', '', 'accounts');

if (isset($_POST['submit1']))
  {
      $user = $_POST['username'];
      $sql = ("SELECT question FROM users WHERE username ='$user' ");
      $result = mysqli_query($db,$sql);
      
      if ($row = mysqli_fetch_array( $result ))
      {
          $question = $row['question'];
	  }
	  else
	  {
	  	  echo '<script>alert("Username not Found!")</script>'; 
	  }
  }

 if (isset($_POST['submit2']))
  {
      $user = $_POST['username'];
      $ans = $_POST['answer'];
      $pass = $_POST['password'];
      $cpass = $_POST['cpassword'];
      $fpassword = md5($cpass);
      $sql = ("SELECT answer FROM users WHERE username ='$user' ");
      $result = mysqli_query($db,$sql);
      
      if ($row = mysqli_fetch_array( $result ))
      {
           if ($ans==$row['answer'])
        	{
        		if ($pass == $cpass)
        		{
        			$query2 = "UPDATE users SET password = '$fpassword' WHERE username = '$user'";
    				mysqli_query($db, $query2);
             $query3 = "INSERT INTO events (username, event, date_time) VALUES ('$user','Change Password','$currentDate')";
             mysqli_query($db, $query3);
    				header('Location: login.php');
    			}
    			else
    			{
    				echo '<script>alert("Passwords do not Match!")</script>'; 
    			}
        	}
        	else
        	{
        		echo '<script>alert("Your answer is Wrong!")</script>';
        	}
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
        <label for="uname"><b>Enter your Username</b></label>
        <input type="text" placeholder="Enter Username" name="username" class= "text" value = "<?php echo $user;?>" required>
        <input type= "Submit" value = "Get Secret Question" name= "submit1" id= "Sub1">
        <label for="question"><b>Your secret question:</b></label>
        <input type="text" name="question" class= "text" value = "<?php echo $question;?>" disabled>
        <label for="answer"><b>Enter your Answer:</b></label>
        <input type="text" placeholder="" name="answer" class= "text">
        <label for="pword"><b>Enter New Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" class= "text">
        <label for="cpword"><b>Confirm Password</b></label>
        <input type="password" placeholder="Confirm Password" name="cpassword" class= "text">


        <input type= "Submit" value = "Change Password" name= "submit2" id= "Sub">
      </div>
        </form>
</body>

</html>

