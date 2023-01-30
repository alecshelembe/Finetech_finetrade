<?php
include_once("functions-page.php");
$email = $_POST['email'];
setcookie('Email',"$email",time()+31556926 ,'/');// where 31556926 is total seconds for a year.

if (isset($_POST['email'])) {
	$email = post_check_same_page("email");
	$email = sanitizeString($email);
	$password = post_check_same_page("password");
	$password = sanitizeString($password);
	pair_for_login($conn,'users',"email",$email,"password",$password);
	$datetime = "Date " . date("Y-m-d @ h:i:s a");
	update_info($conn,$dbname,'users','last_login','email',$datetime,$email);
	$ip = get_ip();
	update_info($conn,$dbname,'users','ip_address','email',$ip,$email);
	$location = "profile.php";
	go_to($location);

}