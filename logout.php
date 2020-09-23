<?php
session_start();
$user_id= $_GET['id'];
$conn = $conn = mysqli_connect("localhost","root","","quiz");
$query1 = "UPDATE score SET status=0 WHERE user_id LIKE $user_id";
$result1 = mysqli_query($conn,$query1);
session_destroy();
	header('Location: login.php');
?>	