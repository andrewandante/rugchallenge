$(document).ready(function() {
  $("#RUGButton").click(function(){
    $.ajax({
      url: 'http://api.randomuser.me/?format=sql&nat=au&lego',
      dataType: 'json',
      success: function(data){
      console.log(data);
      }
    });
  });
});
