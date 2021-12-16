$(document).ready(function () {
  let initialCategory,thisclicked;
  let arr=[];
  let arrtemp=[];

let total = 0;
let numOccurences;
let prodname, price, qty=0;


  $(".choices button:first-child").addClass( "btn-choices-add");
  initialCategory = $(".choices button:first-child").text();

  getitems();

// ==========================USER INTERACTIONS ====================================
  $('.choices').on('click', 'button', function () {
    $(".choices button").removeClass( "btn-choices-add");
    initialCategory = $(this).text();
    $(this).addClass( "btn-choices-add");
    $('.scrollable-cards').html('')

    getitems();
  });

    //clicking items
    $('.scrollable-cards').on('click', 'button', function () {
      // removing error text
      $('#error').text('')
      thisclicked =$(this).find('h4').text();
      getIndivItem();
    });


// ========================CHECKOUT INTERACTIONS ===================================
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

              if (arr.length <=0) {
                $('.items-js').html('')
                $('#subtotal').html("&#8369;" + total.toFixed(2))
                break; //break from loop
              }
            }
          }
      }
      for (var j = 0; j < arr.length; j++) {
        itemAppend(arr[j].Name,arr[j].Price, arr[j].Quantity);
      }
      //get total
      getTotal()
    });


    // Trash Button
    $('.items-js').on('click', '#trash', function(event) {
      event.preventDefault();
      total = 0
      $('.items-js').html('')
      let checkoutClicked = $(this).parents('.chh').find('.ProductName').text();

      for (var i = 0; i < arr.length; i++) {
          if (arr[i].Name == checkoutClicked) {
            arr.splice(i,1)
            arrtemp.splice(i,1)
          }

          if (arr.length <=0) {
            $('.items-js').html('')
            $('#subtotal').html("&#8369;" + total.toFixed(2))
            break; //break from loop
          }
        }

        for (var j = 0; j < arr.length; j++) {
          itemAppend(arr[j].Name,arr[j].Price, arr[j].Quantity);
        }
        //get total
        getTotal()
    });

    // Check out button
    $('#checkout-btn').click(function(event) {
      if (arr.length == 0) {
        $('#error').text('Please Choose an Order First')
      }else {
        checkout() // checkout
      }
    });

// ==================MODALS AND OTHER BUTTON INTERACTIONS =======================
  // Close Modal
  $('.modal__close').click(function(event) {
    closeModal();
  });

  //new order
  $('#newOrder').click(function(event) {
   arr = [] //reset array
   arrtemp = []
   $('.items-js').html('')
   console.log(arr, arrtemp);
  });

// PRINT
  $('#Print').click(function(event) {
    sessionStorage.setItem('arr', JSON.stringify(arr));  //send array
    window.location.replace('php/pos/receipt');
  });

// CANCEL PRINT
  $('#Cancel').click(function(event) {
    closeModal();
  });


  // ================================================
// ================================================
     // FUNCTIONS
     // =================CLOSE MODAL ====================
    function closeModal(){
      $('.modal').css({
        "visibility" : "hidden",
        "opacity" : "0"
      });
      $('.scrollable-cards').html('')
      getitems(); //reset item for updating stocks
     }

     //=============== append item to checkout section===============
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



    // ================ transact to sales====================
    function sales(){
      let totalQty = 0

      let date = new Date();
      let d = date.getDate();
      let m =  date.getMonth();
      m += 1;  // JavaScript months are 0-11
      let y = date.getFullYear();
      let formattedDate = y + "-" + m + "-" + d;
      console.log(date);
      console.log(formattedDate);
      for (var i = 0; i < arr.length; i++) {
        totalQty += arr[i].Quantity
      }
      $.ajax({
        url: 'php/pos/sales.php',
        type: 'POST',
        dataType: 'JSON',
        data: {
          sales: total,
          totalSold: totalQty,
          date : formattedDate
        }
      })
      .done(function() {
        console.log("success");
      })
      .fail(function(xhr) {
        console.log('error' + xhr.responseText );
      });

    }


    // =====================CHECKOUT===============
    function checkout() {
      $.ajax({
        url: 'php/pos/checkout.php',
        type: 'POST',
        dataType: 'JSON',
        data: {
          arr : JSON.stringify(arr)
        },
      beforeSend: function() {
          $("#loading_wrap").show();
          $(".loading_div").show();
       },
      complete: function() {
          setTimeout(function() {
            $("#loading_wrap").hide();
            $(".loading_div").hide();
        }, 500);
      }
      })
      .done(function(data) {
        $.map(data, function(val, index) {
          console.log(val)
            switch (index) {
              case 'shortstock':
                $('#error').text(val);
                break;
              case 'success':
                sales() //insert into sales
                setTimeout(function() {
                  $('.modal').css({
                    "visibility" : "visible",
                    "opacity" : "1"
                  });
                  $('#error').text('');

              }, 700);
                break;
              }
            });
      })
      .fail(function(xhr) {
        console.log('error' + xhr.responseText );
      });
    }


    //============== get individual item============
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

        // ====================gettotal price==============
    function getTotal(){
      for (var i = 0; i < arr.length; i++) {
        total+= parseFloat(arr[i].Price * arr[i].Quantity)
        $('#subtotal').html("&#8369;" + total.toFixed(2))
      }
    }

    // ====================ajax for getting item based on clicked=======================
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
         url = 'images/food-images/'+ val.image;
         console.log(url);
         if (val.Qty <= 0) {
           $('.scrollable-cards').append
             ('<button type="button" class="btn btn-light btn-cards" disabled><p>'+ val.Qty+'</p><h4>'+val.ProductName+ '</h4><h6>Out of Stock</h6>'+'</button>');
         } else{
           $('.scrollable-cards').append
             ('<button type="button" style="background: #f8f9fa center / contain no-repeat url('+url+');" class="btn btn-light btn-cards"><p>'+val.Qty+'</p>'+
             '<h4>'+val.ProductName+'</h4></button>');
         }
         // $('.scrollable-cards').find('.btn-cards').css('background' , 'center / contain no-repeat url("images/food-images/'+ val.image + '")');
       });
     })
     .fail(function(xhr) {
       console.log('error' + xhr.responseText + xhr.status);
     });
   }






});
