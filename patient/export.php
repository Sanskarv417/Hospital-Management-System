<?php
session_start();
?>
<?php
//export.php
$connect=mysqli_connect("localhost","root","","HMS");
$patient = $_SESSION['patient'];
$query = "SELECT firstname,surname,username,email,phone,gender,country,password FROM patient WHERE username='$patient'";
if (isset($_POST["export"])) {
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=data.csv');
	$output = fopen("php://output","w");
	fputcsv($output, array('firstname','surname','username','email','phone','gender','country','password'));
	$result = mysqli_query($connect, $query);
	$row = mysqli_fetch_array($result);
	$row = array($row['firstname'],$row['surname'],$row['username'],$row['email'],$row['phone'],$row['gender'],$row['country'],$row['password']);

	fputcsv($output, $row);

	fclose($output);
}

?>