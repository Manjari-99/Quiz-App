<?php

session_start();
$user_id = $_SESSION['user_id'];
$ques = $_GET['n'];
$ans_id = $_GET['ans'];
$conn = $conn = mysqli_connect("localhost","root","","quiz");
$result = mysqli_fetch_assoc($result);
$query1 = "SELECT * FROM questions WHERE q_id LIKE $ques";
$result1 = mysqli_query($conn,$query1);
$result1 = mysqli_fetch_assoc($result1);
if($result1['ans_id']==$ans_id)
{
	$_SESSION['score']=$_SESSION['score']+2;
}


$q=$ques+1;

header("Location: quizstart.php?id=".$user_id."&n=".$q);

?>