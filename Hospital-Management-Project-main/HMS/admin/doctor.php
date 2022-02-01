<?php

session_start();

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Total Doctors</title>
	<style>
		.adpatmain{
			display: inline-flex;
            width: 100%;
			height: 650px;
            background-image: url("bg2.jpg");
            background-repeat: no-repeat;
            background-size: cover;
		}

		.adpatcontent{
			margin-top: 10px;
            padding-left: 20px;
            border: 2px solid mediumblue;
            background-color: rgba(0, 255, 255, 0.507);
        	height: 450px;
            width:1120px;
			overflow: scroll;
		}

		#totpathead{
			color: red;
            font-size: 18.5px;
            font-family: 'Carter One', cursive;
            padding-top: 10px;
            text-decoration: underline;
            padding-left: 15px;
		}

		#nojobhead{
			color: mediumblue;
            font-size: 17px;
            font-family: 'Carter One', cursive;
            padding-top: 10px;
            text-decoration: underline;
            padding-left: 15px;
		}

		.adpattab {
			border-spacing: 14px;
		}

		.adpattab th {
			border-bottom: 1px solid red;
		}

		.adpattab td {
			border-bottom: 1px solid mediumblue;
		}

		.adpattab th{
			color: red;
			font-size: 17px;
			font-family: 'Carter One', cursive;
			text-align: left;
		}

		.adpattab td {
			color: mediumblue;
			font-size: 14px;
			font-family: 'Carter One', cursive;
			text-align: left;
		}

		.vbtm{
            background: mediumblue;
			width: 100px;
			margin-top: 8px;
			color: white;
			font-size: 14px;
			border: 1px solid white;
			font-family: 'Carter One', cursive;
			margin-bottom: 8px;
        }

        .vbtm:hover{
            background: white;
			color: mediumblue;
			border: 1px solid mediumblue;
        }

	</style>
</head>

<body>

	<?php

	include("../include/header.php");
	include("../include/connection.php");

	?>


	<div class="adpatmain">
		<div class="sidepart">
			<?php
			include("sidenav.php");
			?>
		</div>
		<div class="adpatcontent">
			<p id="totpathead">Total Doctors</p>

			<?php

			$query = "SELECT * FROM doctors WHERE status='Approved'";

			$res = mysqli_query($connect, $query);

			$output = "";

		
			if (mysqli_num_rows($res) < 1) {

				$output .= "

		
				<p id='nojobhead'>No Job Requests Yet.</p>
		

		";
			}
			else{
				$output .= "
	
				<table class='adpattab'>
				
				<tr>
					<th>ID</th>
					<th>Firstname</th>
					<th>Surname</th>
					<th>Username</th>
					<th>Gender</th>
					<th>Phone</th>
					<th>Country</th>
					<th>Salary</th>
					<th>Date Registered</th>
					<th>Action</th>
		
				</tr>
			";
		
			}

			while ($row = mysqli_fetch_array($res)) {

				$output .= "

		<tr>
			<td>" . $row['id'] . "</td>
			<td>" . $row['firstname'] . "</td>
			<td>" . $row['surname'] . "</td>
			<td>" . $row['username'] . "</td>
			<td>" . $row['gender'] . "</td>
			<td>" . $row['phone'] . "</td>
			<td>" . $row['country'] . "</td>
			<td>" . $row['salary'] . "</td>
			<td>" . $row['data_reg'] . "</td>
			<td>
				<a href='edit.php?id=" . $row['id'] . "'>
					<button class='vbtm'>Edit</button>
				</a>
					
			</td>
		</tr>

		";
			}

			$output .= "

	</tr>
	</table>
	
	";

			echo $output;


			?>

		</div>
	</div>


</body>

</html>