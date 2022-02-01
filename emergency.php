
<?php


$show="";
include("include/connection.php");
if (isset($_POST['emergency'])){
    $name = $_POST['name'];
    $mobile= $_POST['cnumber'];
    $address=$_POST['address'];
    $pin=$_POST['pin'];
    $desc=$_POST['desc'];
    

    $error=array();

    if(empty($name)){
        $error['emergency']="Enter Name";
    }
    else
    if(empty($mobile)){
        $error['emergency']="Enter Contact Number";
    }
    else
    if(empty($address)){
        $error['emergency']="Enter Address";
    }
    else
    if(empty($pin)){
        $error['emergency']="Enter Pincode";
    }
   

    if(count($error)==0){

        $query="INSERT INTO emergency(name,mobile,address,pincode,description,date_reg,status) VALUES ('$name','$mobile','$address','$pin','$desc',NOW(),'Pending')";

        $result=mysqli_query($connect,$query);

        if(isset($result)){
            echo "<script>alert('Ambulance will come soon.')</script>";
          
        }
        else{
            echo "<script>alert('Try Again')</script>";

        }

        if(isset($result)){
           
           header("Location: index.php");
        }

    }
    if(isset($error['emergency'])){
        $s=$error['emergency'];

        $show="<h4 class=''>$s</h4>";
    }
    else{
        $show="";
    }
}

    

?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emergency</title>
    <link rel="stylesheet" href="static\style.css" />
    <style>
        .applymain {
            margin-top: 150px;
            width: 40%;
            height: auto;
            margin-left: 30%;
            text-align: center;
            border: 1px solid mediumblue;
            background-color: #1facf88c;
        }

        .applymain .applyhead {
            color: red;
            font-size: 25px;
            font-family: 'Carter One', cursive;
            margin-top: 15px;
            margin-bottom: 15px;
        }

        .applyfield label {
            font-family: 'Carter One', cursive;
            color: red;
            font-size: 18px;
            padding-right: 4px;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"] {
            font-family: 'Carter One', cursive;
            border: 1px solid red;
            width: 200px;
        }

        .space {
            margin-top: 10px;
        }

        .applybtn {
            background: red;
            width: 160px;
            margin-top: 15px;
            color: white;
            font-size: 18px;
            border: 1px solid white;
            font-family: 'Carter One', cursive;
            margin-bottom: 10px;
        }

        .applybtn:hover {
            background: white;
            color: red;
            border: 1px solid mediumblue;
        }

        .applymain #alreadyacc{
            color: red;
            font-family: cursive;
            font-size: 17px;
            font-weight: bolder;
        }

        .applymain #alreadyacc a{
            color: mediumblue;
        }

        .applymain #alreadyacc a:hover{
            color: white;
        }

    </style>
</head>
<body >

        <?php
            include("include/header.php");
        ?>

    <div class="applymain">
        <p class="applyhead"> 🛑Emergency🛑 </p>

        <?php
            echo "<p class='applyhead'> $show </p>";
        ?>


        <form method="POST" enctype="multipart/form-data">

             <div class="applyfield space">
                <label>Name: </label>
                <input type="text" name="name" class="" autocomplete="off" placeholder="Enter name">
            </div>

            <div class="applyfield space">
                <label>Contact Number: </label>
                <input type="number" name="cnumber" class="" autocomplete="off" placeholder="Enter phone number">
            </div>

            <div class="applyfield space">
                <label>Address: </label>
                <input type="text" name="address" class="" autocomplete="off" placeholder="Enter address">
            </div>
            <div class="applyfield space">
                <label>Pincode: </label>
                <input type="number" name="pin" class="" autocomplete="off" placeholder="Enter PINCODE">
            </div>

            <!-- <div class="">
                <label>Description: </label>
                <textarea name="description" class="" autocomplete="off" placeholder="Enter description" rows="10" col="100">
            </div> -->
            <div class="applyfield space">
                <label>Description: </label>
                <input type="text" name="desc" class="" autocomplete="off" placeholder="Enter Description">
            </div>

            <input type="submit" name="emergency" class="applybtn" value="Submit">
           
           



    </form>

    </div>
    
</body>
</html>