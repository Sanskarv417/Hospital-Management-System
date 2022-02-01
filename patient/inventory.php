<?php
session_start();
include("../include/connection.php");





?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Medical Tools Available</title>
    <style>
        .admdinmain {
            display: inline-flex;
            width: 100%;
            height: 650px;
            background-image: url("bg2.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }

        .admdinsub {
            display: inline-flex;
        }

        .mdinsub1 {
            padding-top: 10px;
            margin-top: 10px;
            padding-left: 20px;
            border: 2px solid mediumblue;
            background-color: rgba(0, 255, 255, 0.507);
            height: 450px;
            width: 520px;
            margin-right: 10px;
            overflow: scroll;
        }

        .mdinsub2 {
            padding-top: 10px;
            margin-top: 10px;
            padding-left: 20px;
            border: 2px solid mediumblue;
            background-color: rgba(0, 255, 255, 0.507);
            height: 210px;
            width: 450px;
            margin-right: 10px;
        }

        #mdinavhead,#admdinhead,#upmdinhead {
            color: red;
            font-size: 18.5px;
            font-family: 'Carter One', cursive;
            padding-top: 0px;
            padding-bottom: 5px;
            padding-left: 5px;
            text-decoration: underline;
        }

        #noinsthead{
            color: mediumblue;
            font-size: 17px;
            font-family: 'Carter One', cursive;
            padding-top: 0px;
            padding-bottom: 5px;
            padding-left: 5px;
            text-decoration: underline;
        }

        .admdintab {
			border-spacing: 5px;
		}

		.admdintab  td {
			border-bottom: 1px solid mediumblue;
            padding: 1px;
		}

        .admdintab th{
			color: red;
			font-size: 16px;
			font-family: 'Carter One', cursive;
			text-align: left;
            border-bottom: 1px solid red;
		}

		.admdintab td {
			color: mediumblue;
			font-size: 12px;
			font-family: 'Carter One', cursive;
			text-align: left;
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
        }

        .pbtm:hover{
            background: white;
			color: red;
			border: 1px solid red;
        }

        .mdinfformfield label{
            font-family: 'Carter One', cursive;
			color: mediumblue;
			font-size: 17px;
			padding-right: 4px;
        }

        input[type="text"],
		input[type="number"] {
			font-family: 'Carter One', cursive;
			border: 1px solid mediumblue;
			width: 200px;
		}

        .spaced{
            margin-top: 10px;
            margin-bottom: 10px;
        }
    </style>

</head>

<body>
    <?php
    include("../include/header.php");
    include("../include/connection.php");

    ?>
    <div class="admdinmain">
        <div class="sidepart">
            <?php
            include("sidenav.php");
            ?>
        </div>
        <div class="admdinsub">
            <div class="mdinsub1">
                <p id="mdinavhead">Medical Instruments Available</p>

                <?php
                $query = "SELECT * FROM inventory";

                $res = mysqli_query($connect, $query);

                $output = "";

                $output .= "

      <table class='admdintab'>
                    <tr>
                        <th>Instrument Id</th>
                        <th>Instrument Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Model Number</th>
                        
                     
                    </tr> 

      ";

                if (mysqli_num_rows($res) < 1) {

                    $output .= "
                
                    <p id='noinsthead'>No Instrument Yet.</p>
                

          ";
                }

                while ($row = mysqli_fetch_array($res)) {

                    $output .= "

          <tr>
               <tr>
               <td>" . $row['instrument_id'] . "</td>
               <td>" . $row['instrument_name'] . "</td>
               <td>" . $row['quantity'] . "</td>
               <td>" . $row['price'] . "</td>
               <td>" . $row['model_no'] . "</td>
              
          </tr>

          ";
                }

                $output .= "</tr></table>";

                echo $output;
                ?>
            </div>
            
        </div>
    </div>

</body>

</html>