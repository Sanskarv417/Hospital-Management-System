
<?php session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Emergency</title>
	<style>
		.adjobmain {
			display: inline-flex;
			width: 100%;
			height: 650px;
			background-image: url("bg2.jpg");
			background-repeat: no-repeat;
			background-size: cover;
		}

		.adjobcontent {
			margin-top: 10px;
			padding-left: 20px;
			border: 2px solid mediumblue;
			background-color: rgba(0, 255, 255, 0.507);
			height: 450px;
			width: 1000px;
			overflow: scroll;
		}

		#jobhead{
			color: red;
			font-size: 18.5px;
			font-family: 'Carter One', cursive;
			padding-top: 10px;
			text-decoration: underline;
			padding-left: 15px;
		}

		.jobtab {
			border-spacing: 14px;
		}

		.jobtab th {
			border-bottom: 1px solid red;
		}

		.jobtab td {
			border-bottom: 1px solid mediumblue;
		}

		.jobtab th {
			color: red;
			font-size: 17px;
			font-family: 'Carter One', cursive;
			text-align: left;
		}

		.jobtab td {
			color: mediumblue;
			font-size: 14px;
			font-family: 'Carter One', cursive;
			text-align: left;
		}

		#nojobhead{
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
	?>


	<div class="adjobmain">
		<div class="sidepart">
			<?php
			include("sidenav.php");
			
			?>
		</div>
		<div class="adjobcontent">
			<p id="jobhead">Emergency</p>
			

			<div class="show">
				

		


<?php
	
	include('../include/connection.php');
	
	$query = "SELECT * FROM emergency WHERE status='Pending' ";
	$res = mysqli_query($connect,$query);

	$output = "";

	

	if(mysqli_num_rows($res) < 1){

		$output .="

		
			<p id = 'nojobhead'>No Emergency case Yet.</p>
		

		";

	}
    else{
        $output .="

	<div style = 'overflow-x:auto; overflow-y:auto;'>
		<table class='jobtab'>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Contact Number</th>
			<th>Address</th>
			<th>Pincode</th>
			<th>Description</th>
			
			<th>Date Registered</th>
			

		</tr>
	";
    }
	if (isset($_GET['id'])) {
		$i = $_GET['id'];

		$query = "update   emergency set status='Done' WHERE id='$i'";
		mysqli_query($connect,$query);
		
		
		
		
		
	}
	

	while($row = mysqli_fetch_array($res)){
		$id=$row['id'];

		$output .= "
		

		<tr>
			<td>".$row['id']."</td>
			<td>".$row['name']."</td>
			<td>".$row['mobile']."</td>
			<td>".$row['address']."</td>
			<td>".$row['pincode']."</td>
			<td>".$row['description']."</td>
			
			<td>".$row['date_reg']."</td>
			<td>
			
				
						
									<a href='emergency.php?id=$id'><button  class='vbtm'>Done</button></a>
							
					
			</td>
			
		</tr>
		

		";

	}

	$output.="
	
	
	</table>
	</div>
	";

	echo $output;
	?>
	
	
	

	</div>

</div>
</div>


</body>

</html>