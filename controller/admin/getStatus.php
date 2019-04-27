<?php

  require("../../requires.php");
  $db = new conection();
  $status = $db->getStatus();
  print_r(json_encode($status));

 ?>
