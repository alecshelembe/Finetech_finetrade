<?php
// include_once($_SERVER['DOCUMENT_ROOT'] . "/functions-page.php");
// <?php echo''.$_SESSION["email"];
// session_start(); already exisit in functions page
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

if (isset($_POST['product_name'])) {
    $product_name = post_check_same_page("product_name");
	$product_name = sanitizeString($product_name);
    $product_amount = post_check_same_page("product_amount");
	$product_amount = sanitizeString($product_amount);
    $product_description = post_check_same_page("product_description");
	$product_description = sanitizeString($product_description);
	$id = rand(10000,99999);
	check_if_exists_same_page($conn,$dbname,'items','id',$id);
    insert_info($conn,$dbname,'items','id',$id);
	update_info($conn,$dbname,'items','email','id',$email,$id);
	update_info($conn,$dbname,'items','product_name','id',$product_name,$id);
	update_info($conn,$dbname,'items','product_description','id',$product_description,$id);
	update_info($conn,$dbname,'items','product_amount','id',$product_amount,$id);
	update_info($conn,$dbname,'items','number','id',$number,$id);
	update_info($conn,$dbname,'items','seller_name','id',$name,$id);
    // $link = $_SERVER['DOCUMENT_ROOT']. "index.php?product_id=$id";
    $link = "buy.php?product_id=$id";
	update_info($conn,$dbname,'items','link','id',$link,$id);
    echo("Product Uploaded");
	stop();
}