<?php
    require_once('./components.php');
    require_once('../includes/functions.inc.php');

    require_once '../includes/dbh.inc.php';
    $order_id = $_GET['id'];

    
    $sql ="SELECT * 
    FROM orderdetails 
    INNER JOIN foodmenu ON orderdetails.food_id  =foodmenu.food_id
    WHERE order_id= $order_id  ;";
   
    $sql_run = mysqli_query($conn, $sql);
    $title ="<h1 class='h2 pb-2'>Order Details of Order Number $order_id</h1>"; 
    echo $title;
    while($row = mysqli_fetch_array($sql_run)){
    ?>
<tr>
    <td><?php echo $row['order_id'];?></td>
    <!-- <td><?php //echo $row['productName']; ?></td> -->
    <td><?php echo $row['food_name']." (".$row['food_portion'].")"; ?></td>
    <td><?php echo $row['order_quantity']; ?></td>
    <td><?php echo $row['order_price']; ?></td>
</tr>


<?php
}
?>