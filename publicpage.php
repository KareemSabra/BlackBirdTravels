<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['oneTime'])) {
  header("location:  publicbooking.php");
  exit;

}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ForgotPin'])) {
  header("location:  forgotpin.php");
  exit;

}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['twoTimes'])) {
  header("location:  roundtrip.php");
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
                          <a><h1>Black Bird Travel</h1></a>

                      </div>


                  </div>
              </div>
          </nav>
      </header>

      <div class="buttons-box container">
          <form action="" method="post" class="row">

              <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pull-left">
                      <div class="action-button ">
                          <button class="btn-block" type="submit" value="add" name="oneTime"  style="background-color:#403055; font-size:1em;text-align:center;">Book One Way Trip</button>
                      </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                      <div class="action-button ">
                          <button class="btn-block" type="submit" value="add" name="twoTimes"  style="background-color:#403055; font-size:1em;text-align:center;">Book Round Trip</button>

                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pull-left" style="padding-left: 30%; padding-right: 30%;">
                      <div class="action-button ">
                          <button  class="btn-block" type="submit" value="delete" name="ForgotPin" style="background-color:#403055; font-size:1em;text-align:center;">Forgot My Pin</button>
                      </div>
                  </div>
              </div>
          </form>
      </div>
                                    </div>
                                    </div>
                                    <script src="js/jquery-2.1.4.min.js"></script>
                                    <script src="js/bootstrap.min.js"></script>
                                    <script src="js/managerscript.js"></script>
                                    </body>
                                    </html>
