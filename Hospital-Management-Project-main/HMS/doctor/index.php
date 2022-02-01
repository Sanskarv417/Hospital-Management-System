<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Doctor's Dashboard</title>
	<style>
		.indexmaindiv {
			height: 650px;
			display: inline-flex;
			background-image: url("bg2.jpg");
			background-repeat: no-repeat;
			background-size: cover;
			width: 100%;
		}

		#insubdivhead {
			color: mediumblue;
			font-size: 25px;
			font-family: 'Carter One', cursive;
			padding-left: 38px;
			padding-top: 15px;
		}

		.indextable {
			border-spacing: 28px;
		}

		.indextable td {
			width: 280px;
			background-color: rgba(0, 255, 255, 0.507);
			padding: 20px;
			border: 1.5px solid mediumblue;
		}

		.indextable td a {
			text-decoration: none;
			color: red;
			font-size: 17px;
			font-family: 'Carter One', cursive;
			padding-left: 160px;

		}

		.indextable td a:hover{
			color: yellow;
		}

		.indextable td #tabp {
			font-size: 20px;
			color: mediumblue;
			font-family: 'Carter One', cursive;
		}

		.myprof {
			display: inline-flex;
			padding-top: 15px;
			padding-left: 38px;
		}

		.myprof p {
			font-size: 17px;
			color: mediumblue;
			font-family: 'Carter One', cursive;
			padding-right: 10px;
		}

		.myprof a {
			font-size: 17px;
			color: red;
			font-family: 'Carter One', cursive;
			text-decoration: none;
		}

		.myprof a:hover{
			color: aquamarine;
		}


	</style>
</head>

<body>

	<?php
	include("../include/header.php");

	include("../include/connection.php");
	?>


	<div class="indexmaindiv">
		<?php
		include("sidenav.php");
		?>
		<div class="indexsubdiv">
			<p id="insubdivhead">DOCTOR'S DASHBOARD</p>
			<div class="myprof">
				<p>MY PROFILE:</p>
				<a href="profile.php">VIEW PROFILE!!</a>
			</div>
			<table class="indextable">
				<tr>

					<td>
						<?php
						$p = mysqli_query($connect, "SELECT * FROM patient");

						$pp = mysqli_num_rows($p);
						?>
						<p id="tabp"><?php echo $pp; ?></p>
						<p id="tabp">Total</p>
						<p id="tabp">Patient</p>
						<a href="patient.php">CLICK HERE!!</a>
					</td>

					<td>
						<?php
						$app = mysqli_query($connect, "SELECT * FROM appointment WHERE status='Pending'");

						$appoint = mysqli_num_rows($app);
						?>
						<p id="tabp"><?php echo $appoint; ?></p>
						<p id="tabp">Total</p>
						<p id="tabp">Appointment</p>
						<a href="appointment.php">CLICK HERE!!</a>
					</td>
				</tr>
			</table>
		</div>
	</div>



</body>

</html>