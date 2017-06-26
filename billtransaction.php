<?php
  session_start()
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bills</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



<?php

  $username = $_SESSION['login_user'];

  include("config.php");

  $billId = $_POST['var'];
  echo "$billId";
  $result = mysqli_query($db, "update bill set status = 'Paid' where id = '$billId'");

  header("location: paybill.php");


?>