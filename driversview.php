<?php
// start the session
session_start();

require_once "config.php";
$query = mysqli_query($con, $sql = "SELECT * FROM Permissions WHERE Permission = 'driver'");

if (!isset($_SESSION["userid"]) || $_SESSION["userid"] !== true) {
    header("location: index.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
  header("location:  deletedriver.php");
  exit;

}if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
  header("location:  adddriver.php");
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
    <link rel="stylesheet" href="css/driverstyle.css">



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
                          <a class="tablinks"href="Boarding.php">
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
    <div class="buttons-box container">
        <form action="" method="post" class="row">

            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left">
                    <div class="action-button ">
                        <button class="btn-block" type="submit" value="add" name="add" style="background-color:#403055; font-size:1em;text-align:center;">ADD</button>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <div class="action-button ">
                        <button  class="btn-block" type="submit" value="delete" name="delete" style="background-color:#403055; font-size:1em;text-align:center;">Delete</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
<div style=" width: 40%" class="container">
  <div class="row">
    <table style="overflow: auto; margin-top: 5%; padding: 5%;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <tr>


            <td style="background-color:#403055 ; font-size:1.1em; text-align:center;"> Username</td>
            <td style="background-color:#403055 ; font-size:1.1em; text-align:center;"> Password</td>
            <td>
        </tr>
        <?php

        $count = 0;

        foreach($query as $row){
         $count++;
        ?>



        <tr style="overflow: auto; font-size:0.8em;text-align:center; border-bottom: 1px black dashed;color:black;" >
            <td style="background-color:White;"><?php echo $row["UserName"]; ?></td>
            <td style="background-color:White;"><?php echo $row["Password"]; ?></td>
        </tr>

          <?php
        }
        ?>
        </table>
  </div>
</div>

<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/managerscript.js"></script>




</body>
</html>
