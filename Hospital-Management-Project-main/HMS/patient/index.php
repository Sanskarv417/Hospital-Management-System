<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
	<title>Patient Dashboard</title>
	<style>
		.indexmaindiv {
			display: inline-flex;
			width: 100%;
			height: 650px;
			background-image: url("bg2.jpg");
			background-repeat: no-repeat;
			background-size: cover;
		}

		.indexsubdiv {
			margin-top: 10px;
			padding-top: 20px;
			padding-left: 20px;
			border: 2px solid mediumblue;
			background-color: rgba(0, 255, 255, 0.507);
			height: 210px;
			width: 450px;
			overflow: scroll;
		}

		#insubdivhead{
			color: red;
			font-size: 18.5px;
			font-family: 'Carter One', cursive;
			padding-top: 5px;
			padding-bottom: 5px;
			text-decoration: underline;
		}


		.informfield label {
			font-family: 'Carter One', cursive;
			color: mediumblue;
			font-size: 17px;
			padding-right: 4px;
		}

		.spaced {
			margin-top: 10px;
			margin-bottom: 10px;
		}

		.sbtm {
			background: red;
			width: 160px;
			margin-top: 8px;
			color: white;
			font-size: 16px;
			border: 1px solid white;
			font-family: 'Carter One', cursive;
			margin-bottom: 8px;
		}

		.sbtm:hover {
			background: white;
			color: red;
			border: 1px solid red;
		}

		input[type="text"],
		input[type="password"] {
			font-family: 'Carter One', cursive;
			border: 1px solid mediumblue;
			width: 200px;
		}
	</style>
</head>

<body>

	<?php
	include("../include/header.php");
	include("../include/connection.php");
	?>

	<?php
	if (isset($_POST['send'])) {
		

		$title = $_POST['send'];
		$message = $_POST['message'];

		if (empty($title)) {
		} 
		else if (empty($message)) 
		{
		} 
		else {

			$user = $_SESSION['patient'];

			$query = "INSERT INTO report(title,message,username,date_send) VALUES('$title','$message','$user',NOW())";

			$res = mysqli_query($connect,$query);

			if ($res) {

				echo "<script>alert('You Have Sent Your Report')</script>";
			}
			else
				{
					echo "<script>alert('Report not send')</script>";
				}
		}
	}

	?>


	<div class="indexmaindiv">
		<div class="sidepart">
			<?php
			include("sidenav.php");
			?>
		</div>
		<div class="indexsubdiv">
			<p id="insubdivhead">Send A Report</p>
			<form method="post">
				<div class="informfield spaced">
					<label>Title</label>
					<input type="text" name="title" autocomplete="off" class="#" placeholder="Enter Title of the report">
				</div>
				<div class="informfield spaced">
					<label>Message</label>
					<input type="text" name="message" autocomplete="off" class="#" placeholder="Enter Message">
				</div>
				<input type="submit" name="send" value="Send Report" class="sbtm">
			</form>
		</div>
	</div>



</body>

</html>