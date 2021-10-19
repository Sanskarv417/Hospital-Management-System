 <?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="..\static\style.css" />
</head>
<body>
    <?php
    include("../include/header.php");

    include("../include/connection.php");
    ?>

<div class="container-fliud">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3" style="margin-left: 30px;">
                
                <?php
                 include("sidenav.php");
                ?>

            </div>
            <div class="col-md-10 ">

                <h4 class="my-2">Admin Dashboard</h4>
                
                <div class="col-md-12 my-1">
                    <div class="row">
                    <div class="col-md-3 bg-success mx-2" styles="height: 130px;">
                            <div CLASS="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <?php
                                          $ad = mysql_query(%connect,"SELECT *FROM admin")

                                          $num = mysql_num_rows($ad)
                                        ?>
                                        <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num; ?></h5>
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Admin</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="admin.php"><i class="fa fa-users-cog fa-3x my-4" style="color: white;"></i><!--the icon is saved in the img folder with the same name 'users-cog'--></a>
                                    </div>
                                    
                                </div>
                            </div>
                    </div>

                        <div class="col-md-3 bg-info mx-2" styles="height: 130px;">
                            <div CLASS="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h5 class="my-2 text-white" style="font-size: 30px;">0</h5>
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Doctors</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="#"><i class="fa fa-users-md fa-3x my-4" style="color: white;"></i><!--the icon in saved in the img folder with the same name 'users-md'--></a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 bg-warning mx-2" styles="height: 130px;">
                            <div CLASS="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h5 class="my-2 text-white" style="font-size: 30px;">0</h5>
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Patient</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="#"><i class="fa fa-procedures fa-3x my-4" style="color: white;"></i><!--the icon in saved in the img folder with the same name 'procedures'--></a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 bg-DANGER mx-2 my-2" styles="height: 
                            130px;">
                            <div CLASS="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h5 class="my-2 text-white" style="font-size: 30px;">0</h5>
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Report</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="#"><i class="fa fa-flag fa-3x my-4" style="color: white;"></i><!--the icon in saved in the img folder with the same name 'flag'--></a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 bg-warning mx-2 my-2" styles="height: 
                            130px;">
                             <div CLASS="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h5 class="my-2 text-white" style="font-size: 30px;">0</h5>
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Job Requests</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="#"><i class="fa fa-book-open fa-3x my-4" style="color: white;"></i><!--the icon in saved in the img folder with the same name 'book-open'--></a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 bg-success mx-2 my-2" styles="height: 
                            130px;">
                             <div CLASS="col-md-12">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h5 class="my-2 text-white" style="font-size: 30px;">0</h5>
                                        <h5 class="text-white">Total</h5>
                                        <h5 class="text-white">Income</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="#"><i class="fa fa-money-check-alt fa-3x my-4" style="color: white;"></i><!--the icon in saved in the img folder with the same name 'money-check-alt'--></a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>