<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Check Patient Appointment</title>
	<style>
		.docdismain {
            display: inline-flex;
            width: 100%;
            height: 650px;
            background-image: url("bg2.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }

		.docdissub1 {
            margin-top: 10px;
            padding-top: 20px;
            padding-left: 20px;
            border: 2px solid mediumblue;
            background-color: rgba(0, 255, 255, 0.507);
            height: 370px;
            width: 450px;
			overflow: scroll;
        }

		.docdissub2 {
            margin-top: 10px;
            padding-top: 20px;
            padding-left: 20px;
            border: 2px solid mediumblue;
            background-color: rgba(0, 255, 255, 0.507);
            height: 200px;
            width: 450px;
			overflow: scroll;
        }

		.spacesi {
            margin-right: 20px;
        }

		#invohead{
            color: red;
            font-size: 18.5px;
            font-family: 'Carter One', cursive;
            padding-top: 5px;
            padding-bottom: 5px;
            text-decoration: underline;
        }

		#toapphead{
			color: red;
            font-size: 18.5px;
            font-family: 'Carter One', cursive;
            padding-top: 5px;
            padding-bottom: 5px;
            text-decoration: underline;
			padding-left: 15px;
		}

        #appdethead{
            color: mediumblue;
            font-size: 17px;
            font-family: 'Carter One', cursive;
            padding-top: 5px;
            text-decoration: underline;
            padding-left: 15px;
        }

		.disformfield label{
            font-family: 'Carter One', cursive;
			color: mediumblue;
			font-size: 17px;
			padding-right: 4px;
        }

        .spaced{
            margin-top: 10px;
            margin-bottom: 10px;
        }

		       
        .pbtm{
            background: red;
			width: 160px;
			margin-top: 8px;
			color: white;
			font-size: 16px;
			border: 1px solid white;
			font-family: 'Carter One', cursive;
			margin-bottom: 8px;
        }

        .pbtm:hover{
            background: white;
			color: red;
			border: 1px solid red;
        }

		input[type="text"],
		input[type="number"] {
			font-family: 'Carter One', cursive;
			border: 1px solid mediumblue;
			width: 200px;
		}

		.distab {
			border-spacing: 14px;
		}

		.distab td,
		.distab  th {
			border-bottom: 1px solid mediumblue;
		}

		.distab tr {
			color: mediumblue;
			font-size: 17px;
			font-family: 'Carter One', cursive;
		}
	</style>
</head>

<body>
	<?php
	include("../include/header.php");
	include("../include/connection.php");
	?>

	<div class="docdismain">
		<div class="sidepart spacesi">
			<?php
			include("sidenav.php");
			?>
		</div>
		<div class="docdissub1 spacesi">
			<p id="toapphead">Total Appointment</p>

			<?php
			if (isset($_GET['id'])) {
				$id = $_GET['id'];

				$query = "SELECT * FROM appointment WHERE id='$id'";

				$res = mysqli_query($connect, $query);

				$row = mysqli_fetch_array($res);
			}
			?>


			<p id="appdethead">Appointment Details</p>
			<table class="distab">
				<tr>
					<td>Firstname</td>
					<td><?php echo $row['firstname']; ?></td>
				</tr>

				<tr>
					<td>surname</td>
					<td><?php echo $row['surname']; ?></td>
				</tr>

				<tr>
					<td>gender</td>
					<td><?php echo $row['gender']; ?></td>
				</tr>

				<tr>
					<td>Phone No.</td>
					<td><?php echo $row['phone']; ?></td>
				</tr>

				<tr>
					<td>Appointment Date</td>
					<td><?php echo $row['appointment_date']; ?></td>
				</tr>

				<tr>
					<td>Symptoms</td>
					<td><?php echo $row['symptoms']; ?></td>
				</tr>
			</table>
		</div>
		<div class="docdissub2 spacesi">
			<p id="invohead">Invoice</p>

			<?php
			if (isset($_POST['send'])) {

				$fee = $_POST['fee'];
				$des = $_POST['des'];

				if (empty($fee)) {
				} else if (empty($des)) {
				} else {

					$doc = $_SESSION['doctor'];

					$fname = $row['firstname'];

					$query = "INSERT INTO income(doctor,patient,date_discharge,amount_paid,description) VALUES('$doc','$fname',NOW(),'$fee','$des')";

					$res = mysqli_query($connect, $query);

					if ($res) {
						echo "<script>alert('You have sent Invoice')</script>";

						mysqli_query($connect, "UPDATE appointment SET status='Discharge' WHERE id='$id'");
					}
				}
			}
			?>

			<form method="post">
			<div class="disformfield spaced">
				<label>Fee</label>
				<input type="number" name="fee" class="#" autocomplete="off" placeholder="Enter Patient Fee">
			</div>
			<div class="disformfield spaced">
				<label>Description</label>
				<input type="text" name="des" class="#" autocomplete="off" placeholder="Enter Deccription">
			</div>
				<input type="submit" name="send" class="pbtm" value="Send">
			</form>
		</div>
	</div>

</body>

</html>