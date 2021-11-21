<?php
require_once 'includes/config.php';
$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

  $pwd =$_POST['pwd'];
  $repwd =$_POST['repwd'];
  $status = 1;
  session_start();

  // Validate password strength
  $uppercase = preg_match('@[A-Z]@', $pwd);
  $lowercase = preg_match('@[a-z]@', $pwd);
  $number    = preg_match('@[0-9]@', $pwd);
  $specialChars = preg_match('@[^\w]@', $pwd);
if ($pwd !== $repwd) {
    $error = ['passwordnotmatch' => 'Password do not match'];
    echo json_encode($error);
    exit();
  } else{
    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($pwd) < 8) {
         $error = ['passwordstr' => 'Password should be at least 8 characters in length and should
         include at least one upper case letter, one number, and one special character'];
         echo json_encode($error);
         exit();
    }else{
      $query = "UPDATE admin SET password = ?, change_status = ? WHERE id = ?";
      $stmt = $dbh->prepare($query);

      $hashedPassword = password_hash($pwd, PASSWORD_DEFAULT);
      $stmt->execute([$hashedPassword,$status,$_SESSION['adminid']]);

      $error = ['success' => 'Successfully changed password'];
      echo json_encode($error);
      exit();
    }
}
 ?>
