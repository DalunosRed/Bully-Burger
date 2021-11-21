<?php
require_once 'includes/config.php';
$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

  // $user= 'admin';
  // $passw = '1234';
  // $pass = password_hash($passw, PASSWORD_DEFAULT);
  // $query = "INSERT INTO admin(username, password) VALUES (?,?) ";


  $usn =$_POST['usn'];
  $pwd =$_POST['pwd'];

  $query = "SELECT * FROM admin WHERE username = ?";
  $stmt = $dbh->prepare($query);
  $stmt->execute([$usn]);
    if ($row = $stmt->fetch()) {
      $pwdCheck = password_verify($pwd, $row['password']);

      if ($pwdCheck) {
        session_start();
        $_SESSION['adminid']= $row['id'];
        $_SESSION['usn']= $row['username'];
        $_SESSION['pwd']= $row['password'];
        $_SESSION['status']= $row['change_status'];

        $error = ['success' => 'success'];
        echo json_encode($error);
        exit();
      } else{
        $error = ['passwordnotmatch' => 'Password do not match'];
        echo json_encode($error);
        exit();

      }
    } else{
      $error = ['nouser' => 'No username match detected'];
        echo json_encode($error);
        exit();
    }

 ?>
