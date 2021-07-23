<?php
    require_once '../includes/dbh.inc.php';

    

    // $sql = "SELECT * FROM orders;";
    $sql ="SELECT * 
    FROM orders
    INNER JOIN customer ON orders.customer_id=customer.customer_id;";
    
    $sql_run = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_array($sql_run)){

        $customer_name = $row['customer_name'];
        // $customer_address=$row['address1'] .", ". $row['address2'].", ". $row['address3'].", ". $row    ['address4'] ;
        $customer_phone = $row['customer_contactnum'];
        $date =  $row['order_date'];
        $total =  $row['total'];
    ?>
<tr>
    <td><?php echo $row['order_id']; ?></td>
    <td><?php echo $row['customer_name']; ?></td>
    <td><?php echo $row['customer_contactnum']; ?></td>
    <td><?php echo $row['total']; ?></td>
    <td><?php echo $row['order_date']; ?></td>
    <td><?php echo $row['order_status']; ?></td>



    <td>
        <div class="btn-group" role="group" aria-label="Basic outlined example">

            <a href="./orderdetails.php?id=<?=$row['order_id'];?>"><button type="button"
                    class="btn btn-outline-dark">View</button></a>

            <a> <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#updateModal"
                    onclick="
            document.getElementById('order_status').value ='<?php echo$row['order_status']; ?>';
            document.getElementById('order_idupdate').value='<?php echo $row['order_id'];?>';
            document.getElementById('cid').value='<?php echo $row['customer_id'];?>';">Update</button></a>

            <a href="./invoice-db.php ?id=<?=$row['order_id'];?>
            &cid=<?=$row['customer_id'];?>
            &name=<?=$customer_name;?>
           
            &phone=<?=$customer_phone;?>
            &total=<?=$total;?>
            &date=<?=$date;?>"><button type="button" class="btn btn-outline-dark">Invoice</button></a>


            <!-- <a href="./invoice-db.php.php ?id=<? //=$row['orderId'];?>&cid=<?= $row['customer_id'];?>&name=<?=$customer_name;?>&address=<?=$customer_address;?>&phone=<?=$customer_phone;?>"><button type="button" class="btn btn-outline-dark">Invoice</button></a> -->
        </div>
    </td>
    </td>
</tr>

<?php
}
?>