<?php

require_once "config.php";
//require_once "session.php";
session_start();
if (!isset($_SESSION["userid"]) || $_SESSION["userid"] !== true) {
    header("location: index.php");
    exit;
}
$error = '';
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$visibility2 = 'block';
$visibility3 = 'none';


$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {


    $name = trim($_POST['name']);


    $university = trim($_POST['university']);


    $faculty = trim($_POST['faculty']);


    $parentnum = trim($_POST['parentnumber']);


    $phonenum = trim($_POST['phonenumber']);


    $package = trim($_POST['Package']);

    $email = trim($_POST['email']);



    $pin = mt_rand(1000,9999);

    $flag = false;

    while ($flag == false) {
        $query = "SELECT * FROM Customers WHERE Pin='$pin'";
        $result = mysqli_query($con, $query);
        $count = mysqli_num_rows($result);
        if($count > 0){
            $pin = mt_rand(1000,9999);
        }else{
            $flag = true;
        }
    }


    // Check if image file is a actual image or fake image

    if (strlen($_POST["phonenumber"]) !== 11) {
        $error .= '<p class="error" style= "color:Red">Your phonenumber Must Contain 11 Numbers!</p>';
    }else if (strlen($_POST["parentnumber"]) !== 11) {
        $error .= '<p class="error" style= "color:Red">Your parentnumber Must Contain 11 Numbers!</p>';
    }elseif(preg_match("#[A-Z]+#",$phonenum)) {
        $error.= '<p class="error" style= "color:Red">Your phonenumber Must Contain 11 Numbers!</p>';
    }
    elseif(preg_match("#[a-z]+#",$phonenum)) {
        $error .= '<p class="error" style= "color:Red">Your phonenumber Must Contain 11 Numbers!</p>';
    }elseif(preg_match("#[A-Z]+#",$parentnum)) {
        $error.= '<p class="error" style= "color:Red">Your parentnumber Must Contain 11 Numbers!</p>';
    }
    elseif(preg_match("#[a-z]+#",$parentnum)) {
        $error .= '<p class="error" style= "color:Red">Your parentnumber Must Contain 11 Numbers!</p>';
    }



    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }

  if ($_FILES["fileToUpload"]["size"] > 1000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }

  // Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
    $image = $_FILES['fileToUpload']['tmp_name'];
        $img = file_get_contents($image);
    if (empty($error) ) {
      $query = mysqli_query($con, "INSERT INTO `Customers`(`Name`, `Faculty`, `University`, `ParentNumber`, `MobileNumber`,`Email`,`Package`, `Pin`, `ImageURL`) VALUES ('$name','$faculty','$university','$parentnum','$phonenum','$email','$package','$pin','$target_file')");

   $message = "Passenger added successfully. Pin is " . $pin;
   $visibility2 ='none';
   $visibility3 = 'block';
   $message2 = "Welcome to Black Bird Travel, Your PIN is  " . $pin;
   // use wordwrap() if lines are longer than 70 characters
   $msg = wordwrap($message2,70);

   // send email
   mail("$email","Welcome To Black Bird Travels",$msg);




      /*  header("location: datashowing.php");
        exit();*/
    }

 /* $query = mysqli_query($con, "INSERT INTO `Customers`(`Name`, `Faculty`, `University`, `ParentNumber`, `MobileNumber`, `Package`, `Pin`, `ImageURL`) VALUES ('$name','$university','$faculty','$parentnum','$phonenum','$package','$pin','$target_file')");*/
}

  }



    mysqli_close($con);
    /* header("location: datashowing.php");
        exit();*/
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

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


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
                            <a class="tablinks"  href="Boarding.php">
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
                            <a href="logout.php" class="tablinks">
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
                <h1 class="title" style="display: <?php echo $visibility2 ?>">Add a new Passenger</h1>

            </div>
            <div class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6 col-xs-12" style="display:<?php echo  $visibility2 ?>;">
                <form  method="post" enctype="multipart/form-data">
                    <div class="book-form">
                        <span>Name</span><input type="text" id="name" class="placeholder-fix" required="" aria-invalid="false"  name="name">
                        <span>Faculty</span><input type="text" class="placeholder-fix" required="" aria-invalid="false" name="faculty">
                        <span>University</span><input type="text" class="placeholder-fix" required="" aria-invalid="false" name="university">
                        <span>Phone Number</span><input type="text" class="placeholder-fix" required="" aria-invalid="false" name="phonenumber">
                        <span>Parent Number</span><input type="text" class="placeholder-fix" required="" aria-invalid="false" name="parentnumber">
                        <span>Email</span><input type="text" class="placeholder-fix" required="" aria-invalid="false" name="email">

                        <span>Package</span><input type="text" class="placeholder-fix" required="" aria-invalid="false" name="Package">
                        <div><span>Add Image</span></div>
                        <input type="file" name="fileToUpload" id="fileToUpload" class="placeholder-fix" required="" aria-invalid="false" style="babackground-color: #403055; width: wrap">
                        <div style="color: white;"><?php echo $error; ?></div>


                        <button class="btn btn-block" style="background-color:#403055 ;color: white;" type="submit" value="submit" name="submit">Submit</button>
                    </div>
                </form>
            </div>
            <div class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6 col-xs-12" style="display:<?php echo $visibility3 ?>">
              <h1 style="text-align: center"><?php echo $message; ?></h1>
              <div class="action-button ">
                <form action="datashowing.php">
                  <button class="btn-block" type="submit" style="background-color:#403055; font-size:1em;text-align:center;" >Confirm</button>
                </form>
              </div>


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
