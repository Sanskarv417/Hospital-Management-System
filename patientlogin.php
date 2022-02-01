<?php 

session_start();

include("include/connection.php");

if(isset($_POST['login'])){

	$uname = $_POST['uname'];
	$pass =$_POST['pass'];


	if(empty($uname)){
		echo "<script>alert('Enter Username')</script>";
	}else if(empty($pass)){
		echo "<script>alert('Enter Password')</script>";
	}else{

		$query = "SELECT * FROM patient WHERE username='$uname' AND password='$pass'";
		$res = mysqli_query($connect,$query);

		if(mysqli_num_rows($res)==1){

			header("Location: patient/index.php");

			$_SESSION['patient'] = $uname;
			
		}else{
			echo "<script>alert('Invalid Account')</script>";
		}
	}
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Patient Login Page</title>
	<link rel="stylesheet" href="static\style.css" />
	<style>
        .patlog {
            margin-top: 20px;
            width: 500px;
            height: 500px;
            margin-left: 400px;
            text-align: center;
            border: 1px solid mediumblue;
            background-color: #1facf88c;
        }

        .patlog #pathead {
            color: rgba(0, 0, 205, 0.733);
            font-size: 25px;
            font-family: 'Carter One', cursive;
            margin-top: 15px;
            margin-bottom: 15px;
        }


        .patfield label {
            font-family: 'Carter One', cursive;
            color: mediumblue;
            font-size: 18px;
            padding-right: 4px;
        }

        .spacep{
            margin-top: 10px;
        }

        
        input[type="text"],
        input[type="password"]{
            font-family: 'Carter One', cursive;
            border: 1px solid mediumblue;
            width: 200px;
        }

        .patbtm {
            background: mediumblue;
            width: 160px;
            margin-top: 11px;
            color: white;
            font-size: 18px;
            border: 1px solid white;
            font-family: 'Carter One', cursive;
            margin-bottom: 8px;
        }

        .patbtm:hover {
            background: white;
            color: mediumblue;
            border: 1px solid mediumblue;
        }

        .patlog #alreadyacc{
            color: red;
            font-family: cursive;
            font-size: 17px;
            font-weight: bolder;
        }

        .patlog #alreadyacc a{
            color: mediumblue;
        }

        .patlog #alreadyacc a:hover{
            color: white;
        }

    </style>
</head>
<body style="background-image: url(image/bg2.jpg); background-repeat: no-repeat; background-size:cover;">

<?php
	include("include/header.php");

	?>

	<div class="patlog">
		<p id="pathead"> PATIENT LOGIN </p>
		<img src="image\patlog.jpg">
		<form method="post">
			<div class="patfield spacep">
				<label>Username</label>
				<input type="text" name="uname" class="#" autocomplete="off" placeholder="Enter Username">
			</div>

			<div class="patfield spacep">
				<label>Password</label>
				<input type="password" name="pass" class="#" autocomplete="off" placeholder="Enter Password">
			</div>

			<input type="submit" name="login" class="patbtm" value="Login">
			<p id="alreadyacc">I don't have an account.   <a href="account.php">Click here.</a></p>
		</form>
	</div>


</body>
</html>