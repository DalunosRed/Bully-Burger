$(document).ready(function() {
  // Check if admin pass is already changed
  $.ajax({
    url: 'php/admin-password-status.php',
    type: 'POST',
    dataType: 'JSON'
  })
  .done(function(data) {
    console.log(data)
  $.map(data, function(val, index) {
    console.log(val)
    if (val == 0) {  //0=false  equivalent to nottrue
      $("#change-pass").html("Your password is still on default, please change it")
    } else {
      $("#change-pass").html("")
    }
  });
})
  .fail(function(xhr) {
    console.log("error" + xhr.responseText + xhr.status);
  });
  });