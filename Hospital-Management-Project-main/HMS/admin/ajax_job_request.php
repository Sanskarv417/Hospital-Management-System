


<?php
	session_start();
	include('../include/connection.php');
	
	$query = "SELECT * FROM doctors WHERE status='Pending' ";
	$res = mysqli_query($connect,$query);

	$output = "";

	$output .="

		<table class='#'>
		<!--replace # with a table class-->
		<tr>
			<th>ID</th>
			<th>Firstname</th>
			<th>Surname</th>
			<th>Username</th>
			<th>Gender</th>
			<th>Phone</th>
			<th>Country</th>
			<th>Date Registered</th>
			<th>Action</th>

		</tr>
	";

	if(mysqli_num_rows($res) < 1){

		$output .="

		<tr>
			<td colspan='10' class=''>No Job Requests Yet.</td>
		</tr>

		";

	}
	

	while($row = mysqli_fetch_array($res)){

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
			<div class='#'>
				<div class='#'>
					<div class=''>
						<button id='".$row['id']."' class='#'>Approve<button>
						<!--replace # with a button class-->
					</div>
					<div>
						<button id='".$row['id']."' class='#'>Reject<button>
						<!--replace # with a button class-->
					</div>
				</div>
			</div>
			</td>
		</tr>
		

		";

	}

	$output.="
	
	
	</table>

	";

	echo $output;
	?>