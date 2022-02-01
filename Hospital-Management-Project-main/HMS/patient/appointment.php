<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Book Appointment</title>
	<style>
		.patappmain {
			display: inline-flex;
			width: 100%;
			height: 650px;
			background-image: url("bg2.jpg");
			background-repeat: no-repeat;
			background-size: cover;
		}

		.patappsub {
			margin-top: 10px;
			padding-top: 20px;
			padding-left: 20px;
			border: 2px solid mediumblue;
			background-color: rgba(0, 255, 255, 0.507);
			height: 210px;
			width: 450px;
			overflow: scroll;
		}

		#patapphead{
			color: red;
			font-size: 18.5px;
			font-family: 'Carter One', cursive;
			padding-top: 5px;
			padding-bottom: 5px;
			text-decoration: underline;
		}


		.appformfield label {
			font-family: 'Carter One', cursive;
			color: mediumblue;
			font-size: 17px;
			padding-right: 4px;
		}

		.spaced {
			margin-top: 10px;
			margin-bottom: 10px;
		}

		.bbtm {
			background: red;
			width: 160px;
			margin-top: 8px;
			color: white;
			font-size: 16px;
			border: 1px solid white;
			font-family: 'Carter One', cursive;
			margin-bottom: 8px;
		}

		.bbtm:hover {
			background: white;
			color: red;
			border: 1px solid red;
		}

		input[type="text"],
		input[type="date"] {
			font-family: 'Carter One', cursive;
			border: 1px solid mediumblue;
			width: 200px;
		}
	</style>
</head>

<body>

	<?php
	include("../include/header.php");
	include("../include/connection.php");
	?>

	<div class="patappmain">
		<div class="sidepart">
			<?php
			include("sidenav.php");

			?>
		</div>
		<div class="patappsub">
			<p id="patapphead">Book Appointment</p>

			<?php

			$pat = $_SESSION['patient'];
			$sel = mysqli_query($connect, "SELECT * FROM patient WHERE username='$pat'");

			$row = mysqli_fetch_array($sel);

			$firstname = $row['firstname'];
			$surname = $row['surname'];
			$gender = $row['gender'];
			$phone = $row['phone'];


			if (isset($_POST['book'])) {

				$date = $_POST['date'];
				$sym = $_POST['sym'];

				if (empty($sym)) {
				} else {
					$query = "INSERT INTO appointment(firstname,surname,gender,phone,appointment_date,symptoms,status,date_booked) VALUES('$firstname','$surname','$gender','$phone','$date','$sym','pending',NOW())";

					$res = mysqli_query($connect, $query);

					if ($res) {
						echo "<script>alert('You have booked an appointment.')</script>";
					}
				}
			}

			?>

			<form method="post">
			<div class="appformfield spaced">
				<label>Appointment Date</label>
				<input type="date" name="date" class="#">
			</div>
			<div class="appformfield spaced">
				<label>Symptoms</label>
				<input type="text" name="sym" class="#" autocomplete="off" placeholder="Enter Symptoms">
			</div>
				<input type="submit" name="book" class="bbtm" value="Book Appointment">
			</form>
		</div>
	</div>


</body>

</html>