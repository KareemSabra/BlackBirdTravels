<?php
// start the session
session_start();

require_once "config.php";
$query = mysqli_query($con, $sql = "SELECT * FROM Customers ORDER BY Customers.Name  ASC");
$target;
if (!isset($_SESSION["userid"]) || $_SESSION["userid"] !== true) {
    header("location: index.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
  header("location:  deletepassenger.php");
  exit;

}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
  header("location:  addpassenger.php");
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
                              <a  href="logout.php" class="tablinks" href="datashowing.php">
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


                            <div class="container" style="padding: 5%; overflow: auto;">
                                <form action="" method="post" class="row">
                                    <table style="overflow: auto margin-top: 5%;" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <tr>


                                            <td style="background-color:#403055 ; font-size:1.1em; text-align:center;"> Name</td>
                                            <td style="background-color:#403055; font-size:1.1em;text-align:center;"> University </td>
                                            <td style="background-color:#403055; font-size:1.1em; text-align:center;"> Faculty </td>
                                            <td style="background-color:#403055; font-size:1.1em;text-align:center;"> Mobile Number </td>
                                            <td style="background-color:#403055; font-size:1.1em;text-align:center;"> Parent Number </td>
                                            <td style="background-color:#403055; font-size:1.1em;text-align:center;"> Email </td>
                                            <td style="background-color:#403055; font-size:1.1em;text-align:center;"> Package</td>
                                            <td style="background-color:#403055; font-size:1.1em;text-align:center;"> Pin </td>


                                        </tr>


                            <?php

                            $count = 0;

                            foreach($query as $row){
                             $count++;
                            ?>

                            <tr style="overflow: auto; font-size:0.8em; border-bottom: 1px black dashed; text-align: center; color: black;">
                 <td style="background-color:White;"><?php echo $row["Name"]; ?></td>
                 <td style="background-color:White;"><?php echo $row["University"]; ?></td>
                 <td style="background-color:White;"><?php echo $row["Faculty"]; ?></td>
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

                             <?php
                             if(isset($_POST["submit"])) {echo "";}


                      /*  function myfunction(Pin) {
                          echo "hello";


                        if (confirm("Do you want to Delete this Customer!")) {

                          document.getElementById("demo").innerHTML = Pin;

                            $pin = $_POST['PIN'];

                            $querysql = "DELETE FROM Customers WHERE Pin = '$_SESSION[pin]'";

                            mysqli_query($con, $querysql);

                            alert("The Customer has been deleted!")
                          }
                        }*/

                            ?>





                            <br />
                                        </div>
                                    </div>
                                    </div>
                                    <script src="js/jquery-2.1.4.min.js"></script>
                                    <script src="js/bootstrap.min.js"></script>
                                    <script src="js/managerscript.js"></script>
                                    </body>
                                    </html>
