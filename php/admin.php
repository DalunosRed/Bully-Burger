<?php
  require_once 'config/config.php';

  $usn =$_POST['usn'];
  $pwd =$_POST['pwd'];

  $query = "SELECT * FROM admin WHERE username = '$usn'";
  $result = mysqli_query($dbh, $query);

  if ($result) {
    $admin = mysqli_fetch_assoc($result);
    if (!empty($admin)) {
      if ($admin['password'] != $pwd ) {
        $error = ['passwordnotmatch' => 'Password do not match'];
        echo json_encode($error);
      } else{
        session_start();
        $_SESSION['adminid']= $admin['id'];
        $_SESSION['usn']= $admin['username'];
        $_SESSION['pwd']= $admin['password'];

        $error = ['success' => 'success'];
          echo json_encode($error);
        exit();
      }
    } else{
      $error = ['nouser' => 'No username match detected'];
        echo json_encode($error);
    }

      mysqli_free_result($result);
      mysqli_close($dbh);
  }
  else{
    echo $admin;
    $error =['connerror'=>'Connection Error'];
    echo json_encode($error);
  }
 ?>
