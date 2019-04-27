<?php

  SESSION_START();
  if(isset($_SESSION['name']) && isset($_SESSION['user']) ){
    include_once("views/admin/index/index.php");
  }else{
    include_once('views/admin/login/login.php');
  }

?>
