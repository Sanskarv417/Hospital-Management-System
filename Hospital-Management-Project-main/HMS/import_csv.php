<?php

session_start();

include("include/connection.php");
$query = "SELECT * FROM patient ORDER BY id desc";
$result = mysqli_query($connect, $query);

?>
<!DOCTYPE html>
<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <title>Patient Login Page</title>
    <link rel="stylesheet" href="static\style.css" />
    <style>
        .patlog {
            margin-top: 20px;
            width: 500px;
            height: 500px;
            margin-left: 400px;
            text-align: center;
            border: 1px solid mediumblue;
            background-color: #1facf88c;
        }

        .patlog #pathead {
            color: red;
            font-size: 25px;
            font-family: 'Carter One', cursive;
            margin-top: 15px;
            margin-bottom: 15px;
        }


        .patfield label {
            font-family: 'Carter One', cursive;
            color: mediumblue;
            font-size: 18px;
            padding-right: 4px;
        }

        .spacep {
            margin-top: 10px;
        }


        input[type="text"],
        input[type="file"] {
            font-size: 20px;
            color: red;
            font-family: 'Carter One', cursive;
            padding-left: 120px;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .patbtm {
            background: red;
            width: 160px;
            margin-top: 11px;
            color: white;
            font-size: 18px;
            border: 1px solid white;
            font-family: 'Carter One', cursive;
            margin-bottom: 8px;
        }

        .patbtm:hover {
            background: white;
            color: mediumblue;
            border: 1px solid mediumblue;
        }

        .patlog #alreadyacc {
            color: red;
            font-family: cursive;
            font-size: 20px;
            font-weight: bolder;
            margin-top: 10px;
        }

        .patlog #alreadyacc a {
            color: mediumblue;
        }

        .patlog #alreadyacc a:hover {
            color: white;
        }

        #addhead {
            font-family: 'Carter One', cursive;
            color: red;
            font-size: 18px;
            padding-right: 4px;
            display: flex;
        }
    </style>
</head>

<body style="background-image: url(image/bg2.jpg); background-repeat: no-repeat; background-size:cover;">

    <?php
    include("include/header.php");

    ?>
    <?php
    $error = array();
    if (isset($_FILES["csv"]["name"])) {

        if (count($error) == 0) {

            $file_data = fopen($_FILES["csv"]["name"], 'r');
            fgetcsv($file_data);
            while ($row = fgetcsv($file_data)) {
                $firstname = mysqli_real_escape_string($connect, $row[0]);
                $lastname = mysqli_real_escape_string($connect, $row[1]);
                $username = mysqli_real_escape_string($connect, $row[2]);
                $email = mysqli_real_escape_string($connect, $row[3]);
                $phone = mysqli_real_escape_string($connect, $row[4]);
                $gender = mysqli_real_escape_string($connect, $row[5]);
                $country = mysqli_real_escape_string($connect, $row[6]);
                $password = mysqli_real_escape_string($connect, $row[7]);
                $query = "  
                    INSERT INTO patient  
                        (firstname, lastname, username, email, phone, gender, country, password)  
                        VALUES ('$firstname', '$lastname', '$username', '$email', '$phone', '$gender', '$country', '$password')  
                    ";
                mysqli_query($connect, $query);
            }
        }
    }



    if (isset($error['u'])) {
        $er = $error['u'];

        $show = "<p id='msg'>$er</p>";
    } else {
        $show = "";
    }


    ?>

    <div class="patlog">
        <p id="pathead"> ADD DATA </p>
        <img src="image\patlog.jpg">
        <form id="upload_csv" method="post" enctype="multipart/form-data">
            <div class="accfield">
                <input type="file" name="patient_file" />
                <input type="submit" name="upload" id="upload" value="Upload" class="patbtm"/>
            </div>
        </form>
        <p id="alreadyacc">I don't have an account. <a href="account.php">Click here.</a></p>
    </div>
    <!--
    <div id="patient_table">  
                     <table>  
                          <tr>  
                                <th>ID</th>  
                                <th>firstname</th>  
                                <th>surname</th>  
                                <th>username</th>  
                                <th>email</th>  
                                <th>phone</th>  
                                <th>gender</th>  
                                <th>country</th>  
                                <th>password</th>  
                          </tr>  
                          <?php
                            while ($row = mysqli_fetch_array($result)) {
                            ?>  
                          <tr>  
                               <td><?php echo $row["id"]; ?></td>  
                               <td><?php echo $row["firstname"]; ?></td>  
                               <td><?php echo $row["surname"]; ?></td>  
                               <td><?php echo $row["username"]; ?></td>  
                               <td><?php echo $row["email"]; ?></td>  
                               <td><?php echo $row["phone"]; ?></td>  
                               <td><?php echo $row["gender"]; ?></td>
                               <td><?php echo $row["country"]; ?></td>
                               <td><?php echo $row["password"]; ?></td>
                          </tr>  
                          <?php
                            }
                            ?>  
                     </table>  
                </div>
</body>
                        -->

</html>

<script>
    $(document).ready(function() {
        $('#upload_csv').on("submit", function(e) {
            e.preventDefault();
            $.ajax({
                url: "import.php",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    if (data == 'Error1') {
                        alert("Invalid File");
                    } else if (data == "Error2") {
                        alert("Please Select File");
                    } else {
                        $('#patient_table').html(data);
                    }
                }
            })
        });
    });
</script>