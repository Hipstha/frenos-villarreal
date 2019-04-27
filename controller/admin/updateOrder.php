<?php

  require("../../requires.php");
  $db = new conection();
  $idOrder = $_POST['idOrder'];
  $client = $_POST['client'];
  $idService = $_POST['idService'];
  $note = $_POST['note'];
  $idStatus = $_POST['idStatus'];
  $order = $db->updateOrder($idOrder, $client, $idService, $note, $idStatus);
  echo $order;

 ?>
