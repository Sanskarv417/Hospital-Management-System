<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Patient Profile</title>
	<style>
		.profmain {
			display: inline-flex;
			width: 100%;
			height: 650px;
			background-image: url("bg2.jpg");
			background-repeat: no-repeat;
			background-size: cover;
		}

		.updprofmain {
			margin-top: 10px;
			padding-top: 20px;
			padding-left: 20px;
			border: 2px solid mediumblue;
			background-color: rgba(0, 255, 255, 0.507);
			height: 410px;
			width: 450px;
			overflow: scroll;
		}

		.updformreal {
			margin-top: 10px;
			padding-top: 20px;
			padding-left: 20px;
			border: 2px solid mediumblue;
			background-color: rgba(0, 255, 255, 0.507);
			height: 365px;
			width: 450px;
			overflow: scroll;
		}

		.spacesi {
			margin-right: 10px;
		}


		#chpassshead,
		#chusehead {
			color: red;
			font-size: 18.5px;
			font-family: 'Carter One', cursive;
			padding-top: 5px;
			padding-bottom: 5px;
			text-decoration: underline;
		}

		#profhead {
			color: red;
			font-size: 18.5px;
			font-family: 'Carter One', cursive;
			padding-top: 5px;
			text-decoration: underline;
			padding-left: 15px;
		}

		#detailhead {
			color: red;
			font-size: 17px;
			font-family: 'Carter One', cursive;
			padding-top: 9px;
			text-decoration: underline;
			padding-left: 15px;
		}

		.profformfield label {
			font-family: 'Carter One', cursive;
			color: mediumblue;
			font-size: 17px;
			padding-right: 4px;
		}

		.spaced {
			margin-top: 10px;
			margin-bottom: 10px;
		}

		.pbtm {
			background: red;
			width: 160px;
			margin-top: 8px;
			color: white;
			font-size: 16px;
			border: 1px solid white;
			font-family: 'Carter One', cursive;
			margin-bottom: 8px;
		}

		.pbtm:hover {
			background: white;
			color: red;
			border: 1px solid red;
		}

		.expbtm {
			background: red;
			width: 270px;
			margin-top: 8px;
			margin-left: 15px;
			color: white;
			font-size: 16px;
			border: 1px solid white;
			font-family: 'Carter One', cursive;
			margin-bottom: 8px;
		}

		.expbtm:hover {
			background: white;
			color: red;
			border: 1px solid red;
		}

		input[type="text"],
		input[type="password"] {
			font-family: 'Carter One', cursive;
			border: 1px solid mediumblue;
			width: 200px;
		}

		.docdetailtab {
			border-spacing: 14px;
		}

		.docdetailtab td,
		.docdetailtab th {
			border-bottom: 1px solid mediumblue;
		}

		.docdetailtab tr {
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


	<div class="profmain">
		<div class="sidepart spacesi">
			<?php

			include("sidenav.php");

			$patient = $_SESSION['patient'];
			$query = "SELECT *FROM patient WHERE username='$patient'";

			$res = mysqli_query($connect, $query);

			$row = mysqli_fetch_array($res);

			function array2csv(array &$array)
			{
				if (count($array) == 0) {
					return null;
				}
				$df = fopen("php://output", 'w');
				fputcsv($df, array_keys(reset($array)));
				foreach ($array as $row) {
					fputcsv($df, $row);
				}
			}

			?>
		</div>
		<div class="updprofmain spacesi">

			<?php

			if (isset($_POST['upload'])) {

				$img = $_FILES['img']['name'];

				if (empty($img)) {
				} else {
					$query = "UPDATE patient SET profile = '$img' WHERE username='$patient'";

					$res = mysqli_query($connect, $query);

					if ($res) {
						move_uploaded_file($_FILES['img']['name'], "img/$img");
						$row = mysqli_fetch_array($res);
					}
				}
			}
			?>



			<p id="detailhead">My Details</p>
			<table class="docdetailtab">
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
					<td>Phone Number</td>
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
			</table>

			<form method="post" action="export.php">
				<input type="submit" name="export" value="Download Details as CSV File" class="expbtm"/>
			</form>

		</div>
		<div class="updformreal spacesi">
			<p id="chusehead">Change Username</p>

			<?php

			if (isset($_POST['update'])) {

				$uname = $_POST['uname'];

				if (empty($uname)) {
				} else {
					$query = "UPDATE patient SET username='$patient'";

					$res = mysqli_query($connect, $query);

					if ($res) {

						$_SESSION['patient'] = $uname;
					}
				}
			}


			?>

			<form method="post">
				<div class="profformfield spaced">
					<label>Enter Username</label>
					<input type="text" name="uname" class="#" autocomplete="off" placeholder="Enter Username">
				</div>
				<input type="submit" name="update" class="pbtm" value="Update Username">

			</form>

			<?php

			if (isset($_POST['change'])) {

				$old = $_POST['old_pass'];
				$new = $_POST['new_pass'];
				$con = $_POST['con_pass'];

				$q = "SELECT * FROM patient WHERE username='$patient'";

				$re = mysqli_query($connect, $q);

				$row = mysqli_fetch_array($re);

				if (empty($old)) {
					echo "<script>alert('Enter old password')</script>";
				} else if (empty($new)) {
					echo  "<script>alert('Enter new password')</script>";
				} else if ($con != $new) {
					echo  "<script>alert('Both password do not match')</script>";
				} else if ($old != $row['password']) {

					echo  "<script>alert('Check the password')</script>";
				} else {

					$query = "UPDATE patient SET password='$new' WHERE username='$patient'";

					mysqli_query($connect, $query);
				}
			}

			?>

			<p id="chpassshead">Change Password</p>
			<form method="post">
				<div class="profformfield spaced">
					<label>Old Password</label>
					<input type="password" name="old_pass" class="#" autocomplete="off" placeholder="Enter Old Password">
				</div>
				<div class="profformfield spaced">
					<label>New Password</label>
					<input type="password" name="new_pass" class="#" autocomplete="off" placeholder="Enter New Password">
				</div>
				<div class="profformfield spaced">
					<label>Confirm Password</label>
					<input type="password" name="con_pass" class="#" autocomplete="off" placeholder="Enter Confirm Password">
				</div>
				<input type="submit" name="change" class="pbtm" value="Change Password">
			</form>
		</div>

	</div>


</body>

</html>