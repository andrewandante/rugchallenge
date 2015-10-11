$(document).ready(function() {
  $("#RUGButton").click(function(){
    $.ajax({
      url: 'http://api.randomuser.me/?lego',
      dataType: 'json',
      success: function(data){
        if(!data['error']){
          console.log(data);
          var user = data.results[0].user;
          console.log(user);
          $('li[data-label="name"]').attr('data-value', user.name.first+' '+user.name.last);
          $('li[data-label="email"]').attr('data-value', user.email);
        }
      }
    });
  });
});
