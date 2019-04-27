<div id="modify-order-modal" class="modal">
    <div class="modal-content">
      <h4>Modificar un pedido</h4>
      <div class="form-order-modify">
        <form>
          <div class="service-modify">
            <label>Servicio</label>
            <select class="select-service-modify browser-default">
              <option value="" disabled selected>Ingrese el servicio</option>
              <option value="1">Rectificado de dísco</option>
              <option value="2">Rectificado de tambor</option>
            </select>
          </div>
          <div class="input-field client-name-modify">
            <input id="client_name-modify" type="text" class="validate" placeholder="Nombre de cliente">
            <label for="client_name-modify">Cliente</label>
          </div>
          <div class="input-field note-order-modify">
            <textarea id="order-note-modify" class="materialize-textarea" placeholder="Caracterísitcas del pedido"></textarea>
            <label for="order-note-modify">Notas</label>
          </div>
          <div class="status-order-modify">
            <label>Estado</label>
            <select class="select-status-modify browser-default">
              <option value="" disabled selected>Ingrese el estado del pedido</option>
              <option value="1">En espera</option>
              <option value="2">Trabajando en ellos</option>
              <option value="2">Terminado (pendiente de entrega)</option>
              <option value="2">Entregado</option>
            </select>
          </div>
        </form>
      </div>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat success-order-modify">Aceptar</a>
      <a href="#!" class="modal-close waves-effect waves-green btn-flat cancel-order-modify">Cancelar</a>
    </div>
</div>
