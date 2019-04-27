$(document).on('click', '.to-submit', function(){
  var user = $(".user-name").val();
  var pass = $(".user-pass").val();
  var url="controller/login.php";
  var data={user: user, pass:pass};
  $.ajax({
    type: "POST",
    url: url,
    data: data,
    success: function(data){
      if(data==1){
        location.reload();
      }else{
        alert("Usuario o contraseña inválido")
      }
    }
  })
});
