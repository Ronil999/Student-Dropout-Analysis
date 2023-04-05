<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Register Page of BMS</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link rel="stylesheet" href="register.css">


	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
		integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="./style.css">
</head>

<body>

<?php
    require('db.php');
    // When form submitted, insert values into the database.
    $insert=false;
    if(isset($_REQUEST['username'])){
        // removes backslashes
        $username = $_POST['username'];
        $email    = $_POST['email'];
        $password = $_POST['password'];
		if($username!="" && $email!="" && $password!=""){
        $sql    = "INSERT into `users` (username, password, email, date_time)
                     VALUES ('$username', '" . md5($password) . "', '$email', current_timestamp());";
        $result   = mysqli_query($con, $sql);
		
        if ($result == true) {
                    $insert = true;
        } 
        else {
                echo "ERROR: $sql <br> $con->error";
         }
		}
        } 
?>

<form action="" method="post">
		<div class="box-form">
			<div class="left">
				<div class="overlay">
					<h1>SDA Register</h1><br>
					<p>SDA - Student Dropout analysis</p>
					<span>
						<p>login with social media</p>
						<a href="#"><i class="fa fa-google" aria-hidden="true"></i></a>
						<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
					</span>
				</div>
			</div>


			<div class="right">
				<h5 style="font-size:70px; width:450px">Register</h5>
                
                
                
				<p>Have an account? <a href="/student_dropout_analysis/login/login.php">Login</a></p>

                <?php
                    if($insert == true){
                        echo "<p style='color:green'>You are succesfully register to SDA</p>";
					}
					// else 
					// echo "<p style='color:red'>Enter Valid input</p>";
                        $con->close();
                    
                ?>

				<div class="inputs">
					<input type="text" placeholder="user name" name="username">
					<br>
					<input type="email"  placeholder="email" name="email">
                <br>
					<input type="password" placeholder="password" name="password">
				</div>

				<br><br>

				<button type="submit" name="submit" value="Register">Register</button>
         
				<P> Back to Home <a href="/student_dropout_analysis/index.html">Home</a></P>
				<br>
				<br>
				<br>
			</div>

		</div>
       
	</form>
	<!-- partial -->

</body>

</html>