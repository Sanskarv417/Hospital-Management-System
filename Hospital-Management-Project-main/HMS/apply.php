<?php
include("include/connection.php");
if (isset($_POST['apply'])){
    $firstname = $_POST['fname'];
    $surname= $_POST['sname'];
    $username=$_POST['uname'];
    $email=$_POST['email'];
    $gender=$_POST['gender'];
    $phone=$_POST['phone'];
    $country =$_POST['country'];
    $password=$_POST['pass'];
    $cofirm_password=$_POST['con_pass'];

    $error=array();

    if(empty($firstname)){
        $error['apply']="Enter Firstname";
    }
    else
    if(empty($surname)){
        $error['apply']="Enter Lastname";
    }
    else
    if(empty($username)){
        $error['apply']="Enter Username";
    }
    else
    if(empty($email)){
        $error['apply']="Enter Email Address";
    }
    else
    if($gender==""){
        $error['apply']="Choose Gender";
    }
    else
    if(empty($phone)){
        $error['apply']="Enter the Contact Number";
    }
    else
    if($country==""){
        $error['apply']="Select Country";
    }
    else
    if(empty($password)){
        $error['apply']="Enter Password";
    }
    else
    if($cofirm_password!=$password){
        $error['apply']="Both Password does not match";
    }

    if(count($error)==0){

        $query="INSERT INTO doctors(firstname,surname,username,email,gender,phone,country,password,salary,data_reg,status,profile) VALUES ('$firstname','$surname','$username','$email','$gender','$phone','$country','$password','0',NOW(),'Pending','doctor.jpg')";

        $result=mysqli_query($connect,$query);

        if($result){
            echo "<script>alert('You have Successfully Registered')</script>";
            header("Location: doctorlogin.php");
        }
        else{
            echo "<script>alert('Registration Failed')</script>";

        }
    }
}

if(isset($error['apply'])){
    $s=$error['apply'];

    $show="<h4 class=''>$s</h4>";
}
else{
    $show="";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply Now</title>
    <link rel="stylesheet" href="static\style.css" />
    <style>
        .applymain {
            margin-top: 20px;
            width: 500px;
            height: 500px;
            margin-left: 400px;
            text-align: center;
            border: 1px solid mediumblue;
            background-color: #1facf88c;
        }

        .applymain #applyhead {
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
<body style="background-image: url(image/bg2.jpg); background-repeat: no-repeat; background-size:cover;">
<?php
    include("include/header.php");

    include("include/connection.php");
    ?>

    <div class="applymain">
        <p id="applyhead"> APPLY NOW!!! </p>
        <?php
        echo $show;
        ?>
        <form method="post" enctype="multipart/form-data">
            <div class="applyfield space">
                <label>Firstname</label>
                <input type="text" name="fname" class="" autocomplete="off" placeholder="Enter Firstname" value="<?php if (isset($_POST['fname'])) echo $_POST['fname']; ?>">
            </div>

            <div class="applyfield space">
                <label>Lastname</label>
                <input type="text" name="sname" class="" autocomplete="off" placeholder="Enter Lastname" value="<?php if (isset($_POST['surname'])) echo $_POST['surname']; ?>">
            </div>

            <div class="applyfield space">
                <label>Username</label>
                <input type="text" name="uname" class="" autocomplete="off" placeholder="Enter Username" value="<?php if (isset($_POST['uname'])) echo $_POST['uname']; ?>">
            </div>

            <div class="applyfield space">
                <label>Email Address</label>
                <input type="email" name="email" class="" autocomplete="off" placeholder="Enter Email Address" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
            </div>

            <div class="applyfield space">
                <label>Select Gender</label>
                <select name="gender">
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>

            <div class="applyfield space">
                <label>Contact Number</label>
                <input type="text" name="phone" class="" autocomplete="off" placeholder="Enter Phone Number" value="<?php if (isset($_POST['phone'])) echo $_POST['phone']; ?>">
            </div>

            <div class="applyfield space">
                <label>Select Country</label>
                <select name="country">
                    <option value="">Select Country</option>
                    <option value="India">India</option>
                    <option value="Russia">Russia</option>
                    <option value="Srilanka">Srilanka</option>
                    <option value="England">England</option>
                </select>
            </div>

            <div class="applyfield space">
                <label>Password</label>
                <input type="password" name="pass" class="" autocomplete="off" placeholder="Enter Password">
            </div>

            <div class="applyfield space">
                <label>Confirm Password</label>
                <input type="password" name="con_pass" class="" autocomplete="off" placeholder="Enter Password Again">
            </div>

            <input type="submit" name="apply" value="Apply Now!!!" class="applybtn">
            <p id = "alreadyacc"> I already have an account.   <a href="doctorlogin.php">Click here!!</a></p>
        </form>
    </div>
</body>
</html>