<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Header</title>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 
    <script type="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.js"></script>
    <link rel="stylesheet" href="..\static\style.css" />
</head>

<body style="background-image: url(image/bg2.jpg); background-repeat: no-repeat; background-size:cover;">

<div class="upper-container">

        <div class="hms">
          HOSPITAL MANAGEMENT SYSTEM
        </div>
        
        <div class="links">
          <?php
          if(isset($_SESSION['admin'])){
            $user =$_SESSION['admin'];
            echo '
            
          <a href="" class="link-doctor" >'.$user.'</a>
          <a href="../admin/logout.php" class="link-patient">Logout</a>
            
            ';

          }else if(isset($_SESSION['doctor'])){
            $user =$_SESSION['doctor'];
            echo '
            
          <a href="" class="link-doctor" >'.$user.'</a>
          <a href="../doctor/logout.php" class="link-patient">Logout</a>
            
            ';
          }else if(isset($_SESSION['patient'])){
            $user =$_SESSION['patient'];
            echo '
            
          <a href="" class="link-doctor" >'.$user.'</a>
          <a href="../patient/logout.php" class="link-patient">Logout</a>
            
            ';
          }else{
            echo '
            <a href="index.php" class="link-admin">HOME</a>
            <a href="adminlogin.php" class="link-admin">ADMIN</a>
            <a href="doctorlogin.php" class="link-doctor" >DOCTOR</a>
            <a href="patientlogin.php" class="link-patient">PATIENT</a>
            <a href="emergency.php" class="link-admin">EMERGENCY</a>
            ';

          }
          ?>
          
        </div>


    </div>


</body>
</html>
