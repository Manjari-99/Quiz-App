<?php
	
	session_start();
	$conn = mysqli_connect("localhost","root","","quiz");

	//fetch values

	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	//check

	$query = "SELECT * FROM users WHERE username LIKE '$username' AND email LIKE '$email' AND password LIKE '$password'";
	$result = mysqli_query($conn,$query);

	$num = mysqli_num_rows($result);

	if($num==1)
	{
		$_SESSION['is_logged_in'] = 1;
		$result = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $result['username'];
		$_SESSION['user_id'] = $result['user_id'];
		header('Location:instruction.php');
	}
	else{
		header('Location:login.php?err=1');
	}

?>