# Quiz App

## About
This Application follows the basic norms of a quiz - questions come serially, one after another; you get only one chance to attempt a question at one go, you cannot retry an already answered question. This quiz however has no time bound. 

This project primarily contains php and html including some tinge of css, bootstrap, jQuery and mysql. 

The backend consists of a local database. Only registered users can login and play the quiz. The option panel turns red if the answer is correct, green if its incorrect. An instructio page illustrates the usage to the users.

Watch the demo video below


https://user-images.githubusercontent.com/69254860/231437384-256e9ccb-362a-46d7-9f2b-06a31d6061c4.mp4


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
#### login.php - The login page 
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

