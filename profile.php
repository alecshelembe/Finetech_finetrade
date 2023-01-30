<?php
include_once("functions-page.php");
if (isset($_SESSION["email"])) {

  $email = ''.$_SESSION["email"];
  $name = ''.$_SESSION["name"];
  $number = ''.$_SESSION["number"];
  $total = return_info($conn, 'users', 'total', 'email', $email);
  $account_message = return_info($conn, 'users', 'account_message', 'email', $email);
} else{
  $location = "sign-in-page.php";
	go_to($location);
}
// <?php echo''.$_SESSION["email"];
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
      
    <title>Fine Trades - Alec & Kuan</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="assets/" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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
              <li><a href="sign-out-load-page.php">Sign Out</a></li> 
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
  
  <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6 align-self-center">
                <h6>Notifications</h6>
                <p style="color: blue;"><?php echo"$account_message" ?></p><br>
                <h6>Welcome to your Profile</h6>
                <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                  <h2>Hello, <em><?php echo"$name";?></em><br><span>R <?php echo"$total";?> </span></h2><h4>is in your e-wallet</h4>with <p style="color:blue;"><?php echo"$email" ?></p>
                <p>  Above is the money you have availabe to spend, invest or withdraw. <!--<a rel="nofollow" href="https://templatemo.com/page/1" target="_parent">click.</a>--> </p>
                <div class="main-red-button"><a href="add-funds-to-wallet.php">Add funds to my wallet</a></div>
                <div class="main-blue-button mt-2"><a href="#sendMoney">Send money to a friend</a></div>
                <div class="main-blue-button mt-2"><a href="#sellItem">Sell Products Online</a></div>
                <!-- <form id="search" action="#" method="GET">
                  <fieldset>
                    <input type="address" name="address" class="email" placeholder="Your website URL..." autocomplete="on" required>
                  </fieldset>
                  <fieldset>
                    <button type="submit" class="main-button">Analyze Site</button>
                  </fieldset>
                </form> -->
              </div>
            </div>
            <div class="col-lg-6">
              <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                <img src="assets/images/banner-right-image.png" alt="team meeting">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="sendMoney" class="contact-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.25s">
          <div class="section-heading">
            <h2>Send Money Instantly</h2>
            <p>Send money using the email address associated with their wallet</p>
            <!-- <div class="phone-info">
              <h4>For any enquiry, Call Us: <span><i class="fa fa-phone"></i> <a href="#">010-020-0340</a></span></h4>
            </div> -->
          </div>
        </div>
        <div class="col-lg-6 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">
                    <form id="contact">
                      <center><p>You have R <?php echo"$total" ?> available</p></center>
                        <div class="row">
                            <div class="col-lg-12">
                                <fieldset>
                                    <input type="text" name="email" id="email" pattern="[^ @]*@[^ @]*" placeholder="Email" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                              <fieldset>
                                <input type="int" name="amount" id="amount" placeholder="12 Amount" autocomplete="off" required>
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <input type="text" name="description" id="description" placeholder="Description" required="">
                                </fieldset>
                            </div>
                            
                            <div class="col-lg-12">
                                <fieldset>
                                   <button onclick="preventDefault()" class="mb-2"style="display:none;" id="result"></button>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <button type="button" id="send-submit" class="main-button">Send</button> 
                                    <!-- or
                                    <a href="create-account-page.php">more</a> -->
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
            $('#send-submit').click(function() {                
                
                var email = $('#email').val();
                var amount = $('#amount').val();
                var description = $('#description').val();
                
                var url = 'send-money-load-page.php';

                if(email == '' || amount == '' || description == ''){
                    $('#result').text('Please fill in the form correctly');
                    $('#result').css('display','block');
                    return false
                } 
                
                console.log('here at the start of jquery line')
                
                $.ajax({
                    data: {
                        
                        email: email,
                        description: description,
                        amount: amount
                        
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
                        $("#send-submit").text('Send Again');
                        // window.location.replace("sign-in-page.php");

                    },
                });
                console.log('here at the end of jquery line')
            });
        });
    </script>

    <!-- here -->
    
    <div class="m-3">
        <h2 class="m-1">Last 2 Money in transactions</h2>
        <?php include("fetch-last-2-money-in-transactions.php"); ?>
      </div>
    <div class="m-3">
    <h2 class="m-1">Last 2 Money out transactions</h2>
    <?php include("fetch-last-2-money-out-transactions.php"); ?>
  </div>

<div id="sellItem" class="contact-us section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.25s">
          <div class="section-heading">
            <h2>Create an Item to sell</h2>
            <p>You can upload anything an sell on our ease to use platform</p>
            <!-- <div class="phone-info">
              <h4>For any enquiry, Call Us: <span><i class="fa fa-phone"></i> <a href="#">010-020-0340</a></span></h4>
            </div> -->
          </div>
        </div>
        <div class="col-lg-6 wow fadeInRight" data-wow-duration="0.5s" data-wow-delay="0.25s">
                    <form id="contact">
                      <div class="row">
                      <center><p style="color:grey;">Image uploads coming soon</p></center>
                        <div class="col-lg-12">
                                <fieldset>
                                    <input type="text" name="product_name" id="product_name" placeholder="Product Name" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                              <fieldset>
                                <input type="int" name="product_amount" id="product_amount" placeholder="15 Amount" autocomplete="off" required>
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <input type="text" name="product_description" id="product_description" placeholder="Product Description" required="">
                                </fieldset>
                            </div>
                            
                            <div class="col-lg-12">
                                <fieldset>
                                   <button onclick="preventDefault()" class="mb-2"style="display:none;" id="product_result"></button>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <button type="button" id="item-submit" class="main-button">Upload</button> 
                                    <!-- or
                                    <a href="create-account-page.php">more</a> -->
                                </fieldset>
                            </div>
                        </div>
                        <div class="contact-dec">
                          <img src="assets/images/contact-decoration.png" alt="">
                        </div>
                      </form>
                      <div class="section-heading">
                       <center><h2 class="mt-4">Products you have uploaded</h2><center>
                       <?php include("fetch_uploaded_products.php"); ?>
                      </div>
                </div>
      </div>
    </div>
  </div>

  <script type='text/javascript'>
        $(document).ready(function() {
            $('#item-submit').click(function() {                
                
                var product_name = $('#product_name').val();
                var product_amount = $('#product_amount').val();
                var product_description = $('#product_description').val();
                
                var url = 'sell-item-load-page.php';

                if(product_amount == '' || product_description == '' || product_name == ''){
                    $('#product_result').text('Please fill in the form correctly');
                    $('#product_result').css('display','block');
                    return false
                } 
                
                console.log('here at the start of jquery line')
                
                $.ajax({
                    data: {
                        
                        product_name: product_name,
                        product_description: product_description,
                        product_amount: product_amount
                        
                    },
                    method: 'post',
                    url: url,
                    beforeSend: function() {
                        $('#product_result').text('Loading...');
                        console.log('loading')
                    },
                    error: function(result) {
                        $('#product_result').text(result);
                        console.log('Fail')
                    },
                    success: function(result) {
                        $('#product_result').html(result);
                        $('#product_result').css('display','block');
                        console.log('success')
                        $("#product_result").text(result);
                        $("#item-submit").text('Upload Again');

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