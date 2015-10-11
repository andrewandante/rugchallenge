$(document).ready(function() {
  $("#RUGButton").click(function(){
    $.ajax({
      url: 'https://randomuser.me/api/',
      dataType: 'json',
      success: function(data){
      console.log(data);
      }
    });
  });
});
