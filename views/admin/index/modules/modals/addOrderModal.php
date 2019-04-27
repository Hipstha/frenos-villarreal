<?php
  $db = new conection();
  $service = $db->getServices();
  $status = $db->getStatus();
 ?>
<div id="add-order-modal" class="modal">
  <div class="modal-content">
    <h4>Agregar un pedido</h4>
    <div class="form-order">
      <form>
        <label>Servicio</label>
        <select class="browser-default select-service">
          <option value="0" disabled selected>Ingrese el servicio</option>
          <?php
            foreach ($service as $key => $serValue) {
            ?>
              <option value="<?php echo $serValue[0]; ?>"><?php echo $serValue[1]; ?></option>
            <?php
            }
           ?>
        </select>

        <div class="input-field client-name">
          <input id="client_name" type="text" class="validate" placeholder="Nombre de cliente">
          <label for="client_name">Cliente</label>
        </div>
        <div class="input-field note-order">
          <textarea id="order-note" class="materialize-textarea" placeholder="Caracterísitcas del pedido"></textarea>
          <label for="order-note">Notas</label>
        </div>

        <label>Estado</label>
        <select class="browser-default select-status">
          <option value="" disabled selected>Ingrese el estado del pedido</option>
          <?php
            foreach ($status as $key => $staVal) {
            ?>
              <option value="<?php echo $staVal[0]; ?>"><?php echo $staVal[1]; ?></option>
            <?php
            }
           ?>
        </select>

      </form>
    </div>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-close waves-effect waves-green btn-flat success-order">Aceptar</a>
    <a href="#!" class="modal-close waves-effect waves-green btn-flat cancel-order">Cancelar</a>
  </div>
</div>
