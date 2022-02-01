<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<title>View Invoice</title>
	<style>
		.patinvomain {
			display: inline-flex;
			width: 100%;
			height: 650px;
			background-image: url("bg2.jpg");
			background-repeat: no-repeat;
			background-size: cover;
		}

		.patinvosub {
			margin-top: 10px;
			padding-left: 20px;
			border: 2px solid mediumblue;
			background-color: rgba(0, 255, 255, 0.507);
			height: 350px;
			width: 350px;
			overflow: scroll;
		}

		#invohead {
			color: red;
			font-size: 18.5px;
			font-family: 'Carter One', cursive;
			padding-top: 10px;
			text-decoration: underline;
			padding-left: 15px;
		}


		.patinvotab {
			border-spacing: 14px;
		}

		
		.patinvotab th {
			border-bottom: 1px solid red;
		}

		.patinvotab td {
			border-bottom: 1px solid mediumblue;
		}

		.patinvotab th {
			color: red;
			font-size: 17px;
			font-family: 'Carter One', cursive;
			text-align: left;
		}

		.patinvotab td {
			color: mediumblue;
			font-size: 14px;
			font-family: 'Carter One', cursive;
			text-align: left;
		}

		#invodethead{
			padding-left: 15px;
			padding-top: 15px;
			color: mediumblue;
			font-size: 18.5px;
			font-family: 'Carter One', cursive;
			text-decoration: underline;
		}

	</style>
</head>

<body>

	<?php
	include("../include/header.php");
	include("../include/connection.php");
	?>


	<div class="patinvomain">
		<div class="sidepart">
			<?php
			include("sidenav.php");
			?>
		</div>
		<div class="patinvosub">
			<p id ="invohead">View Invoice</p>

		
					
						<?php
						if (isset($_GET['id'])) {

							$id = $_GET['id'];

							$query = "SELECT * FROM income WHERE id='$id'";
							$res = mysqli_query($connect, $query);

							$row = mysqli_fetch_array($res);
						}
						?>

						<p id ="invodethead">Invoice Details</p>
						<table class="patinvotab">
							<tr>
								<td>Doctors</td>
								<td><?php echo $row['doctor']; ?></td>
							</tr>

							<tr>
								<td>Patient</td>
								<td><?php echo $row['patient']; ?></td>
							</tr>

							<tr>
								<td>Date Discharge</td>
								<td><?php echo $row['date_discharge']; ?></td>
							</tr>

							<tr>
								<td>Amount Paid</td>
								<td><?php echo $row['amount_paid']; ?></td>
							</tr>

							<tr>
								<td>Description</td>
								<td><?php echo $row['description']; ?></td>
							</tr>
						</table>
				
		
		</div>

	</div>


</body>

</html>