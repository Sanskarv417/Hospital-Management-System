<?php
session_start();
	?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
<?php
include("../include/header.php")

	?>
	<div class="container-fliud"></div>
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-2" style="margin-left: -30px;">
				<?php
				include("sidenav.php");
				include(".../include/connection.php");
					?>
			</div>
			<div class="col-md-10">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-6"></div>
					</div>
					<div class="col-md-6">
						<h5 class="text-center">All Admin</h5>

						<?php

							$ad = $_SESSION['admin']
							$query = "SELECT *FROM admin WHERE username !='$ad'";
							$res = mysql_query($connect,$query);

							$output = "
								<table class='table table-bordered'>
								<tr>
							<th>ID</th>
							<th>USername</th>
							<th>Remove</th>
							<th style='width: 10%;'>Action</th>
							<tr>
							";


							if (mysql_num_rows($res) < 1){
								$output .= "<tr><td colspan='3' class='tesxt-center'>No New Admin</td></tr>";
							}

							while ($row = mssql_fetch_array($res)){
								$id = $row['id'];
								$username = $row['username'];

								$output .= "
									<tr>
								<td>$id</td>
								<td>$usename</td>
								<td>
									<a href='admin?id=?id'><button id='$id' class='btn btn-danger remove'>Remove</button></a>
								</td>
								";
							}

							$output .="
								</tr>

							</table>
								";

								echo $output;

								if (isset($_GET['id'])){
									$id= $_GET['id'];

									$query = "DELETE *FROM admin WHERE ID='$id'";
									mysql_query($connect,$query);
								}

							?>

					</div>
					<div class="col-md-6">
						<?php

							if (isset($_POST['add'])){

								$uname = $_POST['uname'];
								$pass = $_POST['pass'];
								$image = $_FILES['img']['name'];

								$error = array();

								if (empty($uname)){
									$error['u'] = "Enter Admin username";
								}else if(empty($pass)){
									$error['u'] = "Enter Admin password";
								}else if(empty($image)){
									$error['u'] = "Enter Admin Picture";
								}
							}

							if (count($error) == 0){

								$q = "INSERT INTO admin(username,password,profile) VAlUES('$uname','$password','$image')";

								$result = mysql_query($connect,$q);

								if ($result) {
									move_uploaded_file($_FILES['img']['tmp_name'], img/$image);
								}
							}

							$er = $error['u'];

							if (isset($error['u'])){
								$er = $error['u'];

								$show = "<h5 class='text-center alert alert-danger'>$er</h5>";
							}else{
								$show = "";
							}

							?>
						<h5 class="text-center">Add Admin</h5>
						<form method="post" enctype="multipart/form-data">
							<div>
								<?php echo $show; ?>
							</div>
							<div class="form-group">
								<label>Username</label>
								<input type="text" name="uname" class="form-control" autocomplete="off">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" name="pass" class="form-control">
							</div>

							<div class="form-group">
								<label>Add Admin Picture</label>
								<input type="file" name="img" class="form-control">
								
							</div><br>
							<input type="submit" name="add" value="Add New Admin" class="btn btn-success">
						</form>
					</div>
				</div> 
			</div>
		</div>
		
	</div>
</body>
</html>