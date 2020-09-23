<?php
    
	session_start();
	if(empty($_SESSION))
	{
		header('Location:login.php');
	}
	$conn = mysqli_connect("localhost","root","","quiz");
	$user_id = $_GET['id'];

	$q = $_GET['n'];
	$next = $q+1;
	$query2 = "UPDATE answered SET visited$q=1 WHERE user_id LIKE $user_id";
	$result2 = mysqli_query($conn,$query2);

	
	if($next < 6)
	{
		$query6 = "SELECT * FROM answered WHERE user_id LIKE $user_id";
		$result6 = mysqli_query($conn,$query6);
		$result6 = mysqli_fetch_assoc($result6);
		if($result6["visited$next"]==1)
		{
			header('Location:logout.php?id='.$user_id.'');
		}

	}
	$query = "SELECT * FROM users WHERE user_id LIKE $user_id";

	$result = mysqli_query($conn,$query);

	$result = mysqli_fetch_assoc($result);

	$username = $result['username'];

	$query2 = "SELECT * FROM score WHERE user_id LIKE $user_id";

	$result2 = mysqli_query($conn,$query2);

	$num = mysqli_num_rows($result2);
	$result2 = mysqli_fetch_assoc($result2);

	if($num==1){
		if($result2['status']==2)
		{
			header('Location:logout.php?id='.$user_id.'');
		}
		$query1 = "UPDATE score SET status=1 WHERE user_id LIKE $user_id";
		$result1 = mysqli_query($conn,$query1);
		 }
		
	else{
		$query1 = "INSERT INTO score (user_id,username,score,status) VALUES ($user_id,'$username',0,1)";
		$result1 = mysqli_query($conn,$query1);
	}
	 $query3 = "SELECT * FROM questions WHERE q_id LIKE $q";
	 $result3 = mysqli_query($conn,$query3);
	 $result3 = mysqli_fetch_assoc($result3);
	 if(empty($result3))
	 {
	 	header('Location:score.php');
	 }


	 $arr = array("0","0","0","0");
	 $id = array(0,0,0,0);
	 $i=0;
	 $query4 = "SELECT * FROM answers WHERE q_id LIKE $q";
	 $result4 = mysqli_query($conn,$query4);
	 while($row = mysqli_fetch_array($result4))
	 {
	 	$arr[$i] = $row['answer'];
	 	$id[$i] = $row['a_id'];
	 	$i++;
	 }
	 $q++;
	 $query5 = "SELECT * FROM answered WHERE user_id LIKE $user_id";
	 $result5 = mysqli_query($conn,$query5);
	 $result5 = mysqli_fetch_assoc($result5);
	 $index = $q-1; 
?>		
<!DOCTYPE html>
<html>
<head>
	<title>Quiz Page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="style.css">

	<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@500&display=swap" rel="stylesheet">

	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  	crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body class="bg-background">
	<nav class="navbar">
		<span>
			<a href="#" class="navbar-brand" style="color:#dfe6e9; float: left;">Quiz Time</a>
		</span>
		<a href="logout.php?id=<?php echo $user_id; ?>"><div style="float: right;" class="btn btn-danger">Logout</div></a>
	</nav>
	<h1 class="text-md-center" style="color:#dfe6e9; font-size: 50px">All The Best <?php echo $result['username']; ?></h1>
	<div class="container">
		<div class="row mt-5">
			<div class="col-md-7" style="display: block; margin-left: auto;margin-right: auto;">
				<div class="card" style="color: #0a3d62;font-family: 'Rubik', sans-serif; font-size: 20px;">
					<div class="card-header">
						<b><div class="text-md-center q" id="q">Q<?php echo ($q-1); ?>. <?php echo $result3['question']; ?></div></b>
					</div>
					<div class="card-body" style="background-color:#C2E7E5;">
						<div class="row">
								<div class="col-md-6"><a href="evaluate.php?n=<?php echo $index; ?>&ans=<?php echo $id[0];?>"><input type="button" name="<?php echo $id[0]; ?>" value="<?php echo $arr[0]; ?>" class="col-md -6 btn btn-primary" style="margin: 10px 10px;"></a></div>
								<div class="col-md-6"><a href="evaluate.php?n=<?php echo $index; ?>&ans=<?php echo $id[1];?>"><input type="button" name="<?php echo $id[1]; ?>" value="<?php echo $arr[1]; ?>" class="col-md -6 btn btn-primary" style="margin: 10px 10px;"></a></div>
								<div class="col-md-6"><a href="evaluate.php?n=<?php echo $index; ?>&ans=<?php echo $id[2];?>"><input type="button" name="<?php echo $id[2]; ?>" value="<?php echo $arr[2]; ?>" class="col-md -6 btn btn-primary" style="margin: 10px 10px;"></a></div>
								<div class="col-md-6"><a href="evaluate.php?n=<?php echo $index; ?>&ans=<?php echo $id[3];?>"><input type="button" name="<?php echo $id[3]; ?>" value="<?php echo $arr[3]; ?>" class="col-md -6 btn btn-primary" style="margin: 10px 10px;"></a></div>
								
							
					</div>
					</div>

				</div>
				<form>
					
			</div>
			
		</div>
	</div>
</body>
</html>