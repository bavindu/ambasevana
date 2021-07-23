<?php
    require_once "../includes/dbh.inc.php";

    $sql = "SELECT * FROM foodmenu;";
    $sql_run = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_array($sql_run)){
        
    ?>

<tr>
    <td><?php echo '<img src="data:image;base64,'.base64_encode($row['food_image']).'" alt="Product Image"  style="width: 100px; height: 100px;">';?>



    <td><?php echo $row['food_name']; ?></td>
    <td><?php echo $row['category_name']; ?></td>
    <td><?php echo $row['food_portion']; ?></td>
    <td><?php echo $row['food_price']; ?></td>
    <td><?php echo $row['food_discount']; ?></td>
    <td><?php echo $row['food_discountedprice']; ?></td>
    <td><?php echo $row['food_quantity']; ?></td>
    <td><?php echo $row['food_description']; ?></td>

    <?php  $row['food_id']; ?>

    <td>
        <div class="btn-group" role="group" aria-label="Basic outlined example">

            <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#updateModal"
                onclick="
          document.getElementById('productNameUpdate').value ='<?php echo$row['food_name']; ?>'.trim();
          document.getElementById('categoryNameUpdate').value ='<?php echo $row['category_name']; ?>'.trim();
          document.getElementById('productSizeUpdate').value ='<?php echo $row['food_portion']; ?>';
          document.getElementById('productPriceUpdate').value ='<?php echo $row['food_price']; ?>';
          document.getElementById('productDiscountUpdate').value ='<?php echo$row['food_discount']; ?>'.trim();
          document.getElementById('productQtyUpdate').value ='<?php echo$row['food_quantity']; ?>'.trim();         
          document.getElementById('productDescriptionUpdate').value ='<?php echo$row['food_description']; ?>'.trim();

          
          document.getElementById('productIdupdate').value='<?php echo $row['food_id'];?>';">Update</button>
            <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#deleteAlert"
                onclick="document.getElementById('productIdDelete').value ='<?php echo$row['food_id']; ?>';">Delete</button>

        </div>
    </td>
    </td>

</tr>


<?php
}
?>


<!-- document.getElementById('productQtyUpdate').value ='<?php //echo$row['productQty']; ?>'.trim(); -->