<?php

if(isset($_POST['logoutSubmit'])){
  
  session_start();
  $urlCode = $_SESSION['urlCode'];
  session_unset();
  session_destroy();

  session_start();
  $_SESSION['urlCode'] = $urlCode;

  header("Location: ../Index.php");
  exit();
}
 ?>
