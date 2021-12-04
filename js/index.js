// login
$(document).ready(function() {


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


// ================================================
// INVENTROY AJAX
$('.form').on('submit', '#inventoryAjax', function(e) {
  e.preventDefault();

  $.ajax({
      url: 'php/inventory.php',
      method: 'POST',
      dataType: 'JSON',
      data: {
        usn: $("#usnIn").val(),
        pwd: $("#pwdIn").val()
      },
    })
    .done(function(data) {
      console.log(data);
      $.map(data, function(val, index) {
        switch (index) {
          case 'emptyfields':
            $('.modal-error').text(val);
            break;
          case 'passwordnotmatch':
            $('.modal-error').text(val);
            break;
          case 'nouser':
            $('.modal-error').text(val);
            break;
          case 'connerror':
            $('.modal-error').text(val);
            break;
          case 'success':
            window.location.replace('inventory-category');
            console.log(data);
            break;
        }
      });
    })
    .fail(function(xhr) {
      console.log("error" + xhr.responseText + xhr.status);
    });
});



// =============================================== SCROLL EFFECT VANILLA JS
var coll = document.getElementsByClassName("tran");
var i;

for (i = 0; i < coll.length; i++) {
coll[i].addEventListener("click", function() {
this.classList.toggle("active");
var content = this.nextElementSibling;
if (content.style.maxHeight){
content.style.maxHeight = null;
} else {
content.style.maxHeight = content.scrollHeight + "px";
}
});
}
ScrollReveal({
    container: document.getElementById("tran"),
});

// Section 1

ScrollReveal().reveal(".form", {
    delay: 0,
    duration: 1000,
    distance: '20%',
    origin: 'bottom',
    opacity: 0,
    viewOffset: {
        top: 0,
        right: 0,
        bottom: 0,
        left: 0,
    },
});

ScrollReveal().reveal(".button_cont", {
    delay: 220,
    duration: 1000,
    distance: '20%',
    origin: 'bottom',
    opacity: 0,
    viewOffset: {
        top: 0,
        right: 0,
        bottom: 0,
        left: 0,
    },
});


ScrollReveal().reveal(".float-left-green", {
    delay: 220,
    duration: 1000,
    distance: '20%',
    origin: 'bottom',
    opacity: 0,
    viewOffset: {
        top: 0,
        right: 0,
        bottom: 0,
        left: 0,
    },
});

ScrollReveal().reveal(".box-choice", {
    delay: 220,
    duration: 1000,
    distance: '20%',
    origin: 'bottom',
    opacity: 0,
    viewOffset: {
        top: 0,
        right: 0,
        bottom: 0,
        left: 0,
    },
});
// ================================================


});//end ready
