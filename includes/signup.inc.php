<?php



if(isset($_POST['submit'])){

  include_once 'dbh.inc.php';


  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $uid = mysqli_real_escape_string($conn, $_POST['uid']);
  $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);


  //Error handlers
  //Check for empty fields
  if(empty($email)||empty($uid)||empty($pwd)){
   
    exit();
  }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        
        exit();
      }else{
        $sql = "SELECT * FROM users WHERE uid='$uid'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if($resultCheck > 0 ){
          Echo 1;
          exit();
        } else {
          //Hashing the Password
          $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
          //Insert the user into the datbase
          $sql = "INSERT INTO users (user_email, uid, pwd) VALUES ('$email', '$uid', '$hashedPwd');";
          mysqli_query($conn, $sql);
            Echo 2;
            exit();
        }
      }
    
  
}else{
  echo 3;
  exit();
}
