<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="..\static\style.css" />
    <style>
        .sidenav {
            margin-right: 20px;
            width: 205px;
            height: 650px;
            background-color: #1facf893;
        }

        .sidefield {
            display: flex;
            width: 205px;
            height: 40px;
            border: 0.5px solid mediumblue;
            background-color: rgba(0, 0, 205, 0.719);
            justify-content: center;
            align-items: center;
            margin-bottom: 4px;
        }

        .sidefield:hover {
            background-color: cyan;
        }

        .sidefield a {
            text-decoration: none;
            color: white;
            font-size: 22px;
            font-family: 'Carter One', cursive;
        }

        .sidefield a:hover {
            color: mediumblue;
        }
    </style>
</head>

<body>
   
    <div class="sidenav">
        <div class="sidefield">
            <a href="index.php" class="dashboard"> Dashboard </a>
        </div>
        <div class="sidefield">
            <a href="profile.php" class="dashboard"> Profile </a>
        </div>
        <div class="sidefield">
            <a href="patient.php" class="Patient">Patient</a>
        </div>
        <div class="sidefield">
            <a href="appointment.php" class="Dappointment">Appointment</a>
        </div>
        <div class="sidefield">
            <a href="inventory.php" class="inventory">Inventory</a>
        </div>
    </div>
    

</body>

</html>