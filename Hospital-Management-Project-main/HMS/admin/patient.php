<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
	<title>Total Patient</title>
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
            width:920px;
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

		.adpattab {
			border-spacing: 14px;
		}

		.adpattab td,
		.adpattab  th {
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
			<p id="totpathead">Total Patient</p>

			<?php

			$query = "SELECT * FROM patient";

			$res = mysqli_query($connect, $query);

			$output = "";

			$output .= "
		
	 				  <table class='adpattab'>

	 				               <tr>
	 				                   <th>ID</th>
	 				                   <th>Firstname</th>
	 				                   <th>Surname</th>
	 				                   <th>Username</th>
	 				                   <th>Email</th>
	 				                   <th>Phone</th>
	 				                   <th>Gender</th>
	 				                   <th>Country</th>
	 				                   <th>Date Reg.</th>
	 				               </tr>   
	 				        

						";




			if (mysqli_num_rows($res) < 1) {
				$output .= "
					
	 				    	<p> No Patient Yet</p>
	 				    

	 				    	";
			}


			while ($row = mysqli_fetch_array($res)) {

				$output .= "
						
	 				    	<tr>
	 				    	  <td>" . $row['id'] . "</td>
	 				    	  <td>" . $row['firstname'] . "</td>
	 				    	  <td>" . $row['surname'] . "</td>
	 				    	  <td>" . $row['username'] . "</td>
	 				    	  <td>" . $row['email'] . "</td>
	 				    	  <td>" . $row['phone'] . "</td>
	 				    	  <td>" . $row['gender'] . "</td>
	 				    	  <td>" . $row['country'] . "</td>
	 				    	  <td>" . $row['date_reg'] . "</td>
	 				    	  <td>  
	 				    	      <a href='view.php?id=" . $row['id'] . "'>
	 				    	          <button class='vbtm'>View</button>
	 				    	      </a>
	 				    	  </td>
			
							   ";
				
			}

			$output .= "
			</tr>
			</table>
			"
			;

			echo $output;
			?>


		</div>
	</div>


</body>

</html>