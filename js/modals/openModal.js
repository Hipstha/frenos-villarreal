$(document).ready(function(){
    $('select').formSelect();
    $('.modal').modal();
  });

$(document).on("click", ".add-order", function(){
  $('#add-order-modal').modal('open');
});

$(document).on("click", ".modify-schedule", function(){
  var schedule = this;
  var idSchedule = $(this).attr("id-schedule");
  $('#schedule-modal').attr("id-schedule", idSchedule);
  var inputDay = $($($($('#schedule-modal').children()[0]).children()[1]).children().children()[0]).children()[0];
  var inputTime = $($($($('#schedule-modal').children()[0]).children()[1]).children().children()[1]).children()[0];
  var url = "controller/admin/getSchedule.php";
  var data = {idSchedule: idSchedule};
  $.ajax({
    type: "POST",
    url: url,
    data: data,
    dataType : "json",
    success: function(data){
      var day = data['day'];
      var time = data['schedule'];
      $(inputDay).val(day);
      $(inputTime).val(time);
      $('#schedule-modal').modal('open');
    },
  });
});

$(document).on("click", ".modify-order", function(){
  var idOrder = $(this).parent().parent().parent().parent().parent().parent().attr("order-id");
  var url = "controller/admin/getOrders.php";
  var data = {idOrder: idOrder};
  $('#modify-order-modal').attr('order-id', idOrder);
  $.ajax({
    type: "POST",
    url: url,
    data: data,
    dataType : "json",
    success: function(data){
      $(document).find("#client_name-modify").val(data[0]['client']['name']);
      $(document).find("#order-note-modify").val(data[0]['note']);
      $('#modify-order-modal').modal('open');
    }
  })
});

$(document).on("click", ".success-order-modify", function(){
  var idOrder = $(document).find('#modify-order-modal').attr('order-id');
  var client = $(document).find("#client_name-modify").val();
  var idService = $(document).find(".select-service-modify").val();
  var note = $(document).find("#order-note-modify").val();
  var idStatus = $(document).find(".select-status-modify").val();
  var url = "controller/admin/updateOrder.php";
  var data = {idOrder:idOrder, client:client, idService:idService, note:note, idStatus:idStatus}
  $.ajax({
    type: "POST",
    url: url,
    data: data,
    success: function(data){
      if(data==1){
        location.reload();
      }else{
        alert("Hubo un error");
      }
    }
  });
});

$(document).on("click", ".delete-order", function(){
  $('#delete-order-modal').modal('open');
  var idOrder = $(this).parent().parent().parent().parent().parent().attr("order-id");
  $(document).find("#delete-order-modal").attr("order-id", idOrder);
});

$(document).on("click", ".delete-this-order", function(){
  var idOrder =   $(document).find("#delete-order-modal").attr("order-id");
  var url = "controller/admin/deleteOrder.php";
  var data = {idOrder: idOrder};
  $.ajax({
    type:"POST",
    url: url,
    data: data,
    success: function(data){
      if(data==1){
        location.reload();
      }else{
        alert("Hubo un error");
      }
    }
  });
});

$(document).on("click", ".form-success", function(){
  var schedule = $(this).parent().parent();
  var idSchedule = $(this).parent().parent().attr("id-schedule");
  var scheduleTime = $($($($($(schedule).children()[0]).children()[1]).children().children()[1]).children()[0]).val();
  var data = {idSchedule:idSchedule, schedule:scheduleTime}
  var url = "controller/admin/updateSchedule.php";
  $.ajax({
    type: "POST",
    url: url,
    data: data,
    success: function(data){
      console.log(data);
      if(data==1){
        $(".modify-schedule").each(function(index){
          if($(this).attr("id-schedule")==idSchedule){
            $($($(this).children()[1]).children()[1]).text(scheduleTime);
          }
        })
      }else{
        alert("Hubo un error al modificar");
      }
    }
  })
});

$(document).on("click", ".success-order", function(){
  var serviceId = $(document).find(".select-service").val();
  var clientName = $(document).find("#client_name").val()
  var note = $(document).find("#order-note").val();
  var statusId = $(document).find(".select-status").val();
  var url = "controller/admin/setOrder.php";
  var data = {serviceId: serviceId, clientName: clientName, note: note, statusId: statusId};
  if(serviceId!=null && clientName!=false && statusId!=null ){
    $.ajax({
      type: "POST",
      url:url,
      data: data,
      success: function(data){
        location.reload();
      }
    })
  }else{
    alert("Falta ingresar servicio, nombre de cliente o status");
  }
})
