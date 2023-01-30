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
if (isset($_GET['product_id'])) {
    $product_id = get_check_same_page("product_id");
	$product_id = sanitizeString($product_id);
    
    $seller_name = return_info($conn, 'items', 'seller_name', 'id', $product_id);
    
    $receiver_email = return_info($conn, 'items', 'email', 'id', $product_id);
    
    $product_name = return_info($conn, 'items', 'product_name', 'id', $product_id);
    $amount = return_info($conn, 'items', 'product_amount', 'id', $product_id);
    $product_description = return_info($conn, 'items', 'product_description', 'id', $product_id);
    $id = return_info($conn, 'items', 'seller_name', 'id', $product_id);
    $statues = return_info($conn, 'items', 'statues', 'id', $product_id);

    //////////////////////////////
    // send money transaction
    $fee = 1;
    
    $receiver_total = return_info($conn, 'users', 'total', 'email', $receiver_email);
    // checking to see if amount in more that buyers account
    $description = "Purchase product:$product_name with id:$product_id";
    
	$ip = get_ip();
    $id = rand(10000,99999);
	check_if_exists_same_page($conn,$dbname,'transactions','id',$id);
    insert_info($conn,$dbname,'transactions','id',$id);
    update_info($conn,$dbname,'transactions','amount','id',$amount,$id);
    update_info($conn,$dbname,'transactions','sender_email','id',$sender_email,$id);
    update_info($conn,$dbname,'transactions','receiver_email','id',$receiver_email,$id);
    update_info($conn,$dbname,'transactions','sender_email_old_amount','id',$sender_total,$id);
    update_info($conn,$dbname,'transactions','receiver_email_old_amount','id',$receiver_total,$id);
    update_info($conn,$dbname,'transactions','sender_description','id',$description,$id);
	update_info($conn,$dbname,'transactions','ip_address','id',$ip,$id);
	update_info($conn,$dbname,'transactions','main_account','id',$ace_total,$id);
	update_info($conn,$dbname,'transactions','statues','id','fail',$id);

    // checking email not sending to same one
    if($receiver_email == $sender_email || $receiver_email == 'ashelembe96@gmail.com' || $receiver_email == ''){
        echo"You cannot send money to this address.";
        stop();
    }
    
    if($amount < 10){
        echo"Minimuim amount you can send is R 11.00";
        stop();
    }

    // checking if person has minmuim balance to send 
    $minimum_balance = $amount + $fee;
    if($sender_total < $minimum_balance){
        echo"You do not have the required funds";
        stop();
    }

    if($sender_total >= 12){
        $ip = get_ip();
        // fee is R1
        $receiver_new_balance = $receiver_total + $amount;
        $sender_new_balance = $sender_total - $amount - $fee;
        // updating totals in user table
        update_info($conn,$dbname,'users','total','email',$receiver_new_balance,$receiver_email);
        update_info($conn,$dbname,'users','total','email',$sender_new_balance,$sender_email);
        update_info($conn,$dbname,'transactions','statues','id','success',$id);
        update_info($conn,$dbname,'transactions','receiver_email_new_amount','id',$receiver_new_balance,$id);
        update_info($conn,$dbname,'transactions','sender_email_new_amount','id',$sender_new_balance,$id);
        $ace_total = return_info($conn, 'users', 'total', 'email', 'ashelembe96@gmail.com');
        $main_account = $ace_total + $fee;
        update_info($conn,$dbname,'users','total','email',$main_account,'ashelembe96@gmail.com');
        update_info($conn,$dbname,'transactions','main_account','id',$main_account,$id);
        
        echo"-$amount Success. You have sent R $amount to $seller_name. for $product_name with id: $product_id";
        stop();
    } else {
        update_info($conn,$dbname,'transactions','statues','id','fail',$id);
        echo"You do not have enough funds to make this transaction";
        stop();
        
    }
    
}
