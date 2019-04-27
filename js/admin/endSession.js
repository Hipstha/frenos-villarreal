$(document).on("click", ".exit-session", function(){
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.open('GET','controller/endSession.php', true);
  xmlhttp.onreadystatechange=function(){
    if (xmlhttp.readyState == 4){
      if(xmlhttp.status == 200){
        alert("Se ha cerrado la sesión");
      }
    }
   };
   xmlhttp.send(null);
   location.reload();
});
