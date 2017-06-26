

<?php

  include("config.php");
  session_start();

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $myusername = mysqli_real_escape_string($db, $_POST['username']);
    $mypassword = mysqli_real_escape_string($db, $_POST['password']);
    $myname = mysqli_real_escape_string($db, $_POST['name']);
    $myphoneno = mysqli_real_escape_string($db, $_POST['phoneno']);

    $sql = "insert into customer(phone_no, uname, name) values('$myphoneno', '$myusername', '$myname')";
    $result = mysqli_query($db, $sql);

    $sql2 = "insert into login values('$myusername', '$mypassword')";
    $result2 = mysqli_query($db, $sql2);

    if(mysqli_affected_rows($db) > 0){
      $_SESSION['login_user'] = $myusername;
      header("location: menu.php");
    }
    else{
      echo "Invalid entry";
    }

   // $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
   // $active = $row['active'];

    /*$count = mysqli_num_rows($result);

    echo "count = $count";

    if($count == 1){
      $_SESSION['login_user'] = $myusername;
      header("location: menu.php");
    }
    else{
      echo "Invalid Username or Password";
    }*/
  }


?>



