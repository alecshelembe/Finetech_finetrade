<?php
include_once("functions-page.php");
if (isset($_SESSION["email"])) {
  $sender_email = ''.$_SESSION["email"];
  $name = ''.$_SESSION["name"];
  $number = ''.$_SESSION["number"];
  $sender_total = return_info($conn, 'users', 'total', 'email', $sender_email);
  $ace_total = return_info($conn, 'users', 'total', 'email', 'ashelembe96@gmail.com');
  $account_message = return_info($conn, 'users', 'account_message', 'email', $sender_email);
} else{
    $location = "sign-in-page.php";
	go_to($location);
}

sign_out();
$location = "sign-in-page.php";
go_to($location);