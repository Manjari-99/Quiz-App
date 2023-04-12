# Quiz App

## About
This Application follows the basic norms of a quiz - questions come serially, one after another; you get only one chance to attempt a question at one go, you cannot retry an already answered question. This quiz however has no time bound. 

This project primarily contains php and html including some tinge of css, bootstrap, jQuery and mysql. 

The backend consists of a local database. Only registered users can login and play the quiz. The option panel turns red if the answer is correct, green if its incorrect. An instructio page illustrates the usage to the users.

Watch the demo video below


https://user-images.githubusercontent.com/69254860/231454899-6d217ab7-e0a1-4d72-93af-21c4d7bae81d.mp4



## Methodology
### XAMPP
XAMPP is a free and open-source cross-platform web server solution stack package.
We will be running Apache and MySql through Xampp for this particular project.
![](/quizz_images/xamppcontrol.png)

### SQL Administration through PhpMyAdmin
Here we have created 5 tables namely:-
* users - To contain the information about registered users.
* score - To contain information about respective scores.
* questions - Admin can control the list of questions to be displayed in the app.
* answers - The options and the correct answer for each question are listed here.
* answered - The status of each gameplay for the corresponding user (insert - update); stores a 0 for wrong input, 1 otherwise

![](/quizz_images/phpmyadmin.png)


### Web Pages 
#### Login - The login page 
This is the first page the user sees.


![](/quizz_images/loginpage.png)

Code:
```
<?php 
session_start();
if(!empty($_SESSION)){
	header('Location:instruction.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Quiz Time</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="style.css">
		<link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">

		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<script type="text/javascript">
	$(document).ready(function(){
		$('.show').click(function(){
			$('.password').attr('type',$(this).is(':checked')?'text':'password');

		});
	});
</script>
<body class="bg-background">
	<nav class="navbar">
		<span>
			<img src="https://www.indianlink.com.au/wp-content/uploads/2020/06/Leeds-round-of-Great-Legal-Quiz-set-for-20-November-800x500_c.png" class="img-responsive" style="height: 30px; width: 30px; border-radius: 15px;"> 
			<a href="#" class="navbar-brand" style="color:#dfe6e9; float: left;"> Quiz Time</a>
		</span>
	</nav>
	<div class="container">
		<div class="row mt-5">
			<div class="col-md-8">
				<p class="font-large text-md-center"  style="color: #dfe6e9;font-family: 'Shadows Into Light', cursive;">Test Yourself !</p>
				<p class="font-med text-md-center"  style="color: #dfe6e9; font-family: 'Shadows Into Light', cursive;">Time for enhancing your IQ</p>
				<img src="https://www.indianlink.com.au/wp-content/uploads/2020/06/Leeds-round-of-Great-Legal-Quiz-set-for-20-November-800x500_c.png" class="image img-responsive">
			</div>
			<div class="col-md-4">
				<div class="card">
					<div class="card-header text-md-center"><h4>Login Here</h4></div>
					<?php

						if(!empty($_GET)){

							if($_GET['err']==1){
								echo "<p style='color:red'>Incorrect email/password</p>";
							}
							if($_GET['err']==2){
								echo "<p style='color:green'>Registration Successful</p>";
							}
							if($_GET['err']==3){
								echo "<p style='color:red'>Reg Failed</p>";
							}
							if($_GET['err']==4){
								echo "<p style='color:red'>Already Registered Account</p>";
							}
						}
					?>
					<div class="card-body card-font">
						<form action="login_validation.php" method="POST">
							<label>Userame:</label><br>
							<input class="form-control" type="text" name="username"><br>
							<label>Email:</label><br>
							<input class="form-control" type="email" name="email"><br>
							<label>Password</label><br>
							<input class="form-control password" type="password" name="password" >
							<input type="checkbox" name="" class="show"> show password<br><br>
							<input type="submit" name="" value="Login" class="btn bg-background btn-block text-white">
							Haven't registered?<a href="#" data-toggle="modal" data-target="#exampleModal">Sign Up</a>
						</form>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="	true">
  	<div class="modal-dialog modal-sm" role="document">
  	  <div class="modal-content">
  	    <div class="modal-header">
  	      <h5 class="modal-title" id="exampleModalLabel">Sign Up Here</h5>
  	      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
  	        <span aria-hidden="true">&times;</span>
  	      </button>
  	  	  </div>
  	    	<div class="modal-body">
  	    		<form action="reg_validation.php" method="POST">
  	      		<label>Userame:</label><br>
  	      		<input class="form-control" type="text" name="username"><br>
  	      		<label>Email:</label><br>
  	      		<input class="form-control" type="email" name="email"><br>
  	      		<label>Password</label><br>
				<input class="form-control password" type="password" name="password">
				<input type="checkbox" name="" class="show"> show password<br><br>
				<input type="submit" name="" value="Sign up" class="btn bg-background btn-block text-white">
  	      	</form>
	      </div>
    	  
    	</div>
  	</div>
	</div>
</body>
</html>
```

#### Login Validation - Validates the log in 

This page uses the concept of SESSION in PHP

```
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
```

#### Registration - If Log in is invalid it takes care of new user registration 
```
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
```

#### Instruction - Contains the rules of the quiz game.

![](/quizz_images/instructions.png)

Code:
```
<?php 
session_start();
if(empty($_SESSION))
	{
		header('Location:login.php');
	}

$conn = mysqli_connect("localhost","root","","quiz");
$_SESSION['score']=0;
$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM score WHERE user_id LIKE $user_id";
$result = mysqli_query($conn,$query);
$result = mysqli_fetch_assoc($result);
if($result['status']==1)
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
								<li>Once you click on <span style="color:green;">Start Quiz</span> if you try to go back to previous questions <span style="color: red;"> your session will expire and you will be Logged Out.</span></li><br>
								<li>Total number of Questions: 5</li><br>
								<li>Marks granted for each correct answer: 2</li><br>
								<li>No negative marking for wrong answers.</li><br>
								<li>All questions are compulsory.</li><br>
								<li>Clicking on the answer will only display the next question.</li><br>
								<li>With every correct answer the option panel turns <span style="color:#247615 ;"> green</span> and with every wrong answer it turns <span style="color:#c23616;">red</span>.</li>
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
```
#### Quiz Start - The code to initiate the quiz and prepare the database in the back end

![](/quizz_images/question.png)

Code:

```
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
<script type="text/javascript">
	$(document).ready(function(){
			$('.ans').mouseenter(function(){
				$(this).css("background-color","#1e3799");

			});
			$('.ans').mouseleave(function(){
				$(this).css("background-color","#2e86de");
			});
			$('a[id]').click(function(evt){
				var response = $(this).attr("id");
				var ans = "<?php echo $result3['ans_id']; ?>";
				if(response === ans)
				{
					$('.card-body').css("background-color","#44bd32");
				}
				else
				{
					$('.card-body').css("background-color","#c23616");
				}

				
        		
    	});
		
	});
</script>
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
								<div class="col-md-6"><a href="evaluate.php?n=<?php echo $index; ?>&ans=<?php echo $id[0];?>" id="<?php echo $id[0]; ?>" class="col-md-12 btn ans" style="background-color:#2e86de; color: white; margin: 10px 10px;"><?php echo $arr[0]; ?></a></div>
								<div class="col-md-6"><a href="evaluate.php?n=<?php echo $index; ?>&ans=<?php echo $id[1];?>" id="<?php echo $id[1]; ?>" class="col-md-12 btn ans" style="background-color:#2e86de; color: white; margin: 10px 10px;"><?php echo $arr[1]; ?></a></div>
								<div class="col-md-6"><a href="evaluate.php?n=<?php echo $index; ?>&ans=<?php echo $id[1];?>" id="<?php echo $id[2]; ?>" class="col-md-12 btn ans" style="background-color:#2e86de; color: white; margin: 10px 10px;"><?php echo $arr[2]; ?></a></div>
								<div class="col-md-6"><a href="evaluate.php?n=<?php echo $index; ?>&ans=<?php echo $id[3];?>" id="<?php echo $id[3]; ?>" class="col-md-12 btn ans" style="background-color:#2e86de; color: white; margin: 10px 10px;"><?php echo $arr[3]; ?></a></div>
								
						</div>
					</div>
				</div>
					
			</div>
			
		</div>
	</div>
	<div class="remark text-md-center" style="color: white;"></div>
</body>
</html>
```


#### Evaluation - For evaluating the scores
```
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
```

#### Score - To display the final scores, leaderboards, user's highest score etc.

![](/quizz_images/score.png)

```
<?php
session_start();
if(empty($_SESSION))
	{
		header('Location:login.php');
	}
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
```

#### Logout 

```
<?php
session_start();
$user_id= $_GET['id'];
$conn = $conn = mysqli_connect("localhost","root","","quiz");
$query1 = "UPDATE score SET status=0 WHERE user_id LIKE $user_id";
$result1 = mysqli_query($conn,$query1);
session_destroy();
header('Location: login.php');
?>
```

#### CSS 

```
.bg-background{
	background: #360033;  /* fallback for old browsers */
	background: -webkit-linear-gradient(to right,#360033,#0b8793);  /* Chrome 10-25, Safari 5.1-6 */
	background: linear-gradient(to right,#360033, #0b8793); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}
.font-large{
	font-size: 80px;
}
.font-med{
	font-size: 60px;
}
.image-sm{
	height: 20px;
	width: 20px;
	border-radius: 10px;

}
.image{
	display: block;
	margin-left: auto;
	margin-right: auto;
	height: 200px;
	width: 200px;
	border-radius: 100px;
}
.card-font{
	background-color:#dfe6e9;
	font-size: 15px;
}

```

### Conclusion

This is a basic hands on with the objective of understanding the entire flow of a web development.
Link to Github Repo - [](https://github.com/Manjari-99/Quiz-App.git)
