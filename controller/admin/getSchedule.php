<?php

  require("../../requires.php");
  $db = new conection();
  $idSchedule = $_POST['idSchedule'];
  $schedule = $db->getSchedule($idSchedule);
  print_r(json_encode($schedule));

 ?>
