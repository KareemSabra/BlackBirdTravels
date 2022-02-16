<?php
// start the session
session_start();

// Check if the user is not logged in, then redirect the user to login page
if (!isset($_SESSION["userid"]) || $_SESSION["userid"] !== true) {
    header("location: index.php");
    exit;
}

if ($_SESSION["Permission"] === "manager" ) {
  echo "manager";
  //Goto manager page
  header("location:  manager.php");
	exit;
}
if ($_SESSION["Permission"] === "driver") {
  echo "driver";
  //Goto driver page
  header("location:  driver.php");
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
    <link rel="stylesheet" href="css/loginstyle.css">


</head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 style="color: white">Hello,<?php echo $_SESSION["name"]; ?>.Redirecting you to your panel ?></h1>
               </div>
                <p>
                    <a href="logout.php" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Log Out</a>
                </p>
            </div>
            </div>
            </body>
</html>
