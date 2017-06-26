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

  <style type="text/css">
    #welcome{
      margin-top: 20px;
      margin-left: 1130px;
      font-size: 23px;
      color: blue;
    }
    #panelformat{
      margin-top: 50px;
      margin-left: 210px;
      border-width: 2px;
      text-align: center;
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
  $result = mysqli_query($db, "select * from bill where phoneno in (select phone_no from customer where uname = '$username')");

?>

  <div id="welcome">Hello <?php echo $username ?>!</div>

  <div class="container-fluid">
    <div id="panelformat" class="panel panel-default col-lg-8">
      <div class="panel-heading">Bill Payments</div>
      <div class="panel-body">
        <?php 
          echo '<table id="paytable" class="table table-bordered table-hover">';
          echo "<tr><th>Bill-id</th> <th>Plan</th> <th>Month</th> <th>Year</th> <th>Amount</th> <th>Status</th></tr>";

          while($resultrow = mysqli_fetch_array($result)){
            $billid = $resultrow['id'];
            $plan = $resultrow['plan'];
            $month = $resultrow['month'];
            $year = $resultrow['year'];
            //$amount = $resultrow['charge'];
            $status = $resultrow['status'];

            $r1 = mysqli_query($db, "select name, call_rate from plan where id = '$plan'");
            $r1row = mysqli_fetch_array($r1);
            $callrate = $r1row['call_rate'];
            $planname = $r1row['name'];
            
            $sql = "select sum(duration) as sumdur from calldetails where billid = '$billid'";
            $r2 = mysqli_query($db, $sql);
            $r2row = mysqli_fetch_array($r2);
            $sumdur = $r2row['sumdur'];

            $amount = $sumdur * $callrate;

              $sql = "update bill set charge = '$amount' where id = '$billid'";
                $resultupdate = mysqli_query($db, $sql);
                if ($resultupdate) {
                  //echo "rows affected : ". mysqli_affected_rows($db);;
                }
                 else {
                   // echo "Error updating record: " . $db->error;
                }

            echo "<tr><td>$billid</td> <td>$planname</td> <td>$month</td> <td>$year</td> <td>$amount</td>";
              if($status != "NotPaid"){
                echo "<td>PAID</td></tr>";
              }
              else{
                ?> <td>
                          
                          <form action="billtransaction.php" method="POST">
                              <input type="hidden" name="var" value="<?php echo "$billid";?>" />
                              <button class="button button-block">Pay</button>
                          </form>

                            </td></tr><?php
                    
              }
          
             

          }


        ?>
      </div>
    </div>
  </div>	

</body>



<!-- <a href="billtransaction.php"><button type="button" class="btn btn-sm btn-primary btn-block">Pay</button></a></td></tr> <?php 

                /*?> <div id="paybill">
                      <?php
                          $sql = "update bill set status = 'Paid' where id = '$billid'";
                          $resultbillupdate = mysqli_query($db, $sql);
                      ?>
                    </div>
                <?php*/




 /* <form action="signup.php" method="POST">
                      <button class="button button-block">Pay</button>
                    </form>

                    </td></tr>*/


  //<button type="button" class="btn btn-sm btn-primary btn-block">Pay</button></td></tr> <?php


  /*<?php $billid = 56; ?>
                          <form action="billtransaction.php" method="POST">
                              <input type="hidden" name="var" value="<?php echo '$billid';?>" />
                              <button class="button button-block">Pay</button>
                          </form>

                            </td></tr><?php */
