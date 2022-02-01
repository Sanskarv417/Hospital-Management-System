<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
	<title></title>
	<style>
		.adrepmain {
			display: inline-flex;
			width: 100%;
			height: auto;
			background-image: url("bg2.jpg");
			background-repeat: no-repeat;
			background-size: cover;
		}

		.adrepcontent {
			margin-top: 10px;
			padding-left: 20px;
			border: 2px solid mediumblue;
			background-color: rgba(0, 255, 255, 0.507);
			
			height: 440px;
			width: auto;
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


		.adreptab {
			border-spacing: 14px;
		}

		.adreptab td,
		.adreptab th {
			border-bottom: 1px solid red;
		}

		.adreptab th {
			color: red;
			font-size: 17px;
			font-family: 'Carter One', cursive;
			text-align: left;
		}

		.adreptab td {
			color: mediumblue;
			font-size: 14px;
			font-family: 'Carter One', cursive;
			text-align: left;
		}

		#norephead{
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

	<div class="adrepmain">
		<div class="sidepart">
			<?php
			include("sidenav.php");
			?>
		</div>
		<div class="adrepcontent">
			<p id="tothead">Total Report</p>
			<?php

			$query = "SELECT * FROM report";

			$res = mysqli_query($connect, $query);

			$output = "";

			$output .= "
	 				     <table class='adreptab'>
	 				     <tr>
	 				       <th>ID</th>
	 				       <th>Title</th>
	 				       <th>Message</th>
	 				       <th>Username</th>
	 				       <th>Date Send</th>
	 				     </tr>

	 				";

			if (mysqli_num_rows($res) < 1) {
				$output .= "
	 					   
	 					      <p id='norephead'>No Report Yet</p>
	 					   
	 					";
			}

			while ($row = mysqli_fetch_array($res)) {

				$output .= "
	 					   <tr> 
	 					      <td>" . $row['id'] . "</td>
	 					      <td>" . $row['title'] . "</td>
	 					      <td>" . $row['message'] . "</td>
	 					      <td>" . $row['username'] . "</td>
	 					      <td>" . $row['date_send'] . "</td>
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