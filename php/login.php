<?php
require_once 'config/config.php';


  $usn = $_POST['usn'];
  $pwd = $_POST['pwd'];

  if (empty($usn) || empty($pwd)) {
    $error =['emptyfields'=>'Please fill in all the fields'];
    echo json_encode($error);
    exit();
  } else {
    $sql = "SELECT * FROM users WHERE username=?";
    $stmt= mysqli_stmt_init($dbh);

      if (!mysqli_stmt_prepare($stmt, $sql)) {
        exit();
      } else {
        mysqli_stmt_bind_param($stmt, "s", $usn);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
          if ($row = mysqli_fetch_assoc($result)) {
              if ($pwd != $row['password']) {
                $error = ['passwordnotmatch' => 'Password do not match'];
                echo json_encode($error);
                exit();
              } elseif ($pwd == $row['password']) {
                session_start();
                $_SESSION['id']= $row['employee_id'];
                $_SESSION['usn']= $row['username'];
                $_SESSION['fname']= $row['first_name'];
                $_SESSION['lname']= $row['last_name'];

                $error = ['success' => 'success'];
                  echo json_encode($error);
                exit();
              }

          } else {
            $error = ['nouser' => 'No user match detected'];
              echo json_encode($error);
            exit();
          }
      }
  }
  mysqli_stmt_close($stmt);   //closes everything to save resource
  mysqli_close($dbh);

 ?>
