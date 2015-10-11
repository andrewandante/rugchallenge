$(document).ready(function callRUGAPI() {
  $("#RUGButton").click(function(){
    $.ajax({
      url: 'http://api.randomuser.me/?lego',
      dataType: 'json',
      success: function(data){
        if(!data['error']){
          console.log(data);
          return data;
        }
      }
    });
  });  
});
