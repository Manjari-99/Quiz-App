<?php
 
	$conn = mysqli_connect("localhost","root","","quiz");


	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	$query = "SELECT * FROM users WHERE username LIKE '$username' AND email LIKE '$email' AND password LIKE '$password'";
	$result = mysqli_query($conn,$query);

	$num = mysqli_num_rows($result);

	if($num==0){

	$query1 = "INSERT INTO users (user_id,username,email,password) VALUES (NULL, '$username','$email','$password')";

	if(mysqli_query($conn,$query1))
	{
		header('Location:login.php?err=2');
	}
	else{
		header('Location:login.php?err=3');
	}

	}
	else{
		header('Location:login.php?err=4');
	}
	

?>