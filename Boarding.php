<?php

require_once "config.php";
//require_once "session.php";
session_start();
if (!isset($_SESSION["userid"]) || $_SESSION["userid"] !== true) {
    header("location: index.php");
    exit;
}


$error = '';
$visibility = 'none';
$visibility20 = 'hidden';
$row;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {


    $target = trim($_POST['pin']);




    // validate if email is empty
    if (empty($target)) {
        $error .= '<p class="error">Please enter a pin.</p>';
    }

    if (empty($error)) {

      $query = mysqli_query($con, "SELECT * FROM `Customers` WHERE Pin = $target");

    if(!empty($query)){
       $row = mysqli_fetch_assoc($query);
       if ($row["Package"] === 'twice') {
        $query = mysqli_query($con,"UPDATE `Customers` SET `Package`= 'once' WHERE Pin = $target");
      } else
       if ($row["Package"] === 'once') {
        $query = mysqli_query($con,"UPDATE `Customers` SET `Package`= 'once-used' WHERE Pin = $target");
      }else
       if ($row["Package"] === 'once-used'){
         unset($row);
       }
       if($row){
       $visibility = 'block';
     }
     if (empty($row)) {
       $visibility20 = 'visible';

     }
   }


}

// Close connection

mysqli_close($con);
/*header("location: datashowing.php");

    exit;
*/
}
?>






<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Black Bird Travels</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
                              <a  href="logout.php" class="tablinks">
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
                          <input class="form-control placeholder-fix" type="text" placeholder="PIN" name="pin" required="">
                      </div>
                      <div class="action-button">
                          <button class="btn-block" type="submit" value="submit" name="submit">Enter</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>

    <div class="container" style="padding: 5%; display:<?php echo $visibility;?>" id="boardingview">
        <div class="row" >
            <div class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6 col-xs-offset-3 col-xs-6 width-100" style="background-color: White">
        <img style="width:150px ;background-color: White; height:150px;" src="<?php echo $row["ImageURL"]; ?>" onclick="document.getElementById('modal01').style.display='block'" class="w3-hover-opacity">
        <div style=" background-color: White; color: black;">
            <span style="text-align:center"><strong><?php echo $row["Name"]; ?></strong></span>
        </div>
        <div style=" background-color: White; color: black;">
            <span>University: </span><span><?php echo $row["University"]; ?></span>
        </div>
        <div style=" background-color: White; color: black;">
            <span>Phone number: </span><span><?php echo $row["MobileNumber"]; ?></span>
        </div>
        <div style=" background-color: White; color: black;">
            <span>Parent Number: </span><span><?php echo $row["ParentNumber"]; ?></span>
        </div>
        </div>
        </div>
    </div>


<div id="modal01" class="w3-modal" onclick="this.style.display='none'">
  <span class="w3-closebtn w3-hover-red w3-container w3-padding-hor-16 w3-display-topright">&times;</span>
  <div class="w3-modal-content w3-animate-zoom">
    <img src="<?php echo $row["ImageURL"]; ?>" style="width:100%">
  </div>
</div>


        <div class="container" style="padding: 5%; visibility:<?php echo $visibility20;?>">
            <div class="row" >
                <div class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6 col-xs-offset-3 col-xs-6 width-100" >
            <h1 style="color: red;">User is not found</h1>
            </div>
            </div>
            </div>






          <script src="js/jquery-2.1.4.min.js"></script>
          <script src="js/bootstrap.min.js"></script>
          <script src="js/managerscript.js"></script>
    </body>
    </html>
