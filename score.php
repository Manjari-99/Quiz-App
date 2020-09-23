<?php
session_start();
$score = $_SESSION['score'];
$user_id = $_SESSION['user_id'];
$conn = mysqli_connect("localhost","root","","quiz");
$query = "UPDATE score SET status=2 WHERE user_id LIKE $user_id";
$result = mysqli_query($conn,$query);
$query1 = "SELECT * FROM score WHERE user_id LIKE $user_id";
$result1 = mysqli_query($conn,$query1);
$result1 = mysqli_fetch_assoc($result1);
$change=0;
if($result1['score'] < $_SESSION['score'])
{
	$score = $_SESSION['score'];
	$change = 1;
	$query2 = "UPDATE score SET score=$score WHERE user_id LIKE $user_id";
	$result2 = mysqli_query($conn,$query2);
}
$query3 = "SELECT * FROM users WHERE user_id LIKE $user_id";
$result3 = mysqli_query($conn,$query3);
$result3 = mysqli_fetch_assoc($result3);
$ans = $score/2;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Score</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="style.css">

	<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@500&display=swap" rel="stylesheet">

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<script type="text/javascript">
	$(document).ready(function(){
		$('#highscore').hide();
		var choice = '<?php echo $change; ?>';
		if(choice == 1)
		{
			$('#highscore').show();
		}

	});
</script>
<body class="bg-background">
	<nav class="navbar">
		<span>
			<a href="#" class="navbar-brand" style="color:#dfe6e9; float: left;">Quiz Time</a>
		</span>
		<a href="logout.php?id=<?php echo $user_id; ?>"><div style="float: right;" class="btn btn-danger">Logout</div></a>
	</nav>
	<div class="container">
		<div class="row mt-5">
			<div class="col-md-7" style="display: block; margin-left: auto;margin-right: auto;">
				<div class="card" style="color: #0a3d62;font-family: 'Rubik', sans-serif; font-size: 20px;">
					<b><div class="card-header text-md-center" style="font-size: 30px">Quiz Completed</div></b>
					<div class="card-body text-md-center" style="background-color:#C2E7E5;"><?php echo $result3['username']; ?> your score is <?php echo $_SESSION['score']; ?>/10<br>Total <?php echo $ans; ?> out of 5 answers were correct<br><div id="highscore" style="color: green">Your New High Score!</div></div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row mt-5">
			<div class="col-md-7" style="display: block; margin-left: auto;margin-right: auto;">
			<div class="card">
				<div class="card-header text-md-center" style="color: #0a3d62;font-family: 'Rubik', sans-serif; font-size: 20px;">LEADERBOARDS</div>
				<div class="card-body">
					<table class="table text-md-center">
						<tr>
							<th>Rank</th>
							<th>Name</th>
							<th>Score</th>
						</tr>
						<?php
							$query4 = "SELECT * FROM score ORDER BY score DESC";
							$result4 = mysqli_query($conn,$query4);
							$count=1;
							while($row = mysqli_fetch_array($result4))
							{
								echo '<tr>
										<td>'.$count.'</td>
										<td>'.$row['username'].'</td>
										<td>'.$row['score'].'</td>
									<tr>';
									$count++;
							}
						?>
					</table>
				</div>
			</div>
			</div>
		</div>
	</div>


</body>
</html>