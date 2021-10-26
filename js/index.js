// login and Register
$(document).ready(function() {
  $('#login').css('border-bottom', '2px solid #317c64');

  // LOGIN FORM
  $('#login').click(function(event) {
    /* Act on the event */
    $('#login').css('border-bottom', '2px solid #317c64');
    $('#register').css('border-bottom', '0px');

    // changes form
    $('.form').html("") //resets
    $('.form').append(
      '<form id="loginAjax"><div class="input-container">'+
      '<input type="text" id="usnL" required />'+
      '<label>Username</label></div>'+

    '<div class="input-container">'+
      '<input type="password" id="pwdL" required/>'+
      '<label>Password</label></div>'+
      '<h4 id="error"></h4><input type="submit" class="btn"></input></form>')
  }); //end login

  // ================================================
  // REGISTER FORM
  $('#register').click(function(event) {
    /* Act on the event */
    $('#register').css('border-bottom', '2px solid #317c64');
    $('#login').css('border-bottom', '0px');

    // changes form
    $('.form').html("") //resets
    $('.form').append(
      '<form id="registerAjax"><div class="input-container">'+
      '<input type="text" id="fnameR" required/>'+
      '<label>First Name</label></div>'+

      '<div class="input-container">'+
      '<input type="text" id="lnameR" required/>'+
      '<label>Last Name</label></div>'+

      '<div class="input-container">'+
      '<input type="text" id="usnR" required/>'+
      '<label>Username</label></div>'+

      '<div class="input-container">'+
      '<input type="password" id="pwdR" required/>'+
      '<label>Password</label></div>'+

    '<div class="input-container">'+
      '<input type="password" id="repwdR" required />'+
      '<label>Re-type Password</label></div>'+
      '<h4 id="error"></h4><input type="submit" class="btn"></input></form>')
  });//end register

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
            case 'success':
              window.location.replace('pos');
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

// ================================================
// LOGIN AJAX
$('.form').on('submit', '#loginAjax', function(e) {
  e.preventDefault();

  $.ajax({
      url: 'php/login.php',
      method: 'POST',
      dataType: 'JSON',
      data: {
        usn: $("#usnL").val(),
        pwd: $("#pwdL").val()
      },
    })
    .done(function(data) {
      $.map(data, function(val, index) {
        switch (index) {
          case 'emptyfields':
            $('#error').text(val);
            console.log(val);
            break;
          case 'passwordnotmatch':
            $('#error').text(val);
            break;
          case 'nouser':
            $('#error').text(val);
            break;
          case 'success':
            window.location.replace('pos');
            console.log(data);
            break;
        }
      });
    })
    .fail(function(xhr) {
      console.log("error" + xhr.responseText + xhr.status);
    });
});


// ================================================
// ADMIN AJAX
$('.form').on('submit', '#adminAjax', function(e) {
  e.preventDefault();

  $.ajax({
      url: 'php/admin.php',
      method: 'POST',
      dataType: 'JSON',
      data: {
        usn: $("#usnA").val(),
        pwd: $("#pwdA").val()
      },
    })
    .done(function(data) {
      $.map(data, function(val, index) {
        switch (index) {
          case 'emptyfields':
            $('#modal-error').text(val);
            break;
          case 'passwordnotmatch':
            $('#modal-error').text(val);
            break;
          case 'nouser':
            $('#modal-error').text(val);
            break;
          case 'connerror':
            $('#modal-error').text(val);
            break;
          case 'success':
            window.location.replace('admin-panel');
            console.log(data);
            break;
        }
      });
    })
    .fail(function(xhr) {
      console.log("error" + xhr.responseText + xhr.status);
    });
});


});//end ready
