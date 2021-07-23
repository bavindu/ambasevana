<?php

    // session_start();
    require_once('./components.php');
    require_once('../includes/functions.inc.php');

    require_once '../includes/dbh.inc.php';
    $id = $_SESSION['customer_id'];

    $sql = "SELECT * FROM orders WHERE customer_id =  $id ";
    $sql_run = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_array($sql_run)){
    ?>
<tr>
    <td><?php echo $row['order_id']; ?></td>
    <td><?php echo $row['customer_contactnum']; ?></td>

    <td><?php echo $row['total'].".00"; ?></td>
    <td><?php echo $row['order_date']; ?></td>
    <td><?php echo $row['order_status']; ?></td>

    <td>
        <div class="btn-group" role="group" aria-label="Basic outlined example">

            <a href="./orderdetails.php ?id=<?=$row['order_id'];?>"><button type="button"
                    class="btn btn-outline-danger">View</button></a>

        </div>
    </td>

</tr>


<?php
}
?>