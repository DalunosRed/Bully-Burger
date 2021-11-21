$(document).ready(function() {


// ===============================================
  // AJAX Register
  $('.form').on('submit', '#registerAjax', function(e) {
    /* Act on the event */
    e.preventDefault();
    $.ajax({
      url: 'php/register.php',
      type: 'POST',
      dataType: 'JSON',
      data: {
        fname: $("#fnameR").val(),
        lname: $("#lnameR").val(),
        usn: $("#usnR").val(),
        pwd: $("#pwdR").val(),
        repwd: $("#repwdR").val()
      }
    })
    .done(function(data) {
      $.map(data, function(val, index) {
          switch (index) {
            case 'emptyfields':
              $('#error').text(val);
              break;
            case 'invalidusername':
              $('#error').text(val);
              break;
            case 'passwordnotmatch':
              $('#error').text(val);
              break;
            case 'usernametaken':
              $('#error').text(val);
              break;
            case 'passwordstr':
              $('#error').text(val);
              break;
            case 'success':
              window.location.replace('reg-users');
              //prints error if there is
              console.log(data);
              break;
          }
    });
  })
    .fail(function(xhr, status, error) {
          console.log("error "  + error+xhr.responseText + xhr.status);
        });
  });
});
