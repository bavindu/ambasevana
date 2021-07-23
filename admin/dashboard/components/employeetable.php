<?php
    require_once '../includes/dbh.inc.php';

    $sql = "SELECT * FROM employee;";
    $sql_run = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_array($sql_run)){
    ?>
<tr>

    <td><?php echo $row['employee_name'] ; ?></td>
    <td><?php echo $row['employee_role']; ?></td>
    <td><?php echo $row['employee_nic']; ?></td>
    <td><?php echo $row['employee_contactnum']; ?></td>
    <td><?php echo $row['employee_address'] ;?></td>
    <td><?php echo $row['employee_email']; ?></td>
    <td><?php echo $row['employee_salary']; ?></td>
    <td><?php echo $row['employee_date']; ?></td>
    <?php  $row['employee_id']; ?>

</tr>

<td>
    <div class="btn-group" role="group" aria-label="Basic outlined example">

        <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#updateModal" onclick="
            document.getElementById('firstNameupdate').value ='<?php echo$row['employee_name']; ?>'.trim();
            // document.getElementById('lastNameUpdate').value ='<?php // echo $row['lastName']; ?>'.trim();
            document.getElementById('jobRoleUpdate').value ='<?php echo $row['employee_role']; ?>';
            document.getElementById('nicUpdate').value ='<?php echo $row['employee_nic']; ?>'.trim();
            // document.getElementById('landNumUpdate').value ='<?php  //echo $row['landPhone']; ?>';
            document.getElementById('mobileNumUpdate').value ='<?php echo $row['employee_contactnum']; ?>';
            document.getElementById('address1Update').value ='<?php echo $row['employee_address']; ?>';
            // document.getElementById('address2Update').value ='<?php // echo $row['address2']; ?>';
            // document.getElementById('address3Update').value ='<?php //echo $row['address3']; ?>';
            // document.getElementById('address4Update').value ='<?php //echo $row['address4']; ?>';
            document.getElementById('emailUpdate').value ='<?php echo $row['employee_email']; ?>';
            document.getElementById('salaryUpdate').value ='<?php echo $row['employee_salary']; ?>';
            document.getElementById('employeeIdupdate').value='<?php echo $row['employee_id'];?>';">Update</button>


        <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#deleteAlert"
            onclick="document.getElementById('employeeIdDelete').value ='<?php echo$row['employee_id']; ?>';">Delete</button>


    </div>
</td>
</td>



<?php
}
?>