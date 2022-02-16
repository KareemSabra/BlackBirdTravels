<?php

require_once "config.php";
//require_once "session.php";
session_start();

$error = '';
$visibility = 'none';
$visibility20 = 'hidden';
$row;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {


    $target = trim($_POST['phonenumber']);




    // validate if email is empty
    if (empty($target)) {
        $error .= '<p class="error">Please enter a phone number.</p>';
    }

    if (empty($error)) {

      $query = mysqli_query($con, "SELECT * FROM `Customers` WHERE MobileNumber = $target");

    if(!empty($query)){
       $row = mysqli_fetch_assoc($query);

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

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/managerstyles.css">
</head>
    <body>
      <header>
          <nav id="header-nav" class="navbar navbar-default">
              <div class="container">
                  <div class="navbar-header">

                      <div class="navbar-brand">
                          <a href="publicpage.php"><h1>Black Bird Travel</h1></a>

                      </div>

                    
                  </div>
              </div><!-- .container -->
          </nav><!-- #header-nav -->
      </header>

      <div class="container">
          <div class="row">
              <div class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6 col-xs-offset-3 col-xs-6 width-100">
                  <form action="" method="post">
                      <div class="loginpage">
                          <input class="form-control placeholder-fix" type="text" placeholder="Phone number" name="phonenumber" required="">
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
            <div class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6 col-xs-offset-3 col-xs-6 width-100">
              <h1>Your Pin is <strong><?php echo $row["Pin"]; ?></strong>
                <form action="publicpage.php">
                  <button class="btn-block" type="submit" style="background-color:#403055; font-size:1em;text-align:center;" >Confirm</button>
                </form>
        </div>
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
