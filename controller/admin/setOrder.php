<?php

  SESSION_START();
  require("../../requires.php");
  $serviceId = $_POST['serviceId'];
  $clientName = $_POST['clientName'];
  $notes = $_POST['note'];
  $statusId = $_POST['statusId'];
  $adminId = $_SESSION['id'];
  $db = new conection();
  echo "<pre>";
  print_r($db->setOrder($clientName, $adminId, $serviceId, $statusId, $notes));
  
 ?>
