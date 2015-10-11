$(document).ready(function callRUGAPI() {
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
$("#RUGButton").click(callRUGAPI(){});
