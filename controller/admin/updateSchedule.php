<?php
  require("../../requires.php");
  $idSchedule = $_POST['idSchedule'];
  $schedule = $_POST['schedule'];
  $db = new conection();
  echo $db->updateSchedule($idSchedule, $schedule);
 ?>
