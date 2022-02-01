<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title></title>
    <style>
        .sidenav {
            margin-right: 20px;
            width: 285px;
            height: 650px;
            background-color: #1facf893;
        }

        .sidefield {
            display: flex;
            width: 285px;
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
            font-size: 25px;
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
            <a href="appointment.php" class="Dappointment">Book Appointment</a>
        </div>
        <div class="sidefield">
            <a href="invoice.php" class="Patient">Invoice</a>
        </div>
        <div class="sidefield">
            <a href="inventory.php" class="inventory">Inventory</a>
        </div>
    </div>
    

</body>

</html>