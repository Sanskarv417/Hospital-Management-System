<?php
session_start();

error_reporting(0);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Doctor Profile Page</title>
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
            height: 470px;
            width: 450px;
            overflow: scroll;
        }

        .updformreal {
            margin-top: 10px;
            padding-top: 20px;
            padding-left: 20px;
            border: 2px solid mediumblue;
            background-color: rgba(0, 255, 255, 0.507);
            height: 350px;
            width: 450px;
            overflow: scroll;
        }

        .spacesi {
            margin-right: 20px;
        }

        
        #chpassshead, #chusehead{
            color: red;
            font-size: 18.5px;
            font-family: 'Carter One', cursive;
            padding-top: 5px;
            padding-bottom: 5px;
            text-decoration: underline;
        }

        #profhead{
            color: red;
            font-size: 18.5px;
            font-family: 'Carter One', cursive;
            padding-top: 5px;
            text-decoration: underline;
            padding-left: 15px;
        }

        #detailhead{
            color: mediumblue;
            font-size: 17px;
            font-family: 'Carter One', cursive;
            padding-top: 9px;
            text-decoration: underline;
            padding-left: 15px;
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

        .docdetailtab {
			border-spacing: 14px;
		}

		.docdetailtab  td,
		.docdetailtab  th {
			border-bottom: 1px solid mediumblue;
		}

		.docdetailtab  tr {
			color: mediumblue;
			font-size: 17px;
			font-family: 'Carter One', cursive;
		}

    </style>
</head>

<body>
    <?php
    include("../include/header.php");
    include("../include/connection.php");
    ?>


    <div class="profmain">
        <div class="sidepart spacesi">
            <?php

            include("sidenav.php");

            $doc = $_SESSION['doctor'];
            $query = "SELECT * FROM doctors WHERE username='$doc'";

            $res = mysqli_query($connect, $query);

            $row = mysqli_fetch_array($res);

            ?>
        </div>
        <div class="updprofmain spacesi">

            <?php

            if (isset($_POST['upload'])) {

                $img = $_FILES['img']['name'];

                if (empty($img)) {
                } else {
                    $query = "UPDATE doctors SET profile = '$img' WHERE username='$doc'";

                    $res = mysqli_query($connect, $query);

                    if ($res) {
                        move_uploaded_file($_FILES['img']['tmp_name'], "img/$img");
                    }
                }
            }
            ?>

            <p id="profhead">Profile</p>
            <p id="detailhead">Details</p>
            <table class="docdetailtab">
                <tr>
                    <td>Firstname</td>
                    <td><?php echo $row['firstname']; ?></td>
                </tr>

                <tr>
                    <td>Surname</td>
                    <td><?php echo $row['surname']; ?></td>
                </tr>

                <tr>
                    <td>Username</td>
                    <td><?php echo $row['username']; ?></td>
                </tr>

                <tr>
                    <td>Email</td>
                    <td><?php echo $row['email']; ?></td>
                </tr>

                <tr>
                    <td>Phone Number</td>
                    <td><?php echo $row['phone']; ?></td>
                </tr>

                <tr>
                    <td>Gender</td>
                    <td><?php echo $row['gender']; ?></td>
                </tr>

                <tr>
                    <td>Country</td>
                    <td><?php echo $row['country']; ?></td>
                </tr>

                <tr>
                    <td>Salary</td>
                    <td><?php echo "$" . $row['salary'] . ""; ?></td>
                </tr>
            </table>

        </div>
        <div class="updformreal spacesi">
            <p id="chusehead">Change Username</p>
            <form method="post">
                <div class="profformfield spaced">
                    <label>Enter Username</label>
                    <input type="text" name="uname" class="#" autocomplete="off" placeholder="Enter Username">
                </div>
                <input type="submit" name="update" class="pbtm" value="Update Username">
            </form>

            <?php

            if (isset($_POST['change_uname'])) {

                $uname = $_POST['uname'];

                if (empty($uname)) {
                } else {
                    $query = "UPDATE doctors SET username='$uname' WHERE username='$doc'";

                    $res = mysqli_query($connect, $query);

                    if ($res) {

                        $_SESSION['doctor'] = $uname;
                    }
                }
            }


            ?>

            <p id="chpassshead">Change Password</p>

            <?php

            if (isset($_POST['change_paass'])) {

                $old = $_POST['old_pass'];
                $new = $_POST['new_pass'];
                $con = $_POST['con_pass'];

                $ol = "SELECT * FROM doctors WHERE username='$doc'";

                $ols = mysqli_query($connect, $ol);

                $row = mysqli_fetch_array($ols);

                if (empty($old)) {
                    echo  "<script>alert('Enter old password')</script>";
                } else if (empty($new)) {
                    echo "<script>alert('Enter new password')</script>";
                } else if ($con != $new) {
                    echo "<script>alert('Both password do not match')</script>";
                } else if ($old != $row['password']) {

                    echo "<script>alert('Check the password')</script>";
                } else {

                    $query = "UPDATE doctors SET password='$new' WHERE username='$doc'";

                    mysqli_query($connect, $query);
                }
            }

            ?>


            <form method="post">
                <div class="profformfield spaced">
                    <label>Old Password</label>
                    <input type="password" name="old_pass" class="#" autocomplete="off" placeholder="Enter Old Password">
                </div>
                <div class="profformfield spaced">
                    <label>New Password</label>
                    <input type="password" name="new_pass" class="#" autocomplete="off" placeholder="Enter New Password">
                </div>
                <div class="profformfield spaced">
                    <label>Confirm Password</label>
                    <input type="password" name="con_pass" class="#" autocomplete="off" placeholder="Enter Confirm Password">
                </div>
                <input type="submit" name="change" class="pbtm" value="Change Password">
            </form>
        </div>
    </div>


</body>

</html>