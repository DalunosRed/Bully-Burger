$(document).ready(function() {

// changing admin pass from modal
$('.form').on('submit', '#adminChangepass', function(e) {
  console.log("clicked");
  e.preventDefault();
    $.ajax({
      url: 'php/admin-changepassword.php',
      type: 'POST',
      dataType: 'JSON',
      data: {
        pwd: $("#pwdA").val(),
        repwd: $("#repwdA").val()
      }
    })
    .done(function(data) {
            console.log(data);
      $.map(data, function(val, index) {
        switch (index) {
          case 'passwordnotmatch':
          console.log(data);
            $('#modal-error').text(val);
            break;
          case 'passwordstr':
            $('#modal-error').text(val);
            break;
          case 'success':
            $('#modal-error').css('color', 'green');
            $('#modal').css({
              'visibility' : 'hidden',
              'opacity' : '0'
            });
            $('#modal-error').html("Updated Successfully")
            window.location.replace('pos');
            break;
        }
      });

    })
    .fail(function(xhr) {
      console.log("error" + xhr.responseText + xhr.status);
    });
});


// ============ cards link ===============
$('#v-employees').click(function(event) {
  /* Act on the event */
  window.location.replace('reg-users')
});
$('#v-category').click(function(event) {
  /* Act on the event */
  window.location.replace('manage-category')
});
$('#v-items').click(function(event) {
  /* Act on the event */
  window.location.replace('manage-item')
});
$('#v-inventory').click(function(event) {
  /* Act on the event */
  // window.location.replace('#')
});



//  =================== updating users/employee accounts ================
$('.form').on('submit', '#updateAJAX', function(e) {
  /* Act on the event */
  e.preventDefault();
  $.ajax({
    url: 'php/update.php',
    type: 'POST',
    dataType: 'JSON',
    data: {
      fname: $("#fnameUp").val(),
      lname: $("#lnameUp").val(),
      usn: $("#usnUp").val(),
      email: $("#emailUp").val(),
      pwd: $("#pwdUp").val(),
      repwd: $("#repwdUp").val()
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





// ==============item update==============
$('.form').on('submit', '#itemUpdate', function(e) {
  let date = new Date($('#expdateI').val());
  let d = date.getDate();
  let m =  date.getMonth();
  m += 1;  // JavaScript months are 0-11
  let y = date.getFullYear();
  console.log(d)
  let formattedDate = y + "-" + m + "-" + d;


  e.preventDefault();
  $.ajax({
    url: 'php/itemlist-update.php',
    type: 'POST',
    dataType: 'JSON',
    data: {
      prod: $("#prdnameI").val(),
      price: $("#priceI").val(),
      qty: $("#qtyI").val(),
      expdate: formattedDate,
      category_id: $('#categI').val()
    }
  })
  .done(function(data) {
    $.map(data, function(val, index) {
        switch (index) {
          case 'prodnametaken':
            $('#error').text(val);
            break;
          case 'success':
            window.location.replace('manage-item');
            //prints error if there is
            console.log(val);
            break;
        }
  });
})
  .fail(function(xhr, status, error) {
        console.log("error "  + error+xhr.responseText + xhr.status);
      });
});


// ==============item Add==============
$('.form').on('submit', '#itemAdd', function(e) {
  let date = new Date($('#expdateA').val());
  let d = date.getDate();
  let m =  date.getMonth();
  m += 1;  // JavaScript months are 0-11
  let y = date.getFullYear();
  let formattedDate = y + "-" + m + "-" + d;


  e.preventDefault();
  $.ajax({
    url: 'php/itemlist-add.php',
    type: 'POST',
    dataType: 'JSON',
    data: {
      prod: $("#prdnameA").val(),
      price: $("#priceA").val(),
      qty: $("#qtyA").val(),
      expdate: formattedDate,
      category_id: $('#categA').val()

    }
  })
  .done(function(data) {
    $.map(data, function(val, index) {
        switch (index) {
          case 'prodnametaken':
            $('#error').text(val);
            break;
          case 'success':
            window.location.replace('manage-item');
            //prints error if there is
            console.log(val);
            break;
        }
  });
})

});



// =====================categorty update ============/
$('.form').on('submit', '#categoryUpdate', function(e) {
  e.preventDefault();
  console.log("gwe");
  $.ajax({
    url: 'php/category-update.php',
    type: 'POST',
    dataType: 'JSON',
    data: {
      categ: $('#categU').val()
  }
  })
  .done(function(data) {
    $.map(data, function(val, index) {
      console.log(data);
        switch (index) {
          case 'categnametaken':
            $('#error').text(val);
            break;
          case 'success':
            window.location.replace('manage-category');
            //prints error if there is
            console.log(val);
            break;
        }
  });
  })
  .fail(function(xhr, status, error) {
        console.log("error "  + error+xhr.responseText + xhr.status);
      });
});


/// ==============Category Add==============
$('.form').on('submit', '#categAdd', function(e) {
  e.preventDefault();
  console.log("d")

  $.ajax({
    url: 'php/categorylist-add.php',
    type: 'POST',
    dataType: 'JSON',
    data: {
      categ: $("#categA").val()
    }
  })
  .done(function(data) {
    $.map(data, function(val, index) {
        switch (index) {
          case 'categnametaken':
            $('#error').text(val);
            break;
          case 'success':
            window.location.replace('manage-category');
            //prints error if there is
            console.log(val);
            break;
        }
  });
})
.fail(function(xhr, status, error) {
  console.log("error "  + error+xhr.responseText + xhr.status);
});
});



});//end ready
