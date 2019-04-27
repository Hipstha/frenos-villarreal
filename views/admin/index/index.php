<?php
  require("requires.php");
  $db = new conection();
  $schedule = $db->getSchedule();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <?php require("modules/head.php"); ?>
   <body>
     <?php require("modules/navBar.php"); ?>
     <div class="body">
       <div class="body-content">
         <section class="orders">
           <?php require("modules/order.php"); ?>
         </section>
         <section class="menu-right">
           <article>
             <div class="menu-right-container">
               <div class="menu-right-head">
                 <p>Opciones</p>
               </div>
               <div class="menu-rigth-body">
                 <?php require("modules/menuRightOption.php"); ?>
                 <div class="menu-right-schedule">
                   <div class="schedule-head">
                     <span>Horario</span>
                   </div>
                   <div class="schedule-body">
                     <?php
                        require("modules/schedule.php");
                      ?>
                   </div>
                 </div>
               </div>
             </div>
           </article>
         </section>
       </div>
     </div>
     <?php
        require("modules/modals/addOrderModal.php");
        require("modules/modals/deleteOrderModal.php");
        require("modules/modals/modifyOrderModal.php");
        require("modules/modals/scheduleModal.php");
      ?>
   </body>
</html>
