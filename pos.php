<?php
session_start();
if (!isset($_SESSION['id'])) {
  header("Location: /Bully-Burger");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="theme-color" content="#3e454c">

  <title>Bully Burger Panel | Admin Dashboard</title>
  <!-- bootstrap 5 icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
  <!-- Updated Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <!-- POS Stye -->
  <link rel="stylesheet" href="./css/pos.css">
  <script type="text/javascript" src="./js/pos.js">

  </script>
</head>

<body>
<!-- navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="pos">
        <img src="images/icon-Logo.png" alt="Brand" width="100px">
      </a>
      <h3 class="navbar-text"><span style="color:#ed7d31">Bully</span>-Burger</h3>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-flex">
            <img src="images/icon-admin.png" alt="Avatar" width="40px">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Account
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Change Passsword</a></li>
                <li><a class="dropdown-item" href="logout">Logout</a></li>
              </ul>
            </li>
          </ul>
      </div>
    </div>
  </nav>
<!-- body content -->
  <div class="container-fluid padding-20">
    <div class="row">
      <div class="col-8">

        <div class="content">
          <div class="search-top">
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit"><i class="bi bi-search"></i></button></button>
            </form>
          </div>

          <div class="scrollable-cards">
            <button type="button" class="btn btn-light btn-cards">
              <img src="images/the-burger.png" alt="Burger-icon">
              Burger
            </button>
            <button type="button" class="btn btn-light btn-cards">
              <img src="images/the-burger.png" alt="Burger-icon">
              Burger
            </button>
            <button type="button" class="btn btn-light btn-cards">
              <img src="images/the-burger.png" alt="Burger-icon">
              Burger
            </button>
            <button type="button" class="btn btn-light btn-cards">
              <img src="images/the-burger.png" alt="Burger-icon">
              Burger
            </button>
            <button type="button" class="btn btn-light btn-cards">
              <img src="images/the-burger.png" alt="Burger-icon">
              Burger
            </button>
            <button type="button" class="btn btn-light btn-cards">
              <img src="images/the-burger.png" alt="Burger-icon">
              Burger
              <span class="position-absolute top-0 start-0 translate-middle badge rounded-pill bg-success text-light">
                  5
                </span>
              <span class="position-absolute top-10 start-100 translate-middle badge rounded-pill v-badge">
                  &times;
                </span>
            </button>
            <button type="button" class="btn btn-light btn-cards">
              <img src="images/the-burger.png" alt="Burger-icon">
              Burger
            </button>
            <button type="button" class="btn btn-light btn-cards">
              <img src="images/the-burger.png" alt="Burger-icon">
              Burger
            </button>
            <button type="button" class="btn btn-light btn-cards">
              <img src="images/the-burger.png" alt="Burger-icon">
              Burger
            </button>
            <button type="button" class="btn btn-light btn-cards">
              <img src="images/the-burger.png" alt="Burger-icon">
              Burger
            </button>
            <button type="button" class="btn btn-light btn-cards">
              <img src="images/the-burger.png" alt="Burger-icon">
              Burger
            </button>
            <button type="button" class="btn btn-light btn-cards">
              <img src="images/the-burger.png" alt="Burger-icon">
              Burger
            </button>
            <button type="button" class="btn btn-light btn-cards">
              <img src="images/the-burger.png" alt="Burger-icon">
              Burger
            </button>

          </div>
        </div>

        <div class="choices">
          <button type="button" class="btn btn-outline-success btn-choices">
            <img src="images/the-burger.png" alt="Burger-icon">
            Burger
          </button>
          <button type="button" class="btn btn-outline-success btn-choices">
            <img src="images/the-bread.png" alt="Burger-icon">
            Bread
          </button>
          <button type="button" class="btn btn-outline-success btn-choices">
            <img src="images/the-drinks.png" alt="Burger-icon">
            Drinks
          </button>
          <button type="button" class="btn btn-outline-success others btn-choices">
            <img src="images/the-food.png" alt="Burger-icon">
            Others
          </button>
        </div>

        <div class="v-align-right">
          <div class="order-buttons" align="right">
            <a type="button" class="btn btn-success btn-choices order" href="#modal">
              HOLD ORDER</a>
            </button>
            <a type="button" class="btn btn-danger btn-choices order" href="#modal">
              CANCEL ORDER</a>
            </button>
          </div>
        </div>

      </div>


<!-- ============================================================================ -->
      <!-- checkout -->
      <div class="col-4 checkout">
          <h3>Checkout</h3>
          <div class="container-fluid no-pad">
            <div class="row align-items-start no-pad">
              <div class="col-6 checkout-header">
                Name
              </div>
              <div class="col-3 checkout-header">
                Qty
              </div>
              <div class="col-3 checkout-header">
                Price
              </div>
            </div>
          </div>
        <!-- content -->
        <div class="container-fluid no-pad v-height">
          <!-- ============== -->
          <div class="row no-pad checkout-flex">
              <div class="col-6 no-pad">
                <div class="input-group flex-wrap ">
                  <span class="input-group-text no-bgcolor-border pad-marg text-wrap text-break " id="addon-wrapping ">
                    <img src="images/trash-icon.png" alt="trashicon" width="24px">
                    Burger Whopper
                   </span>
                </div>
              </div>
                <div class="col-3 no-pad">
                  <div class="input-group flex-wrap">
                    <span class="input-group-text no-bgcolor-border pad-marg" id="addon-wrapping">
                      <i class="bi bi-plus-circle-fill"></i>
                        1
                      <i class="bi bi-dash-circle-fill"></i>
                     </span>
                  </div>
                </div>
                <div class="col-3 no-pad">
                  P500.00
                </div>
            </div>
          <!-- ============== -->
          <div class="row no-pad checkout-flex">
              <div class="col-6 no-pad">
                <div class="input-group flex-wrap ">
                  <span class="input-group-text no-bgcolor-border pad-marg text-wrap text-break " id="addon-wrapping ">
                    <img src="images/trash-icon.png" alt="trashicon" width="24px">
                    Fries
                   </span>
                </div>
              </div>
                <div class="col-3 no-pad">
                  <div class="input-group flex-wrap">
                    <span class="input-group-text no-bgcolor-border pad-marg" id="addon-wrapping">
                      <i class="bi bi-plus-circle-fill"></i>
                        1
                      <i class="bi bi-dash-circle-fill"></i>
                     </span>
                  </div>
                </div>
                <div class="col-3 no-pad">
                  P500.00
                </div>

            </div>
          </div> <!--container-->


          <div class="col-12 v-price">
            <div class="checkout-price">
              <h6><span>Subtotal:</span></h6>
              <h3>P567.00</h3>
            </div>
            <button type="button" class="btn btn-success">CHECK OUT</button>
          </div>
        </div> <!--col4-->


      </div>
    </div> <!-- end container-->




     <!-- MODAL  should be treated as a separate section-->
     <div id="modal" class="modal">
         <div class="modal__content">
              <p>GWEGEW</p>
             <a href="#" class="modal__close">&times;</a>
         </div>
     </div>

</body>

</html>
