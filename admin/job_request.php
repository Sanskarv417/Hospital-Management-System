
<?php session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Job Request</title>
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
			<p id="jobhead">Job Requests</p>
			

			<div class="show">
				

		


<?php
	
	include('../include/connection.php');
	
	$query = "SELECT * FROM doctors WHERE status='Pending' ";
	$res = mysqli_query($connect,$query);

	$output = "";

	$output .="

	<div style = 'overflow-x:auto; overflow-y:auto;'>
		<table class='jobtab'>
		<tr>
			<th>ID</th>
			<th>Firstname</th>
			<th>Surname</th>
			<th>Username</th>
			<th>Gender</th>
			<th>Phone</th>
			<th>Country</th>
			<th>Date Registered</th>
			

		</tr>
	";

	if(mysqli_num_rows($res) < 1){

		$output .="

		
			<p id = 'nojobhead'>No Job Requests Yet.</p>
		

		";

	}
	if (isset($_GET['id'])) {
		$i = $_GET['id'];

		$query = "update   doctors set status='Rejected' WHERE id='$i'";
		mysqli_query($connect,$query);
		
		
		
		
		
	}
	

	while($row = mysqli_fetch_array($res)){
		$id=$row['id'];

		$output .= "
		

		<tr>
			<td>".$row['id']."</td>
			<td>".$row['firstname']."</td>
			<td>".$row['surname']."</td>
			<td>".$row['username']."</td>
			<td>".$row['gender']."</td>
			<td>".$row['phone']."</td>
			<td>".$row['country']."</td>
			<td>".$row['data_reg']."</td>
			<td>
			
				
						
									<a href='job_request.php?id=$id'><button  class='vbtm'>Reject</button></a>
							
					
			</td>
			<td>
		
									<a href='ajax_approve.php?id=$id'><button  class='vbtm'>Approve</button></a>
			
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
	
	
	<!-- <script type="text/javascript">
		$(document).ready(function(){
			
			

			function show() {
				
				

				$.ajax({
					
					url:"ajax_job_request.php",
					method:"POST",
					success:function(data) {
						
						
						$("#show").html(data);
					}
				});
			}
			show();
		
			$(document).on('click', '.approve', function() {

				var id = $(this).attr("id");

				alert(id);

				$.ajax({
					url: "ajax_approve.php",
					method: "POST",
					data: {id:id},
					success: function(data) {
						show();
					}
				});

			});

			$(document).on('click', '.reject', function() {

				var id = $(this).attr("id");

				alert(id);

				$.ajax({
					url: "ajax_reject.php",
					method: "POST",
					data: {id:id},
					success: function(data) {
						show();
					}
				});

			});


		});
		
	</script> -->


	</div>

</div>
</div>


</body>

</html>