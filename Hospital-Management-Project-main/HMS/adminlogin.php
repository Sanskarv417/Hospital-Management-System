<?php
session_start();
include("include/connection.php");

if (isset($_POST['login'])){
    $username= $_POST['username'];
    $password=$_POST['password'];

    $error =array();
    if(empty($username)){
        $error['admin']="Enter Username";
    }
    else if(empty($password)){
        $error['admin']="Enter password";
    }

    if (count($error)==0){
        $query ="Select * from admin Where username='$username' and password='$password'";
    $result =mysqli_query($connect,$query);

    if(mysqli_num_rows($result)==1){
        echo "<script>alert('You have Login As an Admin')</script>";
        $_SESSION['admin']=$username;
        header("Location:admin/index.php");
        exit();
    }
    else{
        echo "<script>alert('Invalid Username or Password')</script>";
    }
    
    
    }

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login as Admin</title>
    <link rel="stylesheet" href="static\style.css" />
</head>
<body style="background-image: url(image/bg.jpg); background-repeat: no-repeat; background-size:cover;">
    <?php
    include("include/header.php");

    ?>

    <div class="">
        <img src="image\admin.png">
        <form method="post" class="fadmin">
            <div class="">
                <?php

                if(isset($error['admin'])){
                    $sh =$error['admin'];
                    $show="<h3>$sh</h3>";
                    
                }
                else{
                    $show="";
                }
                echo $show;
                ?>
            </div>
            <div class="">
                <label for="username">Username</label>
                <input type="text" name="username" placeholder="Enter Username" class="username" autocomplete="off"/>
</br>
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Enter your password" class="password"/>
</br>
                <input type="submit" class="btn" name="login" value="login"/>
            </div>
        </form>
    </div>
</body>
</html>