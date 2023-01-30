<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <title>Fine Trades - Alec & Kuan</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-space-dynamic.css">
    <link rel="stylesheet" href="assets/css/animated.css">
    <link rel="stylesheet" href="assets/css/owl.css">
<!--
    
TemplateMo 562 Space Dynamic

https://templatemo.com/tm-562-space-dynamic

-->
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.php" class="logo">
              <h4>Fine<span>Trade</span></h4>
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li><a href="index.php">Return Home</a></li> 
              <li></li> 
            </ul>        
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div id="contact" class="contact-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.25s">
          <div class="section-heading">
            <h2>Sign In below</h2>
            <p>When you sign in you can manage your account, view discounts, purchase online and more.</p>
            <!-- <div class="phone-info">
              <h4>For any enquiry, Call Us: <span><i class="fa fa-phone"></i> <a href="#">010-020-0340</a></span></h4>
            </div> -->
          </div>
        </div>
        <div class="col-lg-6 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">
                    <form id="contact">
                        <div class="row">
                            
                            <div class="col-lg-12">
                                <fieldset>
                                    <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Your Email" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    <input type="password" name="password" id="password" placeholder="Password" autocomplete="off" required>
                                </fieldset>
                            </div>
                            
                            <div class="col-lg-12">
                                <fieldset>
                                   <button onclick="preventDefault()" class="mb-2"style="display:none;" id="result"></button>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <button type="button" id="sign-in-submit" class="main-button">Sign in</button> or
                                    <a href="create-account-page.php">Create an account</a>
                                </fieldset>
                            </div>
                        </div>
                        <div class="contact-dec">
                            <img src="assets/images/contact-decoration.png" alt="">
                        </div>
                    </form>
                </div>
      </div>
    </div>
  </div>

  <script type='text/javascript'>
        $(document).ready(function() {
            $('#sign-in-submit').click(function() {                
                
                var email = $('#email').val();
                var password = $('#password').val();

                var url = 'sign-in-load-page.php';
              

                if(email == '' || password == ''){
                    $('#result').text('Please fill in the form correctly');
                    $('#result').css('display','block');
                    return false
                } 
                console.log('here at the start of jquery line')
                
                $.ajax({
                    data: {
                        
                        email: email,
                        password: password
                        
                    },
                    method: 'post',
                    url: url,
                    beforeSend: function() {
                        $('#result').text('Loading...');
                        console.log('loading')
                    },
                    error: function(result) {
                        $('#result').text(result);
                        console.log('Fail')
                    },
                    success: function(result) {
                        $('#result').html(result);
                        $('#result').css('display','block');
                        console.log('success')
                        console.log(name)
                        $("#result").text(result);
                        // window.location.replace("sign-in-page.php");

                    },
                });
                console.log('here at the end of jquery line')
            });
        });
    </script>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.25s">
          <p>© Copyright 2023 Fine Trade Co. All Rights Reserved. 
          
          <!-- <br>Design: <a rel="nofollow" href="https://templatemo.com">TemplateMo</a></p> -->
        </div>
      </div>
    </div>
  </footer>
  <!-- Scripts -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/animation.js"></script>
  <script src="assets/js/imagesloaded.js"></script>
  <script src="assets/js/templatemo-custom.js"></script>

</body>
</html>