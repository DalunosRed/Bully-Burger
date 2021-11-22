<?php
require_once 'includes/config.php';
$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$usn = $_POST['usn'];
$pwd = $_POST['pwd'];

if (isset($_POST['usn'])) {
  # code...

    if (empty($usn) || empty($pwd)) {
        $error =['emptyfields'=>'Please fill in all the fields'];
        echo json_encode($error);
        exit();
      } else{
        $sql = "SELECT * FROM users WHERE username=?";
        $stmt = $dbh->prepare($sql);

        $stmt->execute([$usn]);

            if ($row = $stmt->fetch()) {
                $pwdCheck = password_verify($pwd, $row['password']);
                if ($pwdCheck) {
                    session_start();
                    $_SESSION['id']= $row['employee_id'];
                    $_SESSION['usn']= $row['username'];
                    $_SESSION['fname']= $row['first_name'];
                    $_SESSION['lname']= $row['last_name'];

                    $error = ['success' => 'success'];
                    echo json_encode($error);
                      exit();
                } else{
                    $error = ['passwordnotmatch' => 'Password do not match'];
                    echo json_encode($error);
                    exit();
                }
              } else{
                $error = ['nouser' => 'No user match detected'];
                echo json_encode($error);
                exit();
              }

    }
  }else{
    header("Location: /Bully-Burger"); /* Redirect browser */
  }