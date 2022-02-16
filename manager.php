<?php
// start the session
session_start();

// Check if the user is not logged in, then redirect the user to login page
if (!isset($_SESSION["userid"]) || $_SESSION["userid"] !== true || $_SESSION["Permission"] !== "manager") {
    header("location: index.php");
    exit;
}
header("location: Boarding.php");
exit;

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Black Bird Travel</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/managerstyles.css">
    <link href='https://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lora' rel='stylesheet' type='text/css'>
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
                            <a class="tablinks"  href="Boarding.php">
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

      <div id="homeblock">
          <h3>
              Manager Home Screen
          </h3>
      </div>



      <div id="boarding" class="tabcontent">
          <div>Boarding page</div>
      </div>
      <div id="addPassenger" class="tabcontent">
          <div>addPassenger page</div>

      </div>
      <div id="addDriver" class="tabcontent">
          <div>addDriver page</div>

      </div>
      <div id="addManager" class="tabcontent">
          <div>addManager page</div>

      </div>
      <div id="modData" class="tabcontent">
          <div>ModData page</div>

      </div>

      <!-- jQuery (Bootstrap JS plugins depend on it) -->
      <script src="js/jquery-2.1.4.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/managerscript.js"></script>


  </body>
</html>
