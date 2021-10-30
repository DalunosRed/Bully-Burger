<?php
session_start();

//checks if already logged in
if (isset($_SESSION['id'])) {
  header("Location: /Bully-Burger/pos");
}
//checks if admin is  logged in
// include('includes/config.php');
// if(isset($_POST['login']))
// {
// $email=$_POST['username'];
// $password=md5($_POST['password']);
// $sql ="SELECT username,password FROM admin WHERE username=:email and password=:password";
// $query= $dbh -> prepare($sql);
// $query-> bindParam(':email', $email, PDO::PARAM_STR);
// $query-> bindParam(':password', $password, PDO::PARAM_STR);
// $query-> execute();
// $results=$query->fetchAll(PDO::FETCH_OBJ);
// if($query->rowCount() > 0)
// {
// $_SESSION['alogin']=$_POST['username'];
// echo "<script type='text/javascript'> document.location = 'admin-panel.php'; </script>";
// } else{
//
//   echo "<script>alert('Invalid Details');</script>";
//
// }
// }
//checks if admin is  logged in
if (isset($_SESSION['adminid'])) {
  header("Location: /Bully-Burger/admin-panel");
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS</title>
    <link rel="stylesheet" href="css/index.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="js/index.js" charset="utf-8"></script>
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
  </head>
  <body>

  <div id="tran" class="tran">
    <div class="container">
      <div class="container-green"></div>

      <div class="float">
        <div class="float-left-green">
          <img src="images/Logo.png" alt="Logo" height="300px">
          <div class="float-text">
            <p>THE MEATIEAST AND CHEESIEST BURGER FOR YOUR CRAVINGS!</p>
          </div>
        </div>

        <div class="float-right-white">

          <div class="box-choice">
            <h3 id="login">LOGIN</h3>
            <h3 id="register">REGISTER</h3>
          </div>

          <!-- Form -->
          <div class="form">
            <form id="loginAjax">
              <div class="input-container">
                <input id="usnL" type="text"  required/>
                <label>Username</label>
              </div>
              <div class="input-container">
                <input id="pwdL" type="password" required />
                <label>Password</label>
              </div>
              <h4 id="error"></h4>
                <input type="submit" class="btn"></input>
            </form>
          </div>

          <div class="button_cont"><a class="example_f" href="#modal" >
            <span>Admin</a></div>

        </div>
      </div> <!--end float-->



<!-- MODAL -->
<div id="modal" class="modal">
    <div class="modal__content">
        <h1>Admin Login</h1>
        <br>
        <div class="form">
          <form id="adminAjax">
            <div class="input-container">
              <input id="usnA" type="text"  required/>
              <label>Username</label>
            </div>
            <div class="input-container">
              <input id="pwdA" type="password" required />
              <label>Password</label>
            </div>
            <h4 id="modal-error"></h4>
              <input type="submit" class="btn"></input>
          </form>
        </div>
        <a href="#" class="modal__close">&times;</a>
    </div>
</div>


    </div> 
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script>
        var ripple=function(){function rippleStart(e){rippleContainer=getRippleContainer(e.target),("0"==rippleContainer.getAttribute("animating")||!rippleContainer.hasAttribute("animating"))&&e.target.className.indexOf("ripple")>-1&&(rippleContainer.setAttribute("animating","1"),offsetX="number"==typeof e.offsetX?e.offsetX:e.touches[0].clientX-e.target.getBoundingClientRect().left,offsetY="number"==typeof e.offsetY?e.offsetY:e.touches[0].clientY-e.target.getBoundingClientRect().top,fullCoverRadius=Math.max(Math.sqrt(Math.pow(offsetX,2)+Math.pow(offsetY,2)),Math.sqrt(Math.pow(e.target.clientWidth-offsetX,2)+Math.pow(e.target.clientHeight-offsetY,2)),Math.sqrt(Math.pow(offsetX,2)+Math.pow(e.target.clientHeight-offsetY,2)),Math.sqrt(Math.pow(offsetY,2)+Math.pow(e.target.clientWidth-offsetX,2))),expandTime=e.target.getAttribute("ripple-press-expand-time")||3,rippleContainer.style.transition="transform "+expandTime+"s ease-out, box-shadow 0.1s linear",rippleContainer.style.background=e.target.getAttribute("ripple-color")||"white",rippleContainer.style.opacity=e.target.getAttribute("ripple-opacity")||"0.6",rippleContainer.style.boxShadow=e.target.getAttribute("ripple-shadow")||"none",rippleContainer.style.top=offsetY+"px",rippleContainer.style.left=offsetX+"px",rippleContainer.style.transform="translate(-50%, -50%) scale("+fullCoverRadius/100+")")}function rippleEnd(e){rippleContainer=getRippleContainer(e.target),"1"==rippleContainer.getAttribute("animating")&&(rippleContainer.setAttribute("animating","2"),backgroundA=window.getComputedStyle(rippleContainer,null).getPropertyValue("background"),destinationRadius=e.target.clientWidth+e.target.clientHeight,rippleContainer.style.transition="none",expandTime=e.target.getAttribute("ripple-release-expand-time")||.4,rippleContainer.style.transition="transform "+expandTime+"s linear, backgroundA "+expandTime+"s linear, opacity "+expandTime+"s ease-in-out",rippleContainer.style.transform="translate(-50%, -50%) scale("+destinationRadius/100+")",rippleContainer.style.background="radial-gradient(transparent 10%, "+backgroundA+" 40%)",rippleContainer.style.opacity="0",e.target.dispatchEvent(new CustomEvent("ripple-button-click",{target:e.target})),eval(e.target.getAttribute("onrippleclick")))}function rippleRetrieve(e){rippleContainer=getRippleContainer(e.target),"translate(-50%, -50%) scale(0)"==rippleContainer.style.transform&&rippleContainer.setAttribute("animating","0"),"1"==rippleContainer.getAttribute("animating")&&(rippleContainer.setAttribute("animating","3"),collapseTime=e.target.getAttribute("ripple-leave-collapse-time")||.4,rippleContainer.style.transition="transform "+collapseTime+"s linear, box-shadow "+collapseTime+"s linear",rippleContainer.style.boxShadow="none",rippleContainer.style.transform="translate(-50%, -50%) scale(0)")}function getRippleContainer(e){for(childs=e.childNodes,ii=0;ii<childs.length;ii++)try{if(childs[ii].className.indexOf("rippleContainer")>-1)return childs[ii]}catch(t){}return e}window.addEventListener("load",function(){css=document.createElement("style"),css.type="text/css",css.innerHTML=".ripple { overflow: hidden !important; position: relative; } .ripple .rippleContainer { display: block; height: 200px !important; width: 200px !important; padding: 0px 0px 0px 0px; border-radius: 50%; position: absolute !important; top: 0px; left: 0px; transform: translate(-50%, -50%) scale(0); -webkit-transform: translate(-50%, -50%) scale(0); -ms-transform: translate(-50%, -50%) scale(0); background-color: transparent; }  .ripple * {pointer-events: none !important;}",document.head.appendChild(css),ripple.registerRipples()});var ripple={registerRipples:function(){for(rippleButtons=document.getElementsByClassName("ripple"),i=0;i<rippleButtons.length;i++)rippleButtons[i].addEventListener("touchstart",function(e){rippleStart(e)},{passive:!0}),rippleButtons[i].addEventListener("touchmove",function(e){if(e.target.hasAttribute("ripple-cancel-on-move"))return void rippleRetrieve(e);try{overEl=document.elementFromPoint(e.touches[0].clientX,e.touches[0].clientY).className.indexOf("ripple")>=0}catch(t){overEl=!1}overEl||rippleRetrieve(e)},{passive:!0}),rippleButtons[i].addEventListener("touchend",function(e){rippleEnd(e)},{passive:!0}),rippleButtons[i].addEventListener("mousedown",function(e){rippleStart(e)},{passive:!0}),rippleButtons[i].addEventListener("mouseup",function(e){rippleEnd(e)},{passive:!0}),rippleButtons[i].addEventListener("mousemove",function(e){!e.target.hasAttribute("ripple-cancel-on-move")||0==e.movementX&&0==e.movementY||rippleRetrieve(e)},{passive:!0}),rippleButtons[i].addEventListener("mouseleave",function(e){rippleRetrieve(e)},{passive:!0}),rippleButtons[i].addEventListener("transitionend",function(e){("2"==e.target.getAttribute("animating")||"3"==e.target.getAttribute("animating"))&&(e.target.style.transition="none",e.target.style.transform="translate(-50%, -50%) scale(0)",e.target.style.boxShadow="none",e.target.setAttribute("animating","0"))},{passive:!0}),getRippleContainer(rippleButtons[i])==rippleButtons[i]&&(rippleButtons[i].innerHTML+='<div class="rippleContainer"></div>')},ripple:function(t){t.className.indexOf("ripple")<0||(rect=t.getBoundingClientRect(),e={target:t,offsetX:rect.width/2,offsetY:rect.height/2},rippleStart(e),rippleEnd(e))}};return ripple}();
    </script>
    <script>
        var coll = document.getElementsByClassName("collapsible");
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
    </script>

  </body>
</html>
