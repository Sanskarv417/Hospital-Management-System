<?php 
   include("include/connection.php");

   if(isset($_POST['create'])){

   	  $fname = $_POST['fname'];
   	  $sname = $_POST['sname'];
   	  $uname = $_POST['uname'];
   	  $email = $_POST['email'];
   	  $phone = $_POST['phone'];
   	  $gender = $_POST['gender'];
   	  $country = $_POST['country'];
   	  $password = $_POST['pass'];
   	  $con_pass = $_POST['con_pass'];


   	  $error = array();

   	  if(empty($fname)){
   	  	$error['ac'] = "Enter Firstname";
   	  }else if(empty($sname)){
   	  	$error['ac'] = "Enter Surname";
   	  }else if(empty($uname)){
   	  	$error['ac'] = "Enter Username";
   	  }else if(empty($email)){
   	  	$error['ac'] = "Enter Email";
   	  }else if(empty($phone)){
   	  	$error['ac'] = "Enter Phone Number";
   	  }else if($gender == ""){
   	  	$error['ac'] = "Select Your Gender";
   	  }else if($country == ""){
   	  	$error['ac'] = "Select Your Country";
   	  }else if(empty($password)){
   	  	$error['ac'] = "Enter Password";
   	  }else if($con_pass != $password){
   	  	$error['ac'] = "Both password do not match";
   	  }

   	  if(count($error)==0){

   	  	$query = "INSERT INTO patient(firstname,surname,username,email,phone,gender,country,password,date_reg,profile) VALUES('$fname','$sname','$uname','$email','$phone','$gender','$country','$password',NOW(),'patient.jpg')";

   	  	$res = mysqli_query($connect,$query);

   	  	if($res){

   	  		header("Location:patientlogin.php");
   	  	}else{
   	  		echo "<script>alert('failed')</script>";
   	  	}
   	  }
		 else{
			 echo $error['ac'];
		 }

   }

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Create Account</title>
	<link rel="stylesheet" href="static\style.css" />
	<style>
		.accountmain {
			margin-top: 20px;
			width: 500px;
            height: 500px;
            margin-left: 400px;
            text-align: center;
            border: 1px solid mediumblue;
            background-color: #1facf88c;
		}

		.accountmain #acchead{
			color: red;
            font-size: 25px;
            font-family: 'Carter One', cursive;
            margin-top: 11px;
            margin-bottom: 11px;
		}

		.accfield label{
			font-family: 'Carter One', cursive;
            color: red;
            font-size: 18px;
            padding-right: 4px;
		}

		input[type="text"],
        input[type="password"],
        input[type="email"] {
            font-family: 'Carter One', cursive;
            border: 1px solid red;
            width: 200px;
        }

		.space2{
			margin-top: 8px;
		}

		.accbtm {
            background: red;
            width: 160px;
            margin-top: 12px;
            color: white;
            font-size: 18px;
            border: 1px solid white;
            font-family: 'Carter One', cursive;
            margin-bottom: 9px;
        }

        .accbtm:hover {
            background: white;
            color: red;
            border: 1px solid mediumblue;
        }

		.accountmain #alreadyacc{
            color: mediumblue;
            font-family: cursive;
            font-size: 18px;
            font-weight:bolder;
			margin-bottom: 7px;
        }

        .accountmain #alreadyacc a{
            color: red;
        }

        .accountmain #alreadyacc a:hover{
            color: white;
        }
	</style>
</head>
<body style="background-image: url(image/bg2.jpg); background-repeat: no-repeat; background-size:cover;">

<?php
	include("include/header.php");
	?>

	<div class="accountmain">
		<p id="acchead"> CREATE ACCOUNT </p>

		<form method="post">
			<div class="accfield space2">
				<label>Firstname</label>
				<input type="text" name="fname" class="#" autocomplete="off" placeholder="Enter Firstname">
			</div>

			<div class="accfield space2">
				<label>Surname</label>
				<input type="text" name="sname" class="#" autocomplete="off" placeholder="Enter Surname">
			</div>

			<div class="accfield space2">
				<label>Username</label>
				<input type="text" name="uname" class="#" autocomplete="off" placeholder="Enter Username">
			</div>

			<div class="accfield space2">
				<label>Email</label>
				<input type="text" name="email" class="#" autocomplete="off" placeholder="Email">
			</div>

			<div class="accfield space2">
				<label>Phone No</label>
				<input type="text" name="phone" class="#" autocomplete="off" placeholder="Enter Phone Number">
			</div>

			<div class="accfield space2">
				<label>Gender</label>
				<select name="gender" class="#">
					<option value="">Select Your Gender</option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
				</select>
			</div>

			<div class="accfield space2">
				<label>Country</label>
				<select name="country" class="#">
					<option value="">Select Your Country</option>
					<option value="USA">USA</option>
					<option value="INDIA">INDIA</option>
				</select>
			</div>

			<div class="accfield space2">
				<label>Password</label>
				<input type="password" name="pass" class="#" autocomplete="off" placeholder="Enter Password">
			</div>

			<div class="accfield space2">
				<label>Confirm Password</label>
				<input type="password" name="con_pass" class="#" autocomplete="off" placeholder="Enter Confirm Password">
			</div>

			<input type="submit" name="create" value="Create Account" class="accbtm" />
			<p id="alreadyacc"> I already have an account. <a href="patientlogin.php">CLICK HERE.</a></p>
			<p id="alreadyacc"> Import from CSV. <a href="import_csv.php"> CLICK HERE. </a></p>
		</form>

	</div>


</body>
</html>