<?php
    require_once '../includes/dbh.inc.php';
    require_once '../includes/functions.inc.php';
    // $order_id=get_safe_value($conn,$_GET['orderId']);
    $order_id = $_GET['id'];
    // $cid = $_GET['cid'];

    // $res=mysqli_query($con," SELECT distinct(orderdetails.orderdetailsId) ,orderdetails.*,product.productName from orderdetails,product where orderdetails.orderId='$order_id' and  orderdetails.ProductId=product.productId  GROUP by orderdetails.orderdetailsId");
    //               $total_price=0;
                  
    // $userInfo=mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM orders WHERE id='$order_id'"));
    

    // $sql = "SELECT * FROM orderdetails WHERE orderId= $order_id;"; // ??
    $sql ="SELECT * 
    FROM orderdetails 
    INNER JOIN foodmenu ON orderdetails.food_id  =foodmenu.food_id
    WHERE order_id= $order_id  ;";
    // $sql ="SELECT * 
    // FROM orders
    // INNER JOIN customer ON orders.customerId =customer.customerId 
    // INNER JOIN orderdetails ON orders.orderId = orderdetails.orderId;";


    // $sql ="SELECT *  FROM orderdetails INNER JOIN orders ON orderdetails.orderId =orders.orderId 
    // INNER JOIN customer ON orders.customerId =customer.customerId ;
    // orders.customerId =customer.customerId;";
    $sql_run = mysqli_query($conn, $sql);
    $title ="<h1 class='h2'>Order Details of Order Number $order_id</h1>"; 
    echo $title;
    while($row = mysqli_fetch_array($sql_run)){
    ?>
<tr>
    <td><?php echo $row['order_id'];?></td>
    <!-- <td><?php //echo $row['productName']; ?></td> -->
    <td><?php echo $row['food_name']." (".$row['food_quantity'].")"; ?></td>
    <td><?php echo $row['order_quantity']; ?></td>
    <td><?php echo $row['order_price']; ?></td>
</tr>


<?php
}
?>