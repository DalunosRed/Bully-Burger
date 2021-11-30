$(document).ready(function () {
  let initialCategory,thisclicked, ctr=0 ,ctr2=0;
  let arr=[];
  let arrtemp=[];
  let arrNum=[];
  let total = 0;
  let prevTarget = null;
let numOccurences, numQty;
let prodname, price, qty=0;

  $(".choices button:first-child").addClass( "btn-choices-add");
  initialCategory = $(".choices button:first-child").text();

  getitems();

  $('.choices').on('click', 'button', function () {
    $(".choices button").removeClass( "btn-choices-add");
    initialCategory = $(this).text();
    $(this).addClass( "btn-choices-add");
    $('.scrollable-cards').html('')
    // ctr=0
    getitems();
  });


    //clicking items
    $('.scrollable-cards').on('click', 'button', function () {
      // removing error text
      $('#error').text('')

      thisclicked =$(this).text();
      getIndivItem();

    });

    // add quantity on checkout menu
    $('.items-js').on('click', '#addC', function(event) {
      event.preventDefault();
      total = 0
      $('.items-js').html('')

      let checkoutClicked = $(this).parents('.chh').find('.ProductName').text();

      for (var i = 0; i < arr.length; i++) {
        if (arr[i].Name == checkoutClicked) {
          arr[i].Quantity+=1;
          console.log(arr)
        }
        itemAppend(arr[i].Name,arr[i].Price, arr[i].Quantity);
      }
      //get total
      getTotal()
    });


    // Minus quantity on checkout menu
    $('.items-js').on('click', '#minusC', function(event) {
      event.preventDefault();
      total = 0
      $('.items-js').html('')

      let checkoutClicked = $(this).parents('.chh').find('.ProductName').text();

      for (var i = 0; i < arr.length; i++) {
        if (arr[i].Name == checkoutClicked) {
          arr[i].Quantity-=1;

          if (arr[i].Quantity == 0) {
            // remove from main arr and temp arr
            arr.splice(i,1)
            arrtemp.splice(i,1)
          }
        }
        itemAppend(arr[i].Name,arr[i].Price, arr[i].Quantity);
      }
      //get total
      getTotal()
    });



    // Check out button
    $('#checkout-btn').click(function(event) {
      if (arr.length == 0) {
        $('#error').text('Please Choose an Order First')
      }else {
        $.ajax({
          url: 'php/pos/checkout.php',
          type: 'POST',
          dataType: 'JSON',
          data: {
            arr : JSON.stringify(arr)
          }
        })
        .done(function(data) {
          console.log("success");
        })
        .fail(function(xhr) {
          console.log('error' + xhr.responseText + xhr.status);
        });
      }


    });
// ==============================
     // FUNCTIONS
    function itemAppend(ProductName, Price, QTY){
      $('.items-js').append(
        '<div class="row no-pad checkout-flex chh">'+
        '<div class="col-6 no-pad">'+
        '<div class="input-group flex-wrap ">'+
        '<span class="input-group-text no-bgcolor-border pad-marg text-wrap text-break ProductName" id="addon-wrapping ">'+
        '<img id="trash" src="images/trash-icon.png" alt="trashicon" width="24px">'+
        ProductName+'</span></div></div>'

        +'<div class="col-3 no-pad">'
        +'<div class="input-group flex-wrap">'
        +'  <span class="input-group-text no-bgcolor-border pad-marg Qty" id="addon-wrapping">'
        +'<i id="minusC" class="bi bi-dash-circle-fill"></i>'
        +QTY
        +'<i id="addC" class="bi bi-plus-circle-fill"></i>'
        +'</span></div></div>'
        +'<div class="col-3 no-pad Price">'
        + '&#8369;'+ parseFloat(Price).toFixed(2)
        +'</div></div>'
      )
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
            $.map(data, function(val, index) {

              numOccurences = $.grep(arrtemp, function (elem) {
                 return elem === thisclicked;
             }).length;


                if (numOccurences == 0) {
                  $('.items-js').html('')
                  arrtemp.push(thisclicked)
                  total =0
                  qty=0 // reset
                  ++qty;
                  arr.push({
                    Name :  val.ProductName,
                    Quantity : qty,
                    Price : val.Price
                  })
                  total = 0
                    for (var i = 0; i < arr.length; i++) {
                      itemAppend(arr[i].Name,arr[i].Price, arr[i].Quantity);
                    }
                    //get total
                    getTotal()

                } else {
                  total = 0
                  $('.items-js').html('')
                  for (var i = 0; i < arr.length; i++) {
                    if (arr[i].Name == thisclicked) {
                      arr[i].Quantity+=1;
                    }
                      itemAppend(arr[i].Name,arr[i].Price, arr[i].Quantity);
                  }
                  //get total
                  getTotal()
                }
           });
          })
          .fail(function(xhr) {
            console.log('error' + xhr.responseText + xhr.status);
          });
        }

        // gettotal price
    function getTotal(){
      for (var i = 0; i < arr.length; i++) {
        total+= parseFloat(arr[i].Price * arr[i].Quantity)
        $('#subtotal').html("&#8369;" + total.toFixed(2))
      }
    }

    // ajax for getting item based on clicked
     function getitems(){
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
         $('.scrollable-cards').append
           ('<button type="button" class="btn btn-light btn-cards">'+val.ProductName+'</button>'
           );
       });
     })
     .fail(function(xhr) {
       console.log('error' + xhr.responseText + xhr.status);
     });
   }




















});
