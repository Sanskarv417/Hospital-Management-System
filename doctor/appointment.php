<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Total Appointment</title>
	<style>
		.appointmain {
			display: inline-flex;
			width: 100%;
			height: 650px;
			background-image: url("bg2.jpg");
			background-repeat: no-repeat;
			background-size: cover;
		}

		.appointcontent {
			margin-top: 10px;
			padding-left: 20px;
			border: 2px solid mediumblue;
			background-color: rgba(0, 255, 255, 0.507);
			height: 450px;
			width: 920px;
			overflow: scroll;
		}

		#totpathead {
			color: red;
			font-size: 18.5px;
			font-family: 'Carter One', cursive;
			padding-top: 10px;
			text-decoration: underline;
			padding-left: 15px;
		}

		.docappotab {
			border-spacing: 14px;
		}

		.docappotab td,
		.docappotab th {
			border-bottom: 1px solid red;
		}

		.docappotab th {
			color: red;
			font-size: 17px;
			font-family: 'Carter One', cursive;
			text-align: left;
		}

		.docappotab td {
			color: mediumblue;
			font-size: 14px;
			font-family: 'Carter One', cursive;
			text-align: left;
		}

		#noappointhead{
			padding-left: 15px;
			padding-top: 15px;
			color: mediumblue;
			font-size: 18.5px;
			font-family: 'Carter One', cursive;
			text-decoration: underline;
		}

		.chbtm{
            background: mediumblue;
			width: 100px;
			margin-top: 8px;
			color: white;
			font-size: 14px;
			border: 1px solid white;
			font-family: 'Carter One', cursive;
			margin-bottom: 8px;
        }

        .chbtm:hover{
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


	<div class="appointmain">
		<div class="sidepart">
			<?php
			include("sidenav.php");
			?>
		</div>
		<div class="appointcontent">
			<p id="totpathead">TOTAL APPOINTMENT</p>

			<?php

			$query = "SELECT * FROM appointment WHERE status='pending'";
			$res = mysqli_query($connect, $query);

			$output = "";

			$output .= "

	 				 <table class='docappotab'>
	 				               <tr>
	 				                   <th>ID </th>
	 				                   <th>Firstname< /th>
	 				                   <th>Surname </th>
	 				                   <th>Gender </th>
	 				                   <th>Phone </th>
	 				                   <th>Appointment Date </th>
	 				                   <th>Symptoms </th>
	 				                   <th>Date Booked </th>
	 				                   <th>Action </th>
	 				               </tr> 

	 				 ";

			if (mysqli_num_rows($res) < 1) {

				$output .= "
	 				 	      
	 				 	         <p id='noappointhead'> No Appointment Yet.</p>
	 				 	      

	 				 	";
			}

			while ($row = mysqli_fetch_array($res)) {

				$output = "

	 				 	<tr>
	 				 	     <tr>
	 				    	  <td>" . $row['id'] . "</td>
	 				    	  <td>" . $row['firstname'] . "</td>
	 				    	  <td>" . $row['surname'] . "</td>
	 				    	  <td>" . $row['gender'] . "</td>
	 				    	  <td>" . $row['phone'] . "</td>
	 				    	  <td>" . $row['appointment_date'] . "</td>
	 				    	  <td>" . $row['symptoms'] . "</td>
	 				    	  <td>" . $row['date_booked'] . "</td>
	 				    	  <td>  
	 				    	      <a href='discharge.php?id=" . $row['id'] . "'>
								   <button class='chbtm'> CHECK </button>
	 				    	      </a>
	 				    	  </td>
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