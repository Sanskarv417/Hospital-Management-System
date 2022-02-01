<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
	<title>Total Income</title>
	<style>
		.adinmain {
			display: inline-flex;
			width: 100%;
			background-image: url("bg2.jpg");
			background-repeat: no-repeat;
			background-size: cover;
		}

		.adincontent {
			margin-top: 10px;
			padding-left: 20px;
			border: 2px solid mediumblue;
			background-color: rgba(0, 255, 255, 0.507);
			height: 450px;
			width: 580px;
			overflow: scroll;
		}

		#tothead {
			color: red;
			font-size: 18.5px;
			font-family: 'Carter One', cursive;
			padding-top: 10px;
			text-decoration: underline;
			padding-left: 15px;
		}


		.adintab {
			border-spacing: 14px;
		}

		.adintab td,
		.adintab th {
			border-bottom: 1px solid red;
		}

		.adintab th {
			color: red;
			font-size: 17px;
			font-family: 'Carter One', cursive;
			text-align: left;
		}

		.adintab td {
			color: mediumblue;
			font-size: 14px;
			font-family: 'Carter One', cursive;
			text-align: left;
		}

		#nopatdis{
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


	<div class="adinmain">
		<div class="sidepart">
			<?php
			include("sidenav.php");
			?>
		</div>
		<div class="adincontent">
			<p id="tothead">Total Income</p>

			<?php

			$query = "SELECT * FROM income";

			$res = mysqli_query($connect, $query);

			$output = "";

			$output .= "

	 				   <table class='adintab'>
	 				      <tr>
	 				         <th>ID</th>
	 				         <th>Doctor</th>
	 				         <th>Patient</th>
	 				         <th>Date Discharge</th>
	 				         <th>Amount Paid</th>
	 				      </tr>

	 				   ";

			if (mysqli_num_rows($res) < 1) {

				$output .= "
                             
                                <p id='nopatdis'>No Patient Discharged Yet.</p>
                             
	 				   	";
			}

			while ($row = mysqli_fetch_array($res)) {

				$output .= "

	 				   	<tr>
	 				   	   <td>" . $row['id'] . "</td>
	 				   	   <td>" . $row['doctor'] . "</td>
	 				   	   <td>" . $row['patient'] . "</td>
	 				   	   <td>" . $row['date_discharge'] . "</td>
	 				   	   <td>" . $row['amount_paid'] . "</td>
	 				   	</tr>

	 				   	";
			}

			$output .= "</tr></table>";

			echo $output;

			?>
		</div>
	</div>


</body>

</html>