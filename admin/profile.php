<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <style>
        .profmain {
            display: inline-flex;
            width: 100%;
            height: 650px;
            background-image: url("bg2.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }

        .updprofmain {
            margin-top: 10px;
            padding-top: 20px;
            padding-left: 20px;
            border: 2px solid mediumblue;
            background-color: rgba(0, 255, 255, 0.507);
            height: 490px;
            width:450px;
            overflow: scroll;
        }

        #profhead{
            color: red;
            font-size: 16px;
            font-family: 'Carter One', cursive;
            padding-top: 5px;
            padding-bottom: 5px;
            font-size: 20px;
        }

        #chpassshead {
            color: red;
            font-size: 17px;
            font-family: 'Carter One', cursive;
            padding-top: 5px;
            padding-bottom: 5px;
        }

        .profformfield label{
            font-family: 'Carter One', cursive;
			color: mediumblue;
			font-size: 17px;
			padding-right: 4px;
        }

        .spaced{
            margin-top: 10px;
            margin-bottom: 10px;
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

        input[type="text"],
		input[type="password"] {
			font-family: 'Carter One', cursive;
			border: 1px solid mediumblue;
			width: 200px;
		}

        .profformfield input[type="file"] {
			color: mediumblue;
			font-family: 'Carter One', cursive;
			font-size: 17px;
		}

    </style>
</head>

<body>
    <?php
    include("../include/header.php");
    include("../include/connection.php");
    $ad = $_SESSION['admin'];

    $query = "Select *from admin where username='$ad'";
    $res = mysqli_query($connect, $query);

    while ($row = mysqli_fetch_array($res)) {
        $username = $row['username'];
        $profiles = $row['profile'];
    }
    ?>


    <div class="profmain">
        <div class="sidepart">
            <?php
            include("sidenav.php");
            ?>
        </div>

        <div class="updprofmain">
            <p id="profhead"><?php echo $username; ?>'s PROFILE</p>
            <?php
            if (isset($_POST['update'])) {

                $profile = $_FILES['profile']['name'];

                if (empty($profile)) {
                } else {
                    $query = "Update admin Set profile='$profile' where username='$ad'";

                    $result = mysqli_query($connect, $query);

                    if ($result) {
                        move_uploaded_file($_FILES['profile']['tmp_name'], "img/$profile");
                    }
                }
            }
            ?>
            <form method="post" enctype="multipart/form-data">
                <div class="profformfield spaced">
                    <label for="Update Profile">Update Profile</label>
                    <input type="file" name="profile" class="">
                </div>
                <input type="submit" name="update" value="Update" class="pbtm">

            </form>

            <?php

            if (isset($_POST['change'])) {
                $uname = $_POST['uname'];

                if (empty($uname)) {
                } else {
                    $query = "Update admin set username='$uname' where username='$ad'";

                    $res = mysqli_query($connect, $query);

                    if ($res) {
                        $_SESSION['admin'] = $uname;
                    }
                }
            }

            ?>
            <form method="POST">
                <div class="profformfield spaced">
                    <label for="Username">Change Username</label>
                    <input type="text" name="uname" class="" autocomplete="off" />
                </div>
                <input type="submit" name="change" class="pbtm" value="Change" />
            </form>

            <?php
            $show;

            if (isset($_POST['update_pass'])) {


                $old_pass = $_POST['old_pass'];
                $new_pass = $_POST['new_pass'];
                $con_pass = $_POST['con_pass'];

                $error = array();
                $old = mysqli_query($connect, "Select * from admin where username='$ad'");

                $row = mysqli_fetch_array($old);
                $pass = $row['password'];

                if (empty($old_pass)) {
                    $error['p'] = "Enter old password";
                } else
                            if (empty($new_pass)) {
                    $error['p'] = "Enter new password";
                } else
                            if (empty($con_pass)) {
                    $error['p'] = "Confirm Password";
                } else
                            if ($old_pass != $pass) {
                    $error['p'] = "Incorrect Old Password";
                } else
                            if ($new_pass != $con_pass) {
                    $error['p'] = "Both password does not match";
                }

                if (count($error) == 0) {
                    $query = "Update admin set password='$new_pass' where username='$ad'";
                    mysqli_query($connect, $query);
                }
            }
            if (isset($error['p'])) {

                $e = $error['p'];

                $show = "<h5 class='' >$e</h5>";
            } else {
                $show = "";
            }
            ?>

            <p id="chpassshead"> CHANGE PASSWORD </p>
            <form method="post">
                <div class="phpwork">
                    <?php
                    echo $show;
                    ?>
                </div>
                <div class="profformfield spaced">
                    <label for="oldPassword">Old Password</label>
                    <input type="password" name="old_pass" class="">
                </div>

                <div class="profformfield spaced">
                    <label for="newPassword">New Password</label>
                    <input type="password" name="new_pass" class="">
                </div>

                <div class="profformfield spaced">
                    <label for="ConfimPassword">Confirm Password</label>
                    <input type="password" name="con_pass" class="">
                </div>

                <input type="submit" class="pbtm" name="update_pass" value="Update Password">
            </form>
        </div>
    </div>



</body>

</html>