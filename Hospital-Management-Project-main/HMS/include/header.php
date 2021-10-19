<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="stylesheet" href="static\style.css" />
    <script type="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>

<body style="background-image: url(image/bg.jpg); background-repeat: no-repeat; background-size:cover;">

<div class="upper-container">

        <div class="hms">
          Hospital Management System

        </div>
        <div class="links">
          <?php
          if(isset($_SESSION['admin'])){
            $user =$_SESSION['admin'];
            echo '
            
          <a href="" class="link-doctor" >'.$user.'</a>
          <a href="../admin/logout.php" class="link-patient">Logout</a>
            
            ';

          }
          else{
            echo '
            <a href="adminlogin.php" class="link-admin">Admin</a>
          <a href="" class="link-doctor" >Doctor</a>
          <a href="" class="link-patient">Patient</a>
            ';

          }
          ?>
          
        </div>


    </div>


</body>
</html>
