<?php
include_once("functions-page.php");
if (isset($_SESSION["email"])) {

  $email = ''.$_SESSION["email"];
  $name = ''.$_SESSION["name"];
  $number = ''.$_SESSION["number"];
  $total = return_info($conn, 'users', 'total', 'email', $email);
  $account_message = return_info($conn, 'users', 'account_message', 'email', $email);
} else{
  $heading ='';
}

if(isset($_GET['product_id'])) {
    $product_id = get_check_same_page("product_id");
	$product_id = sanitizeString($product_id);

    $item_id = return_info($conn, 'items', 'id', 'id', $product_id);

    if (!isset($item_id)){
        alert('No product found1');
        $location = "sign-in-page.php";
        go_to($location);
    
    }

    $seller_name = return_info($conn, 'items', 'seller_name', 'id', $product_id);
    $product_name = return_info($conn, 'items', 'product_name', 'id', $product_id);
    $product_amount = return_info($conn, 'items', 'product_amount', 'id', $product_id);
    $product_description = return_info($conn, 'items', 'product_description', 'id', $product_id);
    $id = return_info($conn, 'items', 'seller_name', 'id', $product_id);
    $statues = return_info($conn, 'items', 'statues', 'id', $product_id);

  } else {
    alert('No product found2');
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

  <div id="blog" class="our-blog section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.25s">
          <div class="section-heading">
            <!-- <h2><?php echo"$seller_name"; ?> <em>Trending</em> In Our Latest <span>News</span></h2> -->
            <p class="mb-4">We Found This For You <a href="profile.php">Go to My Account</a></p>  
        </div>
        </div>
        <div class="col-lg-6 wow fadeInDown" data-wow-duration="1s" data-wow-delay="0.25s">
          <div class="top-dec">
            <img src="assets/images/blog-dec.png" alt="">
          </div>
        </div>
      </div>
      
        <div class="col-lg-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.25s">
          <div class="right-list">
            <ul>
              <li>
                <div class="left-content align-self-center">
                  <span><i class="fa fa-calendar"></i>  Sold by <?php echo"$seller_name"; ?></span>
                  <a href="#"><h4><?php echo"R $product_amount"; ?></h4></a>
                  <p><?php echo"$product_name"; ?></p>
                  <p><?php echo"$product_description"; ?></p>
                  <!-- <a class="main-blue-button" target="_blank" href="#"> Buy Now</a> -->
                  <div class="main-blue-button mb-2"><a href="#" style="display:none;" id='result'></a></div>
                <div class="main-blue-button"><a href="#" id='buy-submit'>Buy</a></div>
    
                <div id='product_id_btn' hidden><?php echo"$product_id"; ?></div>
                <script type='text/javascript'>
        $(document).ready(function() {
            $('#buy-submit').click(function() {                
                var product_id = $('#product_id_btn').text();
                
                var url = 'buy-load-page.php';
                
                console.log('here at the start of jquery line')
                console.log(product_id)
                
                $.ajax({
                    data: {
                        product_id:product_id
                    },
                    method: 'get',
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
                        $("#result").text(result);
                        $("#buy-submit").text('Buy Again');
                        // window.location.replace("sign-in-page.php");

                    },
                });
                console.log('here at the end of jquery line')
            });
        });
    </script>
                <!-- <div class="right-image">
                  <a href="#"><img src="assets/images/box.png" alt=""></a>
                </div> -->
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.25s">
        <p><span style="color:grey;">Product Images Comming Soon</span></p>
        <p>© Fine Trade</p>
  
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