<?php

require_once "config.php";
require_once "session.php";

$error = '';
$DispDiv ="display:none;";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {


    $uname = trim($_POST['uname']);
    $password = trim($_POST['password']);



    // validate if email is empty
    if (empty($uname)) {
        $error .= '<p class="error">Please enter email.</p>';
    }

    // validate if password is empty
    if (empty($password)) {
        $error .= '<p class="error">Please enter your password.</p>';
    }

    if (empty($error)) {
$query = mysqli_query($con, "SELECT * FROM Permissions WHERE Password='$password'
  AND UserName='$uname'");

$rows = mysqli_num_rows($query);
$row = mysqli_fetch_assoc($query);


if($rows == 1){
  $_SESSION["Permission"] = $row["Permission"];
 $_SESSION["userid"] = true;
  $_SESSION["name"] = $uname;
  header("location:  welcome.php");
	exit;
}
else
{
  $DispDiv ="display:block;";
 }
}

// Close connection
mysqli_close($con);
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Black Bird Travels</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/loginstyle.css">


</head>
<body>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
        <header>
            <div class="logo text-center">
                <h2>Black Bird Travel</h2>
            </div>
        </header>
        <div class="container">
            <div class="row">
                <div class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6 col-xs-offset-3 col-xs-6 width-100">
                    <form action="" method="post">
                        <div class="loginpage">
                            <input class="form-control placeholder-fix" type="text" placeholder="Username" name="uname" required="">
                            <input class="form-control placeholder-fix" type="password" placeholder="Password" name="password" required="">
                        </div>
                        <div class="action-button">
                            <button class="btn-block" type="submit" value="submit" name="submit">Login</button>
                        </div>
                        <div id="error-box" style='<?php echo $DispDiv;?>'>
                          <h2 style="color: red; font-size: 1.2em">Invalid Username or Password
                          </h2>
                        </div>
                    </form>
                </div>
            </div>
            <div class="copyright-box">
                <div class="copyright">
                    <!--Do not remove Backlink from footer of the template. To remove it you can purchase the Backlink !-->
                    &copy; 2017 All right reserved. Designed by <a href="http://www.themevault.net/" target="_blank"><strong>ThemeVault.</strong></a>
                    <br> Go to  <a href="http://www.blackbirdtravels.com/publicpage.php" target="_blank"><strong>Public Page.</strong></a>
                </div>
            </div>
        </div>
</body>
</html>
