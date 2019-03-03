<?php

session_start();

if(isset($_POST['loginSubmit'])){

  include 'dbh.inc.php';

  $uid = mysqli_real_escape_string($conn, $_POST['uid']);
  $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

  //Error handlers
  //Check if inputs are empty
  if(empty($uid)|| empty($pwd)){
    header("Location: ../index.php?login=empty");
    exit();
  }else{
      $sql = "SELECT * FROM users WHERE uid='$uid' OR user_email='$uid'";
      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);
      if($resultCheck < 1){
        header("Location: ../index.php?login=error1");
        exit();
      }else{
        if($row = mysqli_fetch_assoc($result)){
          //De-hashing the password
          $hashedPwdCheck = password_verify($pwd, $row['pwd']);
          if($hashedPwdCheck == false){
            header("Location: ../index.php?login=error2");
            exit();
          }elseif($hashedPwdCheck == true){
            //Login the user here
            $_SESSION['id'] = 1;
            $_SESSION['u_first'] = $row['user_first'];
            $_SESSION['u_last'] = $row['user_last'];
            $_SESSION['u_email'] = $row['user_email'];
            $_SESSION['u_uid'] = $row['uid'];
            header("Location: ../index.php?login=success");
            exit();
        }
      }
    }
  }
}else{
    header("Location: ../Snack.php?login=error");
    exit();
  }
