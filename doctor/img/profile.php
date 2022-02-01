<?php 
    session_start();

    error_reporting(0);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Doctors Profile Page</title>
</head>
<body>

	<?php

	include("../include/header.php");

	?>

	<div class="#">
		<div class="#">
			<div class="#">
				<div class="#" style="#">
					<?php
					include("sidenav.php");
					include("../include/connection.php");
					?>
				</div>
				<div class="#">

					<div class="#">
						<div class="#">
							<div class="#">
								<div class="#">
									
									<?php
									$doc = $_SESSION['doctor'];
									  $query ="SELECT *FROM doctors WHERE username='$doc'";
									  $res = mysqli_query($connect,$query);

									  $row = mysqli_fetch_array($res);

									  if(isset($_POST['upload'])){
									  	$img = $_FILES['img']['name'];

									  	if(empty($img)){

									  	}else{
									  		$query = "UPDATE doctors SET profile='$img' WHERE username='$doc'";

									  		$res = mysqli_query($connect,$query);

									  		if($res){
									  			move_uploaded_file($_FILES['img']['tmp_name'],"img/$img");
									  		}
									  	}
									  }

									?>

									<form method="post" enctype="multipart/form-data">
										<?php

										echo "<img src='img/".$row['profile']."' style="#" class="#">";

										?>

										<input type="file" name="img" class="#">
										<input type="submit" name="upload" class="#" value="Update Profile">
									</form>

									<div class="#">
										<table class="#">
											<tr>
												<th colspan="2" class="#">Details</th>
											</tr>

											<tr>
												<td>Firstname</td>
												<td><?php echo $row['firstname'];
													?>
												</td>
											</tr>
											<tr>
												<td>Surname</td>
												<td><?php echo $row['surname'];
													?>
												</td>
											</tr>
											<tr>
												<td>Username</td>
												<td><?php echo $row['username'];
													?>
												</td>
											</tr>
											<tr>
												<td>Email</td>
												<td><?php echo $row['email'];
													?>
												</td>
											</tr>
											<tr>
												<td>Phone No.</td>
												<td><?php echo $row['phone'];
													?>
												</td>
											</tr>
											<tr>
												<td>Gender</td>
												<td><?php echo $row['gender'];
													?>
												</td>
											</tr>
											<tr>
												<td>Country</td>
												<td><?php echo $row['country'];
													?>
												</td>
											</tr>
											<tr>
												<td>Salary</td>
												<td><?php echo "$".$row['salary']."";
													?>
												</td>
											</tr>

										</table>
										
									</div>

								</div>
								<div class="#">
									<h5 class="#">Change Username</h5>
									<?php

									if(isset($_POST['change_uname'])){

										$uname = $_POST['uname'];

										if(wmpty($uname)){

										}
										else{
											$query = "UPDATE doctors SET username='$uname' WHERE username='$doc'";

											$res = mysqli_query($connect,$query);

											if($res){

												$_SESSION['doctor'] = $uname;
											}

										}

									}

									?>
									<form method="post">
										<label>Change Username</label>
										<input type="text" name="uname" class="#" autocomplete="off" placeholder="Enter Username">
										<br>
										<input type="submit" name="change_uname" class="#" value="Change Username">
									</form>
									<br><br>

									<h5 class="#">Change Password</h5>

									<?php

									if($_POST['change_pass']){

										$old = $_POST['old_pass'];
										$new = $_POST['new_pass'];
										$con = $_POST['con_pass'];

										$ol = "SELECT *FROM doctors WHERE username'$doc'";
										$ols = mysqli_query($connect,$ol);
										$row = mysqli_fetch_array($ols);

										if($ols != $row['password']){

										}else if(empty($new)){

										}else if($con != $new){

										}else{
											$query = "UPDATE doctors SET password='$new' WHERE username='$doc'";
											mysqli_query($connect,$query);
										}

									}

									 ?>
									<form method="post">
										<div class="#">
											<label>Old Password</label>
											<input type="password" name="old_pass" class="#" autocomplete="off" placeholder="Enter Old Password">
										</div>
										<div class="#">
											<label>New Password</label>
											<input type="password" name="new_pass" class="#" autocomplete="off" placeholder="Enter New Password">
										</div>
										<div class="#">
											<label>Confirm Password</label>
											<input type="password" name="confirm_pass" class="#" autocomplete="off" placeholder="Enter Confirm Password">
										</div>
										<input type="submit" name="change_pass" class="#" value="Change Password">
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>			

</body>
</html>