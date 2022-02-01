 <?php
	session_start();

	?>
 <!DOCTYPE html>
 <html>

 <head>
 	<meta charset="utf-8">
 	<title>Edit Doctors</title>
	 <style>
		 	.viewmain{
			display: inline-flex;
            width: 100%;
			min-height: 546px;
            background-image: url("bg2.jpg");
            background-repeat: no-repeat;
            background-size: cover;
		}

		.viewcontent{
			margin-top: 10px;
            padding-left: 20px;
            border: 2px solid mediumblue;
            background-color: rgba(0, 255, 255, 0.507);
            height: 500px;
            width: 450px;
			overflow: scroll;
		}

		#viewhead{
			color: red;
            font-size: 18.5px;
            font-family: 'Carter One', cursive;
            padding-top: 10px;
            text-decoration: underline;
            padding-left: 15px;
		}

		#detailhead{
            color: mediumblue;
            font-size: 16px;
            font-family: 'Carter One', cursive;
            padding-top: 9px;
            padding-left: 15px;
        }

		input[type="number"] {
			font-family: 'Carter One', cursive;
			border: 1px solid mediumblue;
			width: 200px;
		}

		
        .profformfield label{
            font-family: 'Carter One', cursive;
			color: mediumblue;
			font-size: 16px;
			padding-right: 4px;
			padding-left: 15px;
        }

        .spaced{
            margin-top: 5px;
            margin-bottom: 5px;
        }

		.pbtm{
            background: red;
			width: 160px;
			margin-top: 8px;
			color: white;
			font-size: 16px;
			border: 1px solid white;
			font-family: 'Carter One', cursive;
			margin-bottom: 8px;
			margin-left: 15px;
        }

        .pbtm:hover{
            background: white;
			color: red;
			border: 1px solid red;
        }
	 </style>
 </head>

 <body>

 	<?php

		include("../include/header.php");
		include("../include/connection.php");

		?>


 	<div class="viewmain">
 		<div class="sidepart">
 			<?php
				include("sidenav.php");
				?>
 		</div>
 		<div class="viewcontent">
 			<p id="viewhead">Edit Doctor</p>

 			<?php

				if (isset($_GET['id'])) {

					$id = $_GET['id'];

					$query = "SELECT * FROM doctors WHERE id='$id'";
					$res = mysqli_query($connect, $query);

					$row = mysqli_fetch_array($res);
				}

				?>

 			<p id="detailhead">ID : <?php echo $row['id']; ?></p>
 			<p id="detailhead">Firstname : <?php echo $row['firstname']; ?></p>
 			<p id="detailhead">Surname : <?php echo $row['surname']; ?></p>
 			<p id="detailhead">Username : <?php echo $row['username']; ?></p>
 			<p id="detailhead">Email : <?php echo $row['email']; ?></p>
 			<p id="detailhead">Phone : <?php echo $row['phone']; ?></p>
 			<p id="detailhead">Gender : <?php echo $row['gender']; ?></p>
 			<p id="detailhead">Country : <?php echo $row['country']; ?></p>
 			<p id="detailhead">Date Registratered : <?php echo $row['data_reg']; ?></p>
 			<p id="detailhead">Salary : $<?php echo $row['salary']; ?></p>
 	
 			<p id="viewhead">Update Salary</p>
 			<?php

				if (isset($_POST['update'])) {

					$salary = $_POST['salary'];

					$q = "UPDATE doctors SET salary='$salary' WHERE id='$id'";
					mysqli_query($connect, $q);
				}

				?>
 			<form method="post">
			 <div class="profformfield spaced">
 				<label>Enter Doctor's Salary</label>
 				<input type="number" name="salary" class="#" autocomplete="off" placeholder="Enter Doctor's Salary" value="<?php echo $row['salary'] ?>">
			 </div>
				 <input type="submit" name="update" class="pbtm" value="Update Salary">
 			</form>

 		</div>
	 </div>
 </body>

 </html>