<?php
require_once 'includes/config.php';

$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
session_start();

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$usn = $_POST["usn"];
$email = $_POST["email"];
$pwd = $_POST["pwd"];
$repwd = $_POST["repwd"];
$employee_id = $_SESSION['employee_id'];
if (isset($fname)) {

  if (empty($fname) || empty($lname) || empty($usn) || empty($pwd) || empty($repwd) || empty($email)){
      $error = ['emptyfields' => 'Please fill in all the fields'];
      echo json_encode($error);
      exit();
    } elseif (strlen($usn) > 32) {
      $error = ['invalidusername' => 'Username is invalid or too long(max 32)'];
      echo json_encode($error);
      exit();
    } elseif ($pwd !== $repwd) {
      $error = ['passwordnotmatch' => 'Password do not match'];
      echo json_encode($error);
      exit();
    } else {
        // Validate password strength
        $uppercase = preg_match('@[A-Z]@', $pwd);
        $lowercase = preg_match('@[a-z]@', $pwd);
        $number    = preg_match('@[0-9]@', $pwd);
        $specialChars = preg_match('@[^\w]@', $pwd);

        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($pwd) < 8) {
            $error = ['passwordstr' => 'Password should be at least 8 characters in length and should
            include at least one upper case letter, one number, and one special character'];
            echo json_encode($error);
            exit();
        }else{
          // the main product
          $sql = "SELECT username FROM users WHERE employee_id=?";
          $stmt = $dbh->prepare($sql);
          $stmt->execute([$employee_id]);
          $row = $stmt->fetch();

          // test all product names
          $sql = "SELECT username FROM users WHERE username=?";
          $stmt = $dbh->prepare($sql);
          $stmt->execute([$usn]);
          $rowCount= $stmt->rowCount();

          if (strtolower($usn) == strtolower($row['username'])) {
            $sql = "UPDATE users
            SET
              first_name=?,
              last_name =?,
              email = ?,
              username =?,
              password=?
            WHERE
              employee_id = ?";
            $stmt = $dbh->prepare($sql);

            // hash password
            $hashedPassword = password_hash($pwd, PASSWORD_DEFAULT);
            $stmt->execute([$fname,$lname,$email,$usn,$hashedPassword, $employee_id]);
            $error = ['success' => 'success'];
            echo json_encode($error);
            exit();
          }else{
             if ($rowCount > 0) {
               $error = ['usernametaken' => 'This username is already taken'];
               echo json_encode($error);
               exit();
             } else{
               $sql = "UPDATE users
               SET
                 first_name=?,
                 last_name =?,
                 email = ?,
                 username =?,
                 password=?
               WHERE
                 employee_id = ?";
               $stmt = $dbh->prepare($sql);

               // hash password
               $hashedPassword = password_hash($pwd, PASSWORD_DEFAULT);
               $stmt->execute([$fname,$lname,$email,$usn,$hashedPassword, $employee_id]);
               $error = ['success' => 'success'];
               echo json_encode($error);
               exit();
             }
          }

    }

  }
}else{
  header("Location: /Bully-Burger/reg-users"); /* Redirect browser */

}
