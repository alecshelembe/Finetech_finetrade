<?php
// include_once($_SERVER['DOCUMENT_ROOT'] . "/functions-page.php");
// session_start(); already exisit in functions page
include_once("functions-page.php");

if (isset($_POST['name'])) {
    // alert("hello");
    $email = post_check_same_page("email");
	$email = sanitizeString($email);
	$lastname = post_check_same_page("surname");
	$lastname = sanitizeString($lastname);
	$password = post_check_same_page("password");
	$password = sanitizeString($password);
	$name = post_check_same_page("name");
	$name = sanitizeString($name);
	$confirm_password = post_check_same_page("confirm_password");
	$confirm_password = sanitizeString($confirm_password);
    $last_name = post_check_same_page("surname");
	$last_name = sanitizeString($last_name);
	confirm_match_same_page($password,$confirm_password);
	$password = password_hash($password, PASSWORD_DEFAULT);
	$account_statues = "active";
	$id = rand(10000,99999);
	$ip = get_ip();
	check_if_exists_same_page($conn,$dbname,'users','email',$email);
	check_if_exists_same_page($conn,$dbname,'users','id',$id);
	$code = rand(1000,9999);
	insert_info($conn,$dbname,'users','email',$email);
	update_info($conn,$dbname,'users','id','email',$id,$email);
	update_info($conn,$dbname,'users','ip_address','email',$ip,$email);
	update_info($conn,$dbname,'users','name','email',$name,$email);
	update_info($conn,$dbname,'users','lastname','email',$lastname,$email);
	update_info($conn,$dbname,'users','account_statues','email',$account_statues,$email);
	
	update_info($conn,$dbname,'users','verified','email','no',$email);
	update_info($conn,$dbname,'users','verify_code','email',$code,$email);
	update_info($conn,$dbname,'users','password','email',$password,$email);
	// update_info($conn,$dbname,'users','email_list','email',$email_list,$email);
 
	// if ($email_list == 'yes') {
        // 	insert_info($conn,$dbname,'email_list','email',$email);	
        // }
        
        // echo('Account created successfully logging in...');
    // pair_for_login($conn,'users',"email",$email,"password",$password);
        
	
	///////////////////////////////////////////////////////////////
	
	// send_email('noreply@kingproteas.com',"$email","$name",'Kingproteas registration',"Thank you for registering to Kingproteas. Click here to verify your account. Your verification code is $code <a href='https://kingwebsites.co.za/verification-page.php'>Verify me</a>");
		
		// ///////////////////////////////////////////////////////////////
		$location = "sign-in-page.php";
		go_to($location);
		
}