<?php

  require("../../requires.php");
  $db = new conection();
  $services = $db->getServices();
  print_r(json_encode($services));

 ?>
