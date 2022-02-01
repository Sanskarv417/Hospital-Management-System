<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<title>My Invoice</title>
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
			height: 450px;
			width: 750px;
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

		#noinhead{
			padding-left: 15px;
			padding-top: 15px;
			color: mediumblue;
			font-size: 18.5px;
			font-family: 'Carter One', cursive;
			text-decoration: underline;
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


	<div class="patinvomain">
		<div class="sidepart">
			<?php
			include("sidenav.php");
			?>
		</div>
		<div class="patinvosub">
			<p id ="invohead">My Invoice</p>

			<?php
			$pat = $_SESSION['patient'];

			$query = "SELECT * FROM patient WHERE username='$pat'";
			$res = mysqli_query($connect, $query);

			$row = mysqli_fetch_array($res);

			$fname = $row['firstname'];

			$querys = mysqli_query($connect, "SELECT * FROM income WHERE patient='$fname'");

			$output = "";

			$output .= "

	 				         <table class='patinvotab'>
	 				               <tr>
	 				                   <th>ID</th>
	 				                   <th>Doctor</th>
	 				                   <th>Patient</th>
	 				                   <th>Date discharge</th>
	 				                   <th>Amount Paid</th>
	 				                   <th>Description</th>
	 				               </tr>      

	 				   ";

			if (mysqli_num_rows($querys) < 1) {
				$output .= "

	 				    	
	 				    	<p id='noinhead'> No Invoice Yet</p>
	 				    	

	 				    	";
			}


			while ($row = mysqli_fetch_array($querys)) {

				$output .= "

	 				    	<tr>
	 				    	  <td>" . $row['id'] . "</td>
	 				    	  <td>" . $row['doctor'] . "</td>
	 				    	  <td>" . $row['patient'] . "</td>
	 				    	  <td>" . $row['date_discharge'] . "</td>
	 				    	  <td>" . $row['amount_paid'] . "</td>
	 				    	  <td>" . $row['description'] . "</td>
	 				    	  <td>  
	 				    	      <a href='view.php?id=" . $row['id'] . "'>
	 				    	          <button class='vbtm'>View</button>
	 				    	      </a>
	 				    	  </td>

	 				    	";
			}

			$output .= "
	 				        </tr>
	 				    </table>";

			echo $output;
			?>


		</div>
	</div>


</body>

</html>