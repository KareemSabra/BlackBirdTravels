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


    $target = trim($_POST['uname']);




    // validate if email is empty
    if (empty($target)) {
        $error .= '<p class="error">Please enter a pin.</p>';
    }

    if (empty($error)) {
  $query = mysqli_query($con, "SELECT * FROM `Customers` WHERE Pin = $target");
   $row = mysqli_fetch_assoc($query);
  unlink($row["ImageURL"]);

$query = mysqli_query($con, "DELETE FROM `Customers` WHERE Pin = $target");


}

// Close connection

mysqli_close($con);
header("location: datashowing.php");

    exit;
}
?>



<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Black Bird Travels</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/managerstyles.css">
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
                            <a  class="tablinks" href="datashowing.php">
                            Passengers
                               </a>
                        </li>

                          <li>
                              <a  class="tablinks" href="driversview.php">
                              Drivers
                              </a>
                          </li>
                          <li>
                              <a class="tablinks" href="managersview.php">
                                Managers
                               </a>
                          </li>
                          <li>
                              <a  href="logout.php" class="tablinks" >
                              Logout
                                 </a>
                          </li>
                      </ul><!-- #nav-list -->
                  </div><!-- .collapse .navbar-collapse -->
              </div><!-- .container -->
          </nav><!-- #header-nav -->
      </header>

      <div class="container">
          <div class="row">
              <div class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6 col-xs-offset-3 col-xs-6 width-100">
                  <form action="" method="post">
                      <div class="loginpage">
                          <input class="form-control placeholder-fix" type="text" placeholder="Pin for record to delete" name="uname" required="">
                      </div>
                      <div class="action-button">
                          <button class="btn-block" type="submit" value="submit" name="submit" >Delete</button>
                      </div>
                      </div>
                  </form>
              </div>
          </div>
          <div class="container" style="padding: 5%">
                                <form action="" method="post" class="row">
                                    <table style="overflow: auto margin-top: 5%;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <tr>


                                            <td style="background-color:#403055 ; font-size:1.1em; text-align:center;"> Name</td>
                                            <td style="background-color:#403055; font-size:1.1em; text-align:center;"> Faculty </td>
                                            <td style="background-color:#403055; font-size:1.1em;text-align:center;"> University </td>
                                            <td style="background-color:#403055; font-size:1.1em;text-align:center;"> Mobile Number </td>
                                            <td style="background-color:#403055; font-size:1.1em;text-align:center;"> Parent Number </td>
                                            <td style="background-color:#403055; font-size:1.1em;text-align:center;"> Email</td>

                                            <td style="background-color:#403055; font-size:1.1em;text-align:center;"> Package</td>
                                            <td style="background-color:#403055; font-size:1.1em;text-align:center;"> Pin </td>


                                        </tr>


                            <?php

                            $count = 0;
                            $query = mysqli_query($con, $sql = "SELECT * FROM Customers ORDER BY Customers.Name  ASC");

                            foreach($query as $row){
                             $count++;
                            ?>

                            <tr style="overflow: auto; font-size:0.8em; border-bottom: 1px black dashed; text-align: center; color: black;">
                 <td style="background-color:White;"><?php echo $row["Name"]; ?></td>
                 <td style="background-color:White;"><?php echo $row["Faculty"]; ?></td>
                 <td style="background-color:White;"><?php echo $row["University"]; ?></td>
                 <td style="background-color:White;"><?php echo $row["MobileNumber"]; ?></td>
                 <td style="background-color:White;"><?php echo $row["ParentNumber"]; ?></td>
                 <td style="background-color:White;"><?php echo $row["Email"]; ?></td>

                 <td style="background-color:White;"><?php echo $row["Package"]; ?></td>
                 <td style="background-color:White;" name="PIN" required=""><?php echo $row["Pin"]; ?></td>
             </tr>

                            <?php
                            }
                            ?>
                            </table>
                          </form>











                            <br />
                                        </div>
          <script src="js/jquery-2.1.4.min.js"></script>
          <script src="js/bootstrap.min.js"></script>
          <script src="js/managerscript.js"></script>
    </body>
    </html>
