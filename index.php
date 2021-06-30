<?php

	session_start();
	$db = new mysqli("localhost","root","","sign_up");

	if(isset($_POST['submit'])){
		$username =validation($_POST['username']);
		$password =validation($_POST['password']);
		$email =validation($_POST['email']);

		$query = "INSERT INTO information(username, password, email) VALUES ('$username' , '$password', '$email')";
		$run = mysqli_query($db, $query);

		if($run){
            
            
			echo "Registration successful.!";
		}else{
			echo "error".mysql_error($db);
		}
	}

	if(isset($_POST['login'])){
		$username =validation($_POST['lusername']);
		$password =validation($_POST['lpassword']);

		$mysqli = new mysqli("localhost","root","","sign_up");
		$result = $mysqli->query("SELECT * FROM information WHERE username = '$username' AND password ='$password' ");
		$row = $result->fetch_assoc();

		if($row['username'] == $username && $row['password'] == $password){
		 header('Location:success.php');
		}else{
			$message1 = "Login Unsuccessful.!";
			echo "<script type='text/javascript'>alert('$message1');</script>";
		}
	}


function validation($data) {
  $data = trim($data," ");
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
  
  
<div class="login-page">
   
   
  
    
   <div class="form">
        
        <form action="index.php" class="register-form" method="post">
            <input type="text" name="username" placeholder="user name" required>
            <input type="password" name="password" placeholder="password" required>
            <input type="text" name="email" placeholder="email id" required>
            
            <button name="submit">Create</button>
            <p class="message">Already Registered<a href="#">Login</a></p>
            
        </form>
        
        
        <form action="index.php" class="login-form" method="post">
            <input type="text" name="lusername" placeholder="user name" required>
            <input type="password" name="lpassword" placeholder="password" required>
            <button name="login">Log in</button>
            <p class="message">Not Registered?<a href="#">Register</a></p>
        </form>
        
    </div>

    
    
</div>
  
  <script src='http://code.jquery.com/jquery-3.3.1.min.js'></script>
  
	<script src='http://code.jquery.com/jquery-3.3.1.min.js'></script>
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstarp.min.js"></script>
	<script src="js/custom.js"></script>

	<script>
		$('.message a').click(function(){
			$('form').animate({height: "toggle",opacity: "toggle"}, "slow");
		});
	</script>
   
   
   
    
</body>
</html>