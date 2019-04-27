<?php

  require("../../requires.php");
  $db = new conection();
  $idOrder = $_POST['idOrder'];
  $order = $db->deleteOrder($idOrder);
  echo $order;

 ?>
