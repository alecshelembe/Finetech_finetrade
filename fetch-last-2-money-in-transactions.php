<div style="overflow-x:auto;">
     <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Email</th>
                <th scope="col">Amount</th>
                <th scope="col">Description</th>
                <th scope="col">Status</th>
                <!-- <th scope="col">Type</th>
                <th scope="col">Status</th>
                <th scope="col">Date</th> -->
            </tr>
        </thead>
        <tbody>
        <?php 
// You can asssume user is logged in with session active on this page
// with functions page


$email_before_change = $email;
$email = "'$email'";

// $query = "SELECT * FROM `items` WHERE `email` = $email;";
$query = "SELECT * FROM `transactions` WHERE `receiver_email` = $email AND `statues` = 'success' ORDER BY `date` DESC LIMIT 2;";
// SELECT * FROM `items` WHERE `email` = 'ashelembe96@gmail.com2';

$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

$row = mysqli_num_rows($result);
    if ($row == 0) {
        echo("You have no transactions");
       
    } else {

        
        $count = 1;

    while ($row = mysqli_fetch_assoc($result)) {
        $sender_email = $row['sender_email'];
        $receiver_email = $row['receiver_email'];
        $amount = $row['amount'];
        $type = $row['type'];
        $statues = $row['statues'];
        $sender_description = $row['sender_description'];
        $date = $row['date'];
    
        echo("
        
        <tr class='p-3 mb-2 text-dark'>
            <th scope='row'>$count</th>
            <td>$sender_email</td>
            <td>R $amount</td>
            <td>$sender_description</td>
            <td>$statues</td>
            
            </tr>
        <tr>

        ");
        $count++;

    }
}

//making email variable normal
$email = $email_before_change;
    ?>
            </tbody>
        </table>
 
</div>