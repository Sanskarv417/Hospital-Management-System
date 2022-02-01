<?php

session_start();

include("include/connection.php");

if (isset($_POST['login'])) {

    $uname = $_POST['uname'];

    $password = $_POST['pass'];

    $error = array();
    $q = "Select * From doctors where username='$uname' and password='$password'";

    $qq = mysqli_query($connect, $q);
    $row = mysqli_fetch_array($qq);

    if (empty($uname)) {
        $error['doctor'] = "Enter Username";
    } else
       if (empty($password)) {
        $error['doctor'] = "Enter Password";
    } else
       if ($row['status'] == "Pending") {
        $error['doctor'] = "Please Wait For the admin to confirm";
    } else
       if ($row['status'] == "Rejected") {
        $error['doctor'] = "Try again Later";
    }

    if (count($error) == 0) {
        $query = "Select *from doctors where username='$uname' and password='$password'";
        $res = mysqli_query($connect, $query);

        if (mysqli_num_rows($res)) {
            echo "<script>alert('Done')</script>";
            $_SESSION['doctor'] = $uname;
            header("Location:doctor/index.php");
            exit();
        } else {
            echo "<script>alert('Invalid Account')</script>";
        }
    }
}

if (isset($error['doctor'])) {
    $l = $error['doctor'];
    $show = "<h4 class='' >$l</h4>";
} else {
    $show = "";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor LogIn</title>
    <link rel="stylesheet" href="static\style.css" />
    <style>
        .doclog {
            margin-top: 20px;
            width: 500px;
            height: 506px;
            margin-left: 400px;
            text-align: center;
            border: 1px solid mediumblue;
            background-color: #1facf88c;
        }

        .doclog #dochead {
            color: rgba(0, 0, 205, 0.733);
            font-size: 25px;
            font-family: 'Carter One', cursive;
            margin-top: 14px;
            margin-bottom: 6px;
        }

        #msgshow {
            color: red;
            font-size: 14px;
            font-family: 'Carter One', cursive;
            margin-top: 0px;
            margin-bottom: 0px;
        }

        .docfield label {
            font-family: 'Carter One', cursive;
            color: mediumblue;
            font-size: 18px;
            padding-right: 4px;
        }

        .spaced {
            margin-top: 10px;
        }


        input[type="text"],
        input[type="password"] {
            font-family: 'Carter One', cursive;
            border: 1px solid mediumblue;
            width: 200px;
        }

        .docbtm {
            background: mediumblue;
            width: 160px;
            margin-top: 11px;
            color: white;
            font-size: 18px;
            border: 1px solid white;
            font-family: 'Carter One', cursive;
            margin-bottom: 8px;
        }

        .docbtm:hover {
            background: white;
            color: mediumblue;
            border: 1px solid mediumblue;
        }

        .doclog #alreadyacc {
            color: red;
            font-family: cursive;
            font-size: 17px;
            font-weight: bolder;
        }

        .doclog #alreadyacc a {
            color: mediumblue;
        }

        .doclog #alreadyacc a:hover {
            color: white;
        }
    </style>
</head>

<body style="background-image: url(image/bg2.jpg); background-repeat: no-repeat; background-size:cover;">

    <?php
    include("include/header.php");

    ?>

    <div class="doclog">
        <p id="dochead"> DOCTOR LOGIN </p>
        <div id="msgshow">
        <p> <?php
        echo $show;
        ?> </p>

        <img src="image\doclog.png">
        <form method="POST">
            <div class="docfield spaced">
                <label>Username</label>
                <input type="text" name="uname" class="" autocomplete="off" placeholder="Enter Username">
            </div>

            <div class="docfield spaced">
                <label>Password</label>
                <input type="password" name="pass" class="" autocomplete="off" placeholder="Enter your password">
            </div>

            <input type="submit" name="login" class="docbtm" value="Submit">
            <p id="alreadyacc"> I don't have an account. <a href="apply.php">Apply Now!!! </a></p>

        </form>
    </div>


</body>

</html>