<?php
    require_once '../includes/dbh.inc.php';

    

    $sql = "SELECT * FROM customer;";
    $sql_run = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_array($sql_run)){
    ?>
<tr>
    <td><?php echo $row['customer_name']; ?></td>
    <td><?php echo $row['customer_address'];?></td>
    <td><?php echo $row['customer_email']; ?></td>
    <td><?php echo $row['customer_contactnum']; ?></td>

    <td><?php echo $row['date']; ?></td>

    <!-- 
    <td>
        <div class="btn-group" role="group" aria-label="Basic outlined example">
            <button type="button" class="btn btn-outline-dark">Update</button>
            <button type="button" class="btn btn-outline-dark" name="delete">Delete</button>
        </div>
    </td> -->
    </td>
</tr>


<?php
}
?>