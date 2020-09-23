<?php 
	session_start();
	$_SESSION['score']=0;
	$conn = $conn = mysqli_connect("localhost","root","","quiz");
	if(empty($_SESSION))
	{
		header('Location:login.php');
	}
	$user_id = $_SESSION['user_id'];
	$query = "SELECT * FROM score WHERE user_id LIKE $user_id";
	$result = mysqli_query($conn,$query);
	$result = mysqli_fetch_assoc($result);
	if($result['status'])
	{	
		header('Location:logout.php?id='.$result['user_id'].'');
	}
	$query1 = "SELECT * FROM answered WHERE user_id LIKE $user_id";
	$result1 = mysqli_query($conn,$query1);
	$num1 = mysqli_num_rows($result1);
	if($num1==1){
		$query1 = "UPDATE answered SET visited1=0,visited2=0,visited3=0,visited4=0,visited5=0 WHERE user_id LIKE $user_id";
		$result1 = mysqli_query($conn,$query1); }
		
	else{
		$query1 = "INSERT INTO answered (user_id,visited1,visited2,visited3,visited4,visited5) VALUES ($user_id,0,0,0,0,0)";
		$result1 = mysqli_query($conn,$query1);
	}
	

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Instructions</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

		<link rel="stylesheet" type="text/css" href="style.css">

		<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@500&display=swap" rel="stylesheet">

		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body class="bg-background">
	<nav class="navbar">
		<span>
			<a href="#" class="navbar-brand" style="color:#dfe6e9; float: left;"> Quiz Time</a>
		</span>
	</nav>
	<div style="margin-top: 5px; margin-bottom: 5px;">
		<h1 class="text-md-center" style="color:#dfe6e9;">Wecome to Quiz Time <?php echo $_SESSION['username']; ?></h1>
		
	</div>
	<div class="container">
		<div class="row mt-3">
			<div class="col-md-9" style="display: block; margin-left: auto; margin-right: auto;">
				<div class="card">
					<div class="card-header"><h1 class="text-md-center" style="font-family: 'Bebas Neue', cursive; color: #e74c3c">Instructions</h1></div>
					<div class="card-body card-font" style="font-size: 17px; color: #0a3d62;font-family: 'Rubik', sans-serif;">
						<div class="text-md-center">
							<ul>
								<li ><b style="color: #c0392b">Once you start the quiz you cannot read the instructions again. Read carefully.</b></li><br>
								<li>Once you click on <span style="color:green;">Start Quiz</span> if you try to restart <span style="color: red;"> your session will expire and you will be Logged Out.</span></li><br>
								<li>Total number of Questions: 5</li><br>
								<li>Marks granted for each correct answer: 2</li><br>
								<li>No negative marking for wrong answers.</li><br>
								<li>All questions are compulsory.</li><br>
								<li>Clicking on the answer will only display the next question.</li>
							</ul><br>
						</div>
						<div style="display: block; margin-right: auto; margin-left: auto;" class="text-md-center">
							<a href="quizstart.php?id=<?php echo $user_id; ?>&n=1" class="btn btn-large btn-success">Start Quiz</a>
							<a href="logout.php?id=<?php echo $user_id; ?>" class="btn btn-large btn-danger text-md-center">Logout</a>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
	

</body>
</html>