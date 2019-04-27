<?php
  require("../requires.php");
  $db = new conection();
  $user = $_POST['user'];
  $pass = $_POST['pass'];
  $thisUser = $db->getAdmin($user, $pass);
  if($thisUser){
    echo 1;
    $idUser = $thisUser['id'];
    $userName = $thisUser['name'];
    $userUser = $thisUser['user'];
    SESSION_START();
    $_SESSION['id'] = $idUser;
    $_SESSION['name'] = $userName;
    $_SESSION['user'] = $userUser;
  }else{
    echo 0;
  }
 ?>
