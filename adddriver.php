<?php

require_once "config.php";
//require_once "session.php";
session_start();
if (!isset($_SESSION["userid"]) || $_SESSION["userid"] !== true) {
    header("location: index.php");
    exit;
}
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {


    $uname = trim($_POST['uname']);



    $password = trim($_POST['password']);


    $confpassword = trim($_POST['confirmpassword']);





$query = mysqli_query($con, "SELECT co from Permissions Where UserName = '$uname'");
    // validate if email is empty
    if (empty($uname)) {
        $error .= '<p class="error" style= "color:Red">Please enter a UserName.</p>';
    }

    if (empty($password)) {
        $error .= '<p class="error" style= "color:Red">Please enter a password.</p>';
    }
    if (empty($confpassword)) {
        $error .= '<p class="error" style= "color:Red" >Please confirm your password.</p>';
    }

    if ($password !== $confpassword){
      $error .=  '<p class="error" style= "color:Red">Passwords do not match.</p>';
    }
    if (strlen($_POST["password"]) < 8) {
        $error .= '<p class="error" style= "color:Red">Your Password Must Be At Least 8 Characters!</p>';
    }



$query = "SELECT * FROM Permissions WHERE UserName='$uname'";
$result = mysqli_query($con, $query);
$count = mysqli_num_rows($result);
if($count > 0){
    $error .= '<p class="error" style= "color:Red">Username already exists</p>';
}
    if (empty($error) ) {
      $query = mysqli_query($con, "INSERT INTO `Permissions`(`UserName`, `Password`, `Permission`) VALUES ('$uname','$password','driver')");
        header("location: driversview.php");
        exit();
    }

     mysqli_close($con);
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Black Bird Travels</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">


    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/managerstyles.css">
    <link rel="stylesheet" href="css/signupstyles.css">



</head>
<body>
    <header>
        <nav id="header-nav" class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">

                    <div class="navbar-brand">
                        <a href="manager.php"><h1>Black Bird Travel</h1></a>

                    </div>

                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapsable-nav" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <div id="collapsable-nav" class="collapse navbar-collapse">
                    <ul id="nav-list" class="nav navbar-nav navbar-right">
                        <li>
                            <a class="tablinks" href="Boarding.php">
                                Boarding
                            </a>
                        </li>

                        <li>
                            <a class="tablinks" href="datashowing.php">
                                Passengers
                            </a>
                        </li>

                        <li>
                            <a class="tablinks" href="driversview.php">
                                Drivers
                            </a>
                        </li>
                        <li>
                            <a class="tablinks" href="managersview.php">
                                Managers
                            </a>
                        </li>
                        <li>
                            <a href="logout.php" class="tablinks" href="datashowing.php">
                                Logout
                            </a>
                        </li>

                    </ul><!-- #nav-list -->
                </div><!-- .collapse .navbar-collapse -->
            </div><!-- .container -->
        </nav><!-- #header-nav -->
    </header>
    <div class="container-fluid">
        <div class="row signup-page">
            <div class="col-md-12 col-sm-12">
                <h1 class="title">Add a new Driver</h1>

            </div>
            <div class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6 col-xs-12">
                <form  method="post">
                    <div class="book-form">
                        <span>Username</span><input type="text" id="name" class="placeholder-fix" required="" aria-invalid="false"  name="uname">
                        <span>Password</span><input type="password" class="placeholder-fix" required="" aria-invalid="false" name="password">
                          <span>Confirm your Password</span><input type="password"  class="placeholder-fix" required="" aria-invalid="false" name="confirmpassword">
                          <div><?php echo $error;?></div>

                        <button class="btn btn-block" style="background-color:#403055 ;color: white;" type="submit" value="submit" name="submit">Submit</button>
                    </div>
                </form>
            </div>
            <div class="col-xs-12">
                <div class="copyright-box">
                    <div class="copyright">
                        <!--Do not remove Backlink from footer of the template. To remove it you can purchase the Backlink !-->
                        &copy; 2017 All right reserved. Designed by <a href="http://www.themevault.net/" target="_blank"><strong>ThemeVault.</strong></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/managerscript.js"></script>
</body>
</html>
