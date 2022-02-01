<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <link rel="stylesheet" href="static\style.css" />
</head>


<body style="background-image: url(image/bg2.jpg); background-repeat: no-repeat; background-size:cover;">
  
  
  <?php
    include("include/header.php");
  ?>
  <table class="middle-container">






    <tr>

      <td>
        <img class="img-doctor" src="image\doctor.png">
        </br>
        <h3>Doctor</h3>
        <a href="apply.php">
          <button class="btn">Apply Now!!!</button>
        </a>
      </td>
      <td>
        <img class="img-patient" src="image\patient.jpg">
        </br>
        <h3> Patient</h3>
        <a href="account.php">
          <button class="btn">Create Account!!!</button>
        </a>
      </td>
      <td>
        <img class="img-mi" src="image\moreinfo.jpg">
        </br>
        <h3>More Information</h3>
        <a href="info.php">
          <button class="btn">Click here!!!</button>
        </a>
      </td>









    </tr>

  </table>



</body>

</html>
