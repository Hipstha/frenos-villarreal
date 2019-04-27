<?php

  require("../../requires.php");
  $db = new conection();
  $idOrder = $_POST['idOrder'];
  $order = $db->getOrders($idOrder);
  print_r(json_encode($order));

 ?>
