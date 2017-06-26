<?php
  session_start()
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Plans</title>
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
    #panel1format{
      margin-top: 50px;
      margin-left: 270px;
      border-width: 2px;
      text-align: center;
    }
    #panel2format{
      margin-top: 50px;
      margin-left: 370px;
      
      border-width: 2px;
      text-align: center;
    }
    #currplantable{
    }
    #otherplantable{
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
  $result = mysqli_query($db, "select phone_no, plan.name, call_rate from customer, plan where customer.plan_id = plan.id and uname = '$username'");

  $resultrow = mysqli_fetch_array($result);

  $number = $resultrow['phone_no'];
  $plan = $resultrow['name'];
  $chargepm = $resultrow['call_rate'];

?>

  <div id="welcome">Hello <?php echo $username ?>!</div>

  <div class="container-fluid">
    <div id="panel1format" class="panel panel-default col-lg-6">
      <div class="panel-heading">Current Plan</div>
      <div class="panel-body">
        <?php 
          echo '<table id="currplantable" class="table table-bordered table-hover">';
          echo "<tr><th>Phone No.</th> <th>Plan</th> <th>Call Rate(Rs/min)</th></tr>";
          echo "<tr><td>$number</td> <td>$plan</td> <td>$chargepm</td></tr>";

          echo "</table>";
        ?>
      </div>
    </div>

    <?php
      $result = mysqli_query($db, "select name, call_rate from plan where name <> '$plan'");
    ?>

    <div id="panel2format" class="panel panel-default col-lg-4">
      <div class="panel-heading">Other Plans</div>
      <div class="panel-body">
        <?php 
          echo '<table id="otherplantable" class="table table-bordered table-hover">';
          echo "<tr><th>Plan</th> <th>Call Rate(Rs/min)</th></tr>";

          while($resultrow = mysqli_fetch_array($result)){
            $plan = $resultrow['name'];
            $chargepm = $resultrow['call_rate'];

            echo "<tr><td>$plan</td> <td>$chargepm</td></tr>";
          }

          echo "</table>";
        ?>
      </div>
    </div>


  </div>	

</body>



