<?php
session_start();
require_once './dbh.inc.php';
require_once '../ui/components.php';
require_once './functions.inc.php';
//  C:\wamp64\www\DipProducts\customerapp\
//  if(!isset($_SESSION["customerId"])){
//    header("location: ./Login.php");
//    exit();
//  }
if (isset($_POST['submit'])) {
    require_once 'dbh.inc.php';

    $mobile = $_POST['customer_contactnum'];
    // $address1 = $_POST['address1'];
    // $address2 = $_POST['address2'];
    // $address3 = $_POST['address3'];
    // $address4 = $_POST['address4'];
    $customerId = $_POST['customer_id'];
    $billtotal = $_POST['billtotal'];

    // insert into orders table

    $sql = "INSERT INTO orders (customer_contactnum, customer_id,total) VALUES ('$mobile', '$customerId',' $billtotal')";
    // $sqlstatus="Update customer set order_status=Ordered";

    $sql_run = mysqli_query($conn, $sql);

    if ($sql_run) {
        header("Location:  ../ui/cart.php?error=none");
        $orderId = mysqli_insert_id($conn);
        // echo $orderId;
    } else {
        header("Location:  ../ui/cart.php?error=orderfailed");
    }

    if (isset($_SESSION['cart'])) {
        $product_id = array_column($_SESSION['cart'], 'food_id');

        $result = getData();
        while ($row = mysqli_fetch_assoc($result)) {
            foreach ($product_id as $id) {
                if ($row['food_id'] == $id) {

                    $productId = $row['food_id'];
                    $productQty = "1";
                    // $productQty = $row['productQty'];
                    $productPrice = $row['food_price'];
                    // echo  $productQty ;

                    $sqlproduct = "SELECT * FROM foodmenu where food_id = $productId ;";
                    $sqlproduct_run = mysqli_query($conn, $sqlproduct);

                    $qtyget = (int) $row['food_quantity'];
                    $salesget = (int) $row['food_sales'];

                    $Qty = $qtyget - $productQty;
                    $Sales = $salesget + $productQty;

                    $sqlUpdate = "UPDATE foodmenu
                            SET food_quantity=' $Qty', food_sales ='$Sales'
                            WHERE food_id =$productId ";
                    $sqlUpdate_run = mysqli_query($conn, $sqlUpdate);

                    // cartElement($row['productImg'], $row['productName'], $row['productSize'], $row['productPrice'], $row['productId'], $row['productQty'],$qtyVal);
                    // $total = $total +(int)$row['productPrice'];
                    // echo $total;

                    // insert into orderdetails table

                    $sql1 = "INSERT INTO orderdetails (order_id, food_id, order_quantity, order_price) VALUES ('$orderId','$productId', '$productQty', '$productPrice')";

                    $sql1_run = mysqli_query($conn, $sql1);

                    // if ($sql1_run){
                    //   header("Location:  ../orders.php?orderPlaced");
                    // }else {
                    //   header("Location:  ../cart.php?error=orderdetailsfailed");
                    //   echo  $conn->error;
                }
            }
        }
    }

    if ($sql_run) {
        unset($_SESSION['cart']);
        sendBill($conn, $orderId, $customerId);
        header("Location:  ../ui/order.php?orderPlaced");
    } else {
        header("Location:  ../ui/cart.php?error=orderdetailsfailed");
    }

    // if ($sql_run ){
    //     sendBill($conn,$orderId);
    //     header("Location:  ../ui/order.php?orderPlaced");
    //   }else {
    //     header("Location:  ..ui//cart.php?error=orderdetailsfailed");
    //   }

} else {
    header("Location: ../ui/cart.php");
}