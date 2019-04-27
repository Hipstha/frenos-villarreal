<?php

  $db = new conection();
  $orders = $db->getOrders();
  foreach ($orders as $key => $ordVal) {
  ?>
    <article class="client-prod" order-id="<?php echo $ordVal['id']; ?>">
      <div class="client-board">
        <div class="client-board-container">
          <div class="head-info">
            <div class="prod-image">
              <img src="images/site/disc.png" alt="">
            </div>
            <div class="client-info">
              <div class="service" id-service ="<?php echo $ordVal['service']['id']; ?>">
                <p><strong>Servicio: </strong> <?php echo $ordVal['service']['service']; ?></p>
              </div>
              <div class="client-name">
                <p><strong>Nombre de cliente: </strong> <?php echo $ordVal['client']['name']; ?></p>
              </div>
            </div>
          </div>
          <div class="client-footer">
            <div class="body-info">
              <div class="service-notes">
                <div class="notes-head">
                  <p>Notas</p>
                </div>
                <div class="notes">
                  <p><?php echo $ordVal['note'] ?></p>
                </div>
                <div class="service-status" id-status="<?php echo $ordVal['status']['id']; ?>">
                  <p><strong>Estado de pedido: </strong> <?php echo $ordVal['status']['status']; ?></p>
                </div>
              </div>
            </div>
            <div class="body-options">
              <div class="modify-button">
                <div class="button-service modify-order">
                  <div class="schedule-option"><a class="btn-floating btn-large waves-effect waves-light blue"><i class="tiny material-icons">cached</i></a></div>
                </div>
                <div class="text"><p>Modificar</p></div>
              </div>
              <div class="delete-button delete-order">
                <div class="button-service">
                  <div class="schedule-option"><a class="btn-floating btn-large waves-effect waves-light red"><i class="tiny material-icons">close</i></a></div>
                </div>
                <div class="text"><p>Eliminar</p></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </article>
  <?php
  }
 ?>
