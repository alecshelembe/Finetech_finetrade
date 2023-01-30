<div style="overflow-x:auto;">
<table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Price</th>
        <th scope="col">Descripton</th>
        <th scope="col">Sales</th>
        
        <th scope="col">Link</th>
        <th scope="col">Id</th>
        </tr>
    </thead>
        <tbody>
        <?php 
// You can asssume user is logged in with session active on this page
// with functions page


$email = "'$email'";

$query = "SELECT * FROM `items` WHERE `email` = $email;";
// SELECT * FROM `items` WHERE `email` = 'ashelembe96@gmail.com2';

$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

$row = mysqli_num_rows($result);
    if ($row == 0) {
        echo("You have no products uploaded");
       
    } else {

        
        $count = 1;

    while ($row = mysqli_fetch_assoc($result)) {
        $product_name = $row['product_name'];
        $product_amount = $row['product_amount'];
        $product_description = $row['product_description'];
        $sales = $row['sales'];
        $statues = $row['statues'];
        $link = $row['link'];
        $id = $row['id'];
        $total_money_generated = $row['total_money_generated'];
    
        echo("
        
        <tr>
            <th scope='row'>$count</th>
            <td>$product_name</td>
            <td>$product_amount</td>
            <td>$product_description</td>
            <td>$sales</td>
           
            <td>$link</td>
            <td>$id</td>
            </tr>
        <tr>

        ");
        $count++;

    }
}
    ?>
        </tbody>
    </table>
</div>