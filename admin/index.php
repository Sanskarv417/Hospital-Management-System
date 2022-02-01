 <?php
    session_start();

    ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Admin Dashboard</title>
     <link rel="stylesheet" href="..\static\style.css" />
     <style>
         .indexmaindiv {
             height: 650px;
             width: 100%;
             display: inline-flex;
             background-image: url("bg2.jpg");
             background-repeat: no-repeat;
             background-size: cover;
         }

         #insubdivhead {
             color: mediumblue;
             font-size: 25px;
             font-family: 'Carter One', cursive;
             padding-left: 38px;
             padding-top: 15px;
         }

         .indextable {
             border-spacing: 28px;
         }

         .indextable td {
             width: 280px;
             background-color: rgba(0, 255, 255, 0.507);
             padding: 20px;
             border: 1.5px solid mediumblue;
         }

         .indextable td a {
             text-decoration: none;
             color: red;
             font-size: 17px;
             font-family: 'Carter One', cursive;
             padding-left: 160px;

         }

         .indextable td #tabp {
             font-size: 20px;
             color: mediumblue;
             font-family: 'Carter One', cursive;
         }
     </style>
 </head>

 <body>
     <?php
        include("../include/header.php");

        include("../include/connection.php");
        ?>

     <div class="indexmaindiv">
         <?php
            include("sidenav.php");
            ?>
         <div class="indexsubdiv">
             <p id="insubdivhead"> ADMIN DASHBOARD </p>

             <table class="indextable">
                 <tr>
                     <td>
                         <?php
                            $ad = mysqli_query($connect, "SELECT *FROM admin");

                            $num = mysqli_num_rows($ad);
                            ?>
                         <p id="tabp"><?php echo $num; ?></p>
                         <p id="tabp">Total</p>
                         <p id="tabp">Admin</p>
                         <a href="admin.php">CLICK HERE!!</a>
                     </td>
                     <td>
                         <?php

                            $doctors = mysqli_query($connect, "SELECT * FROM doctors WHERE status='Approved'");

                            $num2 = mysqli_num_rows($doctors);

                            ?>
                         <p id="tabp"><?php echo $num2; ?></p>
                         <p id="tabp">Total</p>
                         <p id="tabp">Doctors</p>
                         <a href="doctor.php">CLICK HERE!!</a>
                     </td>
                     <td>
                         <?php

                            $p = mysqli_query($connect, "SELECT * FROM patient");

                            $pp = mysqli_num_rows($p);

                            ?>
                         <p id="tabp">
                             <?php
                                echo $pp;
                                ?>
                         </p>
                         <p id="tabp">Total</p>
                         <p id="tabp">Patients</p>
                         <a href="patient.php">CLICK HERE!!</a>
                     </td>
                 </tr>

                 <tr>
                     <td>
                         <?php

                            $re = mysqli_query($connect, "SELECT * FROM report");

                            $rep = mysqli_num_rows($re);

                            ?>
                         <p id="tabp"><?php echo $rep; ?></p>
                         <p id="tabp">Total</p>
                         <p id="tabp">Report</p>
                         <a href="report.php">CLICK HERE!!</a>
                     </td>
                     <td>
                         <?php

                            $job = mysqli_query($connect, "SELECT * FROM doctors WHERE status='Pending'");

                            $num1 = mysqli_num_rows($job);

                            ?>
                         <p id="tabp"><?php echo $num1; ?></p>
                         <p id="tabp">Total</p>
                         <p id="tabp">Job Request</p>
                         <a href="job_request.php">CLICK HERE!!</a>
                     </td>
                     <td>
                         <?php

                            $in = mysqli_query($connect, "SELECT sum(amount_paid) as profit FROM income");

                            $row = mysqli_fetch_array($in);

                            $inc = $row['profit'];


                            ?>
                         <p id="tabp"><?php echo "$inc"; ?></p>
                         <p id="tabp">Total</p>
                         <p id="tabp">Income</p>
                         <a href="income.php">CLICK HERE!!</a>
                     </td>
                 </tr>
             </table>
         </div>

 </body>

 </html>