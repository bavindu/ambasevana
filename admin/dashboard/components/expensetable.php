<?php
    require_once '../includes/dbh.inc.php';

    $sql = "SELECT * FROM expense;";
    $sql_run = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_array($sql_run)){
    ?>
<tr>

    <td><?php echo $row['expense_name'] ; ?></td>
    <td><?php echo $row['expense_type']; ?></td>
    <td><?php echo $row['expense_value']; ?></td>

    <td><?php echo $row['expense_date']; ?></td>
    <?php  $row['expense_id']; ?>

</tr>

<td>
    <div class="btn-group" role="group" aria-label="Basic outlined example">

        <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#updateModal" onclick="
            document.getElementById('expensenameupdate').value ='<?php echo$row['expense_name']; ?>'.trim();
            // document.getElementById('lastNameUpdate').value ='<?php // echo $row['lastName']; ?>'.trim();
            document.getElementById('expensetypeupdate').value ='<?php echo $row['expense_type']; ?>';
            document.getElementById('expensevalueupdate' ).value='<?php echo $row['expense_value']; ?>' .trim();
            document.getElementById('expenseidupdate').value='<?php echo $row['expense_id'];?>' ;">Update</button>


        <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#deleteAlert"
            onclick="document.getElementById('expenseidDelete').value ='<?php echo$row['expense_id']; ?>';">Delete</button>


    </div>
</td>
</td>



<?php
}
?>