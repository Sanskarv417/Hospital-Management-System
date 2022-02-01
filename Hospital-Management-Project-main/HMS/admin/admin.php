<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Admin Home</title>
	<link rel="stylesheet" href="static\style.css" />
	<style>
		.adminadmain {
			display: inline-flex;
			width: 100%;
			height: 650px;
			background-image: url("bg2.jpg");
			background-repeat: no-repeat;
			background-size: cover;
		}

		.spacesi {
			margin-right: 50px;
			
		}

		#alladminhead,
		#addadminhead {
			color: red;
			font-size: 25px;
			font-family: 'Carter One', cursive;
			padding-left: 10px;
		}

		.alladtab {
			border-spacing: 20px;
			border: 2px solid mediumblue;
			background-color: rgba(0, 255, 255, 0.507);
			
			
		}

		.alladtab td,
		.alladtab th {
			border-bottom: 1px solid mediumblue;
		}

		.alladtab tr {
			color: mediumblue;
			font-size: 17px;
			font-family: 'Carter One', cursive;
		}

		.rembtm,
		.addbtm {
			background: mediumblue;
			width: 140px;
			margin-top: 8px;
			color: white;
			font-size: 16px;
			border: 1px solid white;
			font-family: 'Carter One', cursive;
			margin-bottom: 8px;
		}

		.rembtm:hover,
		.addbtm:hover {
			background: white;
			color: red;
			border: 1px solid red;
		}

		.addadform {
			text-align: left;
			border: 2px solid mediumblue;
			background-color: rgba(0, 255, 255, 0.507);
			padding-left: 5px;
			padding-bottom: 10px;
			width: 400px;
		}

		.spacead {
			margin-top: 20px;
			margin-bottom: 10px;
		}

		.adformfield label {
			font-family: 'Carter One', cursive;
			color: mediumblue;
			font-size: 14px;
			padding-right: 4px;
		}

		input[type="text"],
		input[type="password"] {
			font-family: 'Carter One', cursive;
			border: 1px solid mediumblue;
			width: 200px;
		}

		.adformfield input[type="file"] {
			color: mediumblue;
			font-family: 'Carter One', cursive;
			font-size: 14px;
		}
	</style>
</head>

<body>
	<?php
	include("../include/header.php");
	include("../include/connection.php");
	?>

	<div class="adminadmain">
		<div class="sidepart spacesi">
			<?php
			include("sidenav.php");
			
			?>
		</div>
		<div class="alladmin spacesi">
			<p id="alladminhead">ALL ADMIN</p>

			<?php

			$ad = $_SESSION['admin'];
			
			$query = "SELECT *FROM admin WHERE username !='$ad'";
			$res = mysqli_query($connect, $query);
			
			

			$output = "
			<div style = 'overflow-x:auto;'>				
				<table class='alladtab' >
								<tr>
							<th>ID</th>
							<th>Username</th>
							<th>Remove</th>
							<th>Action</th>
							</tr>
							<tr>
							";


			if (mysqli_num_rows($res) < 1) {
				$output .= "<tr><td colspan='3' class=''>No New Admin</td></tr>";
			}

			while ($row = mysqli_fetch_array($res)) {
				$id = $row['id'];
				$username = $row['username'];

				$output .= "
									<tr>
								<td>$id</td>
								<td>$username</td>
								<td>
									<a href='admin.php?id=$id'><button  class='rembtm'>Remove</button></a>
								</td>
								";
			}

			$output .= "
								</tr>

							</table>
							</div>
								";

			echo $output;
			if (isset($_GET['id'])) {
				$i = $_GET['id'];

				$query = "DELETE  FROM admin WHERE id='$i'";
				mysqli_query($connect,$query);
				
				
				
			}
		
			

			

			?>

		</div>
		<div class="addadmin spacesi">
			<?php
			$error = array();
			if (isset($_POST['add'])) {

				$uname = $_POST['uname'];
				$pass = $_POST['pass'];
				$image = $_FILES['img']['name'];



				if (empty($uname)) {
					$error['u'] = "Enter Admin username";
				} else if (empty($pass)) {
					$error['u'] = "Enter Admin password";
				} else if (empty($image)) {
					$error['u'] = "Upload Admin Picture";
				}


				if (count($error) == 0) {

					$q = "INSERT INTO admin(username,password,profile) VAlUES('$uname','$pass','$image')";

					$result = mysqli_query($connect, $q);

					if ($result) {
						move_uploaded_file($_FILES['img']['tmp_name'], $image);
						
					} else {
					}

				}

			}



			if (isset($error['u'])) {
				$er = $error['u'];

				$show = "<p id='msg'>$er</p>";
			} else {
				$show = "";
			}


			?>
			<p id="addadminhead">ADD ADMIN</p>
			<div class="addadform">
				<form method="post" enctype="multipart/form-data">
					<div>
						<?php
						echo "$show"; ?>
					</div>
					<div class="adformfield spacead">
						<label>Username</label>
						<input type="text" name="uname" class="" autocomplete="off">
					</div>
					<div class="adformfield spacead">
						<label>Password</label>
						<input type="password" name="pass" class="">
					</div>
					<div class="adformfield spacead">
						<label>Add Admin Picture</label>
						<input type="file" name="img" class="">
					</div>
					<input type="submit" name="add" value="Add" class="addbtm">
				</form>
			</div>
		</div>
	</div>
</body>

</html>