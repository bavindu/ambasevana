<?php
    require_once '../includes/dbh.inc.php';


    if(!$conn){
        die("connection failed :".mysqli_connect_error());
    }
    
    
        $sql = "SELECT * FROM category;";
        $sql_run = mysqli_query($conn, $sql);
    
        while($row = mysqli_fetch_array($sql_run)){
        ?>
<!-- <tr>
    <td><?php //echo '<img src="data:image;base64,'.base64_encode($row['category_image']).'" alt="Category Image"  style="width: 100px; height: 100px;">';?>
    <td><?php //echo $row['category_name']; ?></td>
    <?php // $row['category_id']; ?>
    <td>
        <div class="btn-group" role="group" aria-label="Basic outlined example">
            <button type="button" class="btn btn-outline-dark">Update</button>
            <button type="button" class="btn btn-outline-dark">Delete</button>
        </div>
    </td>
    </td>
</tr>


<?php
//  }
?> -->


<td><?php echo '<img src="data:image;base64,'.base64_encode($row['category_image']).'" alt="Category Image"  style="width: 100px; height: 100px;">';?>
<td><?php echo $row['category_name']; ?></td>
<?php  $row['category_id']; ?>
<td>
    <div class="btn-group" role="group" aria-label="Basic outlined example">

        <!-- <a href="./components/categories.update.form.php ?id=<?//=$row['categoryId'];?>"><button type="button" class="btn btn-outline-dark">Update</button></a> -->

        <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#updateModal" onclick="
            document.getElementById('categoryNameupdate').value ='<?php echo$row['category_name']; ?>'.trim();
            // document.getElementById('categoryImgUpdate').value ='<?php //echo '<img src='data:image;base64,'.base64_encode($row['categoryImg']).'''; ?>';
            document.getElementById('categoryIdupdate').value='<?php echo $row['category_id'];?>';">Update</button>


        <!-- <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#updateModal" onclick="document.getElementById('categoryNameupdate').value ='<?php //echo $row['categoryName']; ?>';console.log('MNK');">Update</button> -->

        <!-- <button type="button" class="btn btn-outline-dark" >Delete</button> -->
        <!-- <button class='btn btn-md btn-danger my-3' type='button' data-bs-toggle="modal" data-bs-target="#placeOrderAlert">Place the Order</button><br> -->

        <!-- <a href="../includes/delete.cat.php?delete=<?php // echo $row['categoryId'];?>"><button type="button" class="btn btn-outline-dark" ata-bs-toggle="modal" data-bs-target="#deleteAlert" >Delete</button></a>  -->



        <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#deleteAlert"
            onclick="document.getElementById('categoryIdDelete').value ='<?php echo$row['category_id']; ?>';">Delete</button>


    </div>
</td>
</td>
</tr>



<?php
}
?>