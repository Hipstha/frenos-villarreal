<?php
  foreach ($schedule as $key => $schVal) {
    ?>
      <div class="schedule-option modify-schedule" id-schedule="<?php echo $schVal[0]; ?>">
        <div class="schedule-option"><a class="btn-floating btn-large waves-effect waves-light blue add-service"><i class="tiny material-icons">cached</i></a></div>
        <div class="schedule-text">
          <span class="thisDay"><?php echo $schVal[1]; ?> </span>
          <span class="thisTime"><?php echo $schVal[2]; ?></span>
        </div>
      </div>
    <?php
  }
 ?>
