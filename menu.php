<?php
  session_start()
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>MENU</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style type="text/css">
  	.well{
  		margin-top: 80px;
  		margin-left: 350px;
  		border-color: #00CED1;
  		border-width: 2px;
  		font-weight: bold;
  		text-align: center;
	  }
    #welcome{
      margin-top: 20px;
      margin-left: 1130px;
      font-size: 23px;
      color: blue;
    }
  </style>

</head>

<body>

  <?php
    $username = $_SESSION['login_user'];
  ?>

  <div id="welcome">Hello <?php echo $username ?>!</div>


	<div class="conatiner-fluid">
		<div class="well col-lg-6">
			<h2>MENU <br><br></h2>
			<a href="calllog.php"><button type="button" class="btn btn-lg btn-primary btn-block">Call Log</button></a><br>
			<a href="pdetails.php"><button type="button" class="btn btn-lg btn-primary btn-block">Personal Details</button></a><br>
			<a href="currplan.php"><button type="button" class="btn btn-lg btn-primary btn-block">Current Plan</button></a><br>
			<a href="paybill.php"><button type="button" class="btn btn-lg btn-primary btn-block">Pay Bills</button></a><br>
		</div>
	</div>
</body>

