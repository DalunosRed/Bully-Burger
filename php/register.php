<?php
require_once 'includes/config.php';

$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$usn = $_POST["usn"];
$pwd = $_POST["pwd"];
$repwd = $_POST["repwd"];

if (isset($fname)) {

  if (empty($fname) || empty($lname) || empty($usn) || empty($pwd) || empty($repwd)){
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

          $sql = "SELECT username FROM users WHERE username=?"; //checks if uid is taken
          $stmt = $dbh->prepare($sql);

          $stmt->execute([$usn]);
          $rowCount = $stmt->rowCount(); //get row count

          if ($rowCount > 0) {
              $error = ['usernametaken' => 'Username already taken'];
              echo json_encode($error);
              exit();
          } else {
              $sql = "INSERT INTO users (first_name,last_name,username,password) VALUES (?,?,?,?)";
              $stmt = $dbh->prepare($sql);

              // hash password
              $hashedPassword = password_hash($pwd, PASSWORD_DEFAULT);
              $stmt->execute([$fname,$lname,$usn,$hashedPassword]);

              $sql = "SELECT * FROM users WHERE username=?";  //immediately transfer to another page with session started
              $stmt = $dbh->prepare($sql);
              $stmt->execute([$usn]);
              $error = ['success' => 'success'];
              echo json_encode($error);
              exit();
      }
      exit();
    }

  }
}else{
  header("Location: /Bully-Burger/reg-users"); /* Redirect browser */

}