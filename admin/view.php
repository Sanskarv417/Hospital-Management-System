<?php

session_start();

?>

<!DOCTYPE html>
<html>

<head>
	<title>View Patient Details</title>
	<style>
		.viewmain{
			display: inline-flex;
            width: 100%;
			height: 650px;
            background-image: url("bg2.jpg");
            background-repeat: no-repeat;
            background-size: cover;
		}

		.spacesi {
            margin-right: 20px;
        }

		.viewcontent{
			margin-top: 10px;
            padding-left: 20px;
            border: 2px solid mediumblue;
            background-color: rgba(0, 255, 255, 0.507);
            height: 470px;
            width: 450px;
			overflow: scroll;
		}

		#viewhead{
			color: red;
            font-size: 18.5px;
            font-family: 'Carter One', cursive;
            padding-top: 10px;
            text-decoration: underline;
            padding-left: 15px;
		}

		#detailhead{
            color: mediumblue;
            font-size: 17px;
            font-family: 'Carter One', cursive;
            padding-top: 9px;
            text-decoration: underline;
            padding-left: 15px;
        }

		.patdetailtab {
			border-spacing: 14px;
		}

		.patdetailtab  td,
		.patdetailtab  th {
			border-bottom: 1px solid mediumblue;
		}

		.patdetailtab  tr {
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

	<div class="viewmain">
		<div class="sidepart spacesi">
			<?php
			include("sidenav.php");
			?>
		</div>
		<div class="viewcontent spacesi">
			<p id="viewhead">VIEW PATIENT DETAILS</p>

			<?php

			if (isset($_GET['id'])) {

				$id = $_GET['id'];

				$query = "SELECT * FROM patient WHERE id='$id'";
				$res = mysqli_query($connect, $query);

				$row = mysqli_fetch_array($res);
			}


			?>
			<p id="detailhead">Details</p>
			
			<table class="patdetailtab">
				<tr>
					<td>Firstname</td>
					<td><?php echo $row['firstname']; ?></td>
				</tr>
				<tr>
					<td>Surname</td>
					<td><?php echo $row['surname']; ?></td>
				</tr>
				<tr>
					<td>Username</td>
					<td><?php echo $row['username']; ?></td>
				</tr>
				<tr>
					<td>Email</td>
					<td><?php echo $row['email']; ?></td>
				</tr>
				<tr>
					<td>Phone</td>
					<td><?php echo $row['phone']; ?></td>
				</tr>
				<tr>
					<td>Gender</td>
					<td><?php echo $row['gender']; ?></td>
				</tr>
				<tr>
					<td>Country</td>
					<td><?php echo $row['country']; ?></td>
				</tr>
				<tr>
					<td>Date Registered</td>
					<td><?php echo $row['date_reg']; ?></td>
				</tr>
			</table>
			
		</div>
	</div>

</body>

</html>