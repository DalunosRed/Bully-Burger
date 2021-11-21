<?php
require_once 'config/config.php';

if(isset($_POST['submit'])){   
    $fname=$_POST['fname'];   
    $lname=$_POST['lname'];   
    $usn=$_POST['usn'];   
    $pwd=$_POST['pwd'];   
    $repwd = $_POST["repwd"];
}

// echo ($fullname.$email.$uid.$pwd.$pwdrepeat);
    if (empty($fname) || empty($lname) || empty($usn) || empty($pwd) || empty($repwd)){
      $error = ['emptyfields' => 'Please fill in all the fields'];
      echo json_encode($error);
      exit();
    } elseif (!preg_match("/^[a-zA-Z0-9]*$/",$usn) && strlen($usn) > 32) {
      $error = ['invalidusername' => 'Username is invalid or too long(max 32)'];
      echo json_encode($error);
      exit();
    } elseif ($pwd !== $repwd) {
      $error = ['passwordnotmatch' => 'Password do not match'];
      echo json_encode($error);
      exit();
    } else {


      $sql = "SELECT username FROM users WHERE username=?"; //checks if uid is taken
      $stmt = mysqli_stmt_init($dbh);


      if (!mysqli_stmt_prepare($stmt, $sql)) {
        exit();
      } else {
        mysqli_stmt_bind_param($stmt, "s", $usn);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_store_result($stmt); //stores result from stmt to stmt
        $result= mysqli_stmt_num_rows($stmt);
          if ($result > 0) {
            $error = ['usernametaken' => 'Username already taken'];
            echo json_encode($error);
            exit();
          } else {
            $sql = "INSERT INTO users (first_name,last_name,username,password) VALUES (?,?,?,?)";
            $stmt= mysqli_stmt_init($dbh);

            if (!mysqli_stmt_prepare($stmt, $sql)) {
              exit();
            } else {

              mysqli_stmt_bind_param($stmt, "ssss", $fname,$lname,$usn,$pwd);
              mysqli_stmt_execute($stmt);

              $sql = "SELECT * FROM users WHERE username=?";  //immediately transfer to another page with session started
              $stmt= mysqli_stmt_init($dbh);

                if (!mysqli_stmt_prepare($stmt, $sql)) {
                  exit();
                } else {
                  mysqli_stmt_bind_param($stmt, "s", $usn);
                  mysqli_stmt_execute($stmt);

                 $result = mysqli_stmt_get_result($stmt); //gets result from stmt to $result
                    if ($row = mysqli_fetch_assoc($result)) {
                          session_start();
                          $_SESSION['id']= $row['employee_id'];
                          $_SESSION['adminid']= $row['admin_id'];
                          $_SESSION['usn']= $row['username'];
                          $_SESSION['fname']= $row['first_name'];
                          $_SESSION['lname']= $row['last_name'];

                          $error = ['success' => 'success'];
                          echo json_encode($error);
                            exit();
                        } else {
                            exit();
                    }
                }
              exit();
            }
          }
      }
    }
    mysqli_stmt_close($stmt);   //closes everything to save resource
    mysqli_close($dbh);

 ?>
