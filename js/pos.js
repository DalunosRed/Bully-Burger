$(document).ready(function () {
  let initialCategory,thisclicked, ctr=0;

  $(".choices button:first-child").addClass( "btn-choices-add");
  initialCategory = $(".choices button:first-child").text();

  console.log(initialCategory)
  getitems();

  $('.choices').on('click', 'button', function () {
    console.log($(this).text())
    $(".choices button").removeClass( "btn-choices-add");
    initialCategory = $(this).text();
    $(this).addClass( "btn-choices-add");
    ctr=0
    getitems();
  });


    //clicking items
    $('.scrollable-cards').on('click', 'button', function () {
      thisclicked = $(this).text()
      console.log($(this).text())
      ctr++
       getIndivItem();
    });

   // FUNCTION
   function getitems(){
    // ajax for getting items based on clicked
    $.ajax({
     url: 'php/pos/get-items.php',
     type: 'POST',
     dataType: 'JSON',
     data: {
       categ: initialCategory
     }
   })
   .done(function(data) {
     $.map(data, function(val, index) {
       $('.scrollable-cards').html
         ('<button type="button" class="btn btn-light btn-cards">' +
         val.ProductName +
         ' </button>'
         );
     });
   })
   .fail(function(xhr) {
     console.log('error' + xhr.responseText + xhr.status);
   });
 }


    // =====================CHECKOUT
    function getIndivItem() {
      $.ajax({
        url: 'php/pos/get-individual-item.php',
        type: 'POST',
        dataType: 'JSON',
        data: {
          prod: thisclicked
        }
      })
      .done(function(data) {
        console.log(data)
        $.map(data, function(val, index) {
          console.log(val['ProductName'])
          $('.items-js').append(
            '<div class="row no-pad checkout-flex">'+
            '<div class="col-6 no-pad">'+
            '<div class="input-group flex-wrap ">'+
            '<span class="input-group-text no-bgcolor-border pad-marg text-wrap text-break " id="addon-wrapping ">'+
            '<img id="trash" src="images/trash-icon.png" alt="trashicon" width="24px">'+
            val.ProductName +'</span></div></div>'
      
            +'<div class="col-3 no-pad">'
            +'<div class="input-group flex-wrap">'
            +'  <span class="input-group-text no-bgcolor-border pad-marg" id="addon-wrapping">'
            +'<i id="addC" class="bi bi-plus-circle-fill"></i>'
            +ctr
            +'<i id="minusC" class="bi bi-dash-circle-fill"></i>'
            +'</span></div></div>'
            +'<div class="col-3 no-pad">'
            +val.Price
            +'</div></div>'
          )
          
       });
      })
      .fail(function(xhr) {
        console.log('error' + xhr.responseText + xhr.status);
      });
    }
    



















});