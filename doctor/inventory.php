<?php
session_start();
include("../include/connection.php");




if (isset($_POST['update_instrument'])) {

    $iname = $_POST['instrument_name'];
    $qua = $_POST['quantity'];
    $model = $_POST['model_no'];




    $error = array();

    if (empty($iname)) {
        $error['ac'] = "Enter Instrument Name";
    } else if (empty($qua)) {
        $error['ac'] = "Enter quantity";
    } else if (empty($model)) {
        $error['ac'] = "Enter Model Number";
    }

    if (count($error) == 0) {

        $query = "update inventory
         set quantity=quantity-'$qua'
         where instrument_name='$iname' and model_no='$model'";

        $res = mysqli_query($connect, $query);

        if ($res) {

            header("Location:inventory.php");
        } else {
            echo "<script>alert('failed')</script>";
        }
    }
}

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
            height: 220px;
            width: 450px;
            margin-right: 10px;
            overflow: scroll;
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
            <div class="mdinsub2">
                <p id="upmdinhead">Update Medical Instruments</p>
                <form method="post">
                    <div class="mdinfformfield spaced">
                        <label>Instrument Name</label>
                        <input type="text" name="instrument_name" class="" autocomplete="off" placeholder="Enter Instrument Name" value="<?php if (isset($_POST['instrument_name'])) echo $_POST['instrument_name']; ?>">
                    </div>
                    <div class="mdinfformfield spaced">
                        <label>Quantity Used</label>
                        <input type="number" name="quantity" class="" autocomplete="off" placeholder="Enter quantity" value="<?php if (isset($_POST['quantity'])) echo $_POST['quantity']; ?>">
                    </div>
                    <div class="mdinfformfield spaced">
                        <label>Model Number</label>
                        <input type="text" name="model_no" class="" autocomplete="off" placeholder="Enter Model Number" value="<?php if (isset($_POST['model_no'])) echo $_POST['model_no']; ?>">
                    </div>
                    <input type="submit" name="update_instrument" value="Submit" class="pbtm">
                </form>
            </div>
        </div>
    </div>

</body>

</html>