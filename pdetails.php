 <?php
  session_start()
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Personal Details</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style type="text/css">
    #welcome{
      margin-top: 20px;
      margin-left: 1130px;
      font-size: 23px;
      color: blue;
    }
    #panelformat{
      margin-top: 50px;
      margin-left: 230px;
    }
    th {
      background-color: #4CAF50;
      color: white;
    }
  </style>

</head>

<body>

<?php

  $username = $_SESSION['login_user'];

  include("config.php");
  $result = mysqli_query($db, "select * from customer where uname = '$username'");

  $resultrow = mysqli_fetch_array($result);

  $name = $resultrow['name'];
  $address = $resultrow['bill_address'];
  $number = $resultrow['phone_no'];
  $email = $resultrow['email'];
  $dob = $resultrow['dob'];
  $gender = "Male";
  $city = $resultrow['city'];
  $state = $resultrow['state'];
  $country = $resultrow['country'];

?>

  <div id="welcome">Hello <?php echo $username ?>!</div>

  <div class="container-fluid">
    <div id="panelformat" class="panel panel-default col-lg-8">
      <div class="panel-heading">Personal Details</div>
      <div class="panel-body">
        <?php 
          echo '<table id="mytable" class="table table-bordered table-hover">';
          echo "<tr><td><b>Name</b></td><td>".$name."</td></tr>";
          echo "<tr><td><b>Number</b></td><td>".$number."</td></tr>";
          echo "<tr><td><b>Email-id</b></td><td>".$email."</td></tr>";
          echo "<tr><td><b>Address</b></td><td>".$address."</td></tr>";
          echo "<tr><td><b>Date of birth</b></td><td>".$dob."</td></tr>";
          /*echo "<tr><td>Gender</td><td>".$gender."</td></tr>";*/
          echo "<tr><td><b>City</b></td><td>".$city."</td></tr>";
          echo "<tr><td><b>State</b></td><td>".$state."</td></tr>";
          echo "<tr><td><b>Country</b></td><td>".$country."</td></tr>";


        ?>
      </div>
    </div>
  </div>	

</body>



