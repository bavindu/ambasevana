<?php
session_start();
if(!isset($_SESSION["user_id"])){
  header("location: ../login.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMBASEWANA - Admin Panel</title>
    <!-- <link rel="icon" href="../images/logo2.png"> -->

    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="index.css">
</head>

<body>

    <?php
    // require_once '../includes/dbh.inc.php';

    // $sql = "SELECT categoryName FROM categories;";
    // $sql_run = mysqli_query($conn, $sql);
    // $categories = mysqli_fetch_array($sql_run);
    //  echo $categories[0];
    ?>

    <?php
       include_once 'components/navbar.php'
    ?>

    <div class="container-fluid">
        <div class="row">
            <?php
                include_once 'components/sidebar.php'
            ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Food-Menu</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal"
                                data-bs-target="#addModal">
                                Add Food-Menu
                            </button>
                        </div>
                    </div>
                </div>

                <div>
                    <div>
                        <?php 
                    //     if(isset($_GET["error"])){
                    //     if($_GET["error"]=="emptyinput"){
                    //         echo '<div class="alert alert-danger" role="alert">Fill in all the fields!</div>';
                    //     }
                    //     else if($_GET["error"]=="categoryexists"){
                    //         echo '<div class="alert alert-danger" role="alert">Category already exists, Please try another one!</div>';
                    //     }
                    //     else if($_GET["error"]=="none"){
                    //         echo '<div class="alert alert-success" role="alert">Category added successfully!</div>';
                    //     }
                    //     else if($_GET["error"]=="addfailed"){
                    //         echo '<div class="alert alert-danger" role="alert">Category adding failed, Please try again!</div>';
                    //     }
                    //     else if($_GET["error"]=="categoryimagetoobig"){
                    //         echo '<div class="alert alert-danger" role="alert">Category image size is too big, Please select a file smaller than 5MB!</div>';
                    //     }
                    // }
                    ?>
                    </div>

                    <!--Display categories table start -->
                    <div>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Portion</th>
                                        <th scope="col">Price (Rs.)</th>
                                        <th scope="col">Discount(%)</th>
                                        <th scope="col">Discounted Price(Rs)</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                     include_once '../dashboard/components/foodmenutable.php'
                                ?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                    <!--Display categories table end -->
                </div>

                <!-- Modal -->
                <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add New Food-Menu</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="../includes/foodmenu.inc.php" method="POST" enctype="multipart/form-data">

                                    <div class="mb-3 row">
                                        <label for="food_name" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" placeholder="Food-Menu Name"
                                                id="food_name" name="food_name">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="category_name" class="col-sm-2 col-form-label">Category</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" name="category_name" id="unit">
                                                <!-- <option selected>select Category</option> -->
                                                <?php
                                                require_once '../includes/dbh.inc.php';

                                                $sql = "SELECT * FROM category;";
                                                $sql_run = mysqli_query($conn, $sql);

                                                while($row = mysqli_fetch_array($sql_run)){ ?>

                                                <option value='<?php echo $row['category_name']?>'>
                                                    <?php echo $row['category_name']; ?></option>

                                                <?php } ?>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <label for="food_portion" class="col-sm-2 col-form-label">Portion</label>
                                        <div class="col-sm-10">
                                            <div class="row">
                                                <!-- <div class="col-md-8">
                                                    <input class="form-control" type="text" placeholder="Product Size"
                                                        id="productSize" name="productSize">
                                                </div> -->
                                                <div class="col-md-4">
                                                    <select class="form-select" name="unit" id="unit">
                                                        <!-- <option selected>Portion</option> -->
                                                        <option value="Small"> Small</option>
                                                        <option value="Large"> Large</option>
                                                        <!-- <option value="L"> L</option>
                                                        <option value="ml"> ml</option> -->
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="food_price" class="col-sm-2 col-form-label">Price (Rs.)</label>
                                        <div class="col-sm-10">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <span class="input-group-text col-form-label">Rs.</span>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control col-form-label"
                                                        placeholder="Food-menu Price" id="food_price" name="food_price">
                                                </div>
                                                <div class="col-md-2">
                                                    <span class="input-group-text col-form-label">.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="productDiscount" class="col-sm-2 col-form-label">Discount</label>
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input class="form-control" type="text" placeholder="Discount"
                                                        id="food_discount" name="food_discount">
                                                </div>
                                                <div class="col-md-3">
                                                    <span class="input-group-text col-form-label">%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="productDiscount" class="col-sm-2 col-form-label">Discounted
                                            Price</label>
                                            
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input class="form-control" type="text" placeholder="Discount"
                                                        id="food_discount" name="food_discount">
                                                </div>
                                                <!-- <div class="col-md-3">
                                                    <span class="input-group-text col-form-label">%</span>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>





                                    <div class="mb-3 row">
                                        <label for="food_quatity" class="col-sm-2 col-form-label">Available
                                            Quantity</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text"
                                                placeholder=" Available Food Quantity" id="food_quantity"
                                                name="food_quantity">
                                        </div>
                                    </div>



                                    <div class="mb-3 row">
                                        <label for="productDiscount" class="col-sm-2 col-form-label">Description</label>
                                        <div class="col-sm-10">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <input class="form-control" type="text"
                                                        placeholder="Food Description" id="food_description"
                                                        name="food_description">
                                                </div>
                                                <!-- <div class="col-md-2">
                                                    <span class="input-group-text col-form-label">%</span>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>





                                    <!--                            
                                    <div class="mb-3 row">
                                        <label for="food_discount" class="col-sm-2 col-form-label">Discount</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" placeholder=" Discount"
                                                id="food_discount" name="food_discount">
                                        </div>
                                    </div> -->
                                    <!-- <div class="mb-3 row">
                                        <label for="categoryDescription"
                                            class="col-sm-2 col-form-label">Description</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" placeholder="Category Description"
                                                id="categoryDescription" rows="3" name="categoryDescription"></textarea>
                                        </div>
                                    </div> -->
                                    <div class="mb-3 row">
                                        <label for="food_image" class="col-sm-2 col-form-label">Image</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" id="food_image" type="file" name="food_image"
                                                accept=".jpg,.jpeg">
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" name="submit" class="btn btn-primary">Save</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal update -->

                <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Food</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="../includes/updatefood.php" method="POST" enctype="multipart/form-data">

                                    <div class="mb-3 row">
                                        <label for="food_name" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" placeholder="Food-Menu Name"
                                                id="productNameUpdate" name="food_name">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="category_name" class="col-sm-2 col-form-label">Category</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" type="text" placeholder="Category Name"
                                                name="category_name" id="categoryNameUpdate">
                                                <!-- <option selected>Category</option> -->
                                                <?php
                                                 require_once '../includes/dbh.inc.php';

                                                 $sql = "SELECT * FROM category;";
                                                 $sql_run = mysqli_query($conn, $sql);

                                                 while($row = mysqli_fetch_array($sql_run)){ ?>

                                                <option value='<?php echo $row['category_name']?>'>
                                                    <?php echo $row['category_name']; ?></option>

                                                <?php  } ?>
                                            </select>
                                            <!-- <input class="form-control" type="text" placeholder="Category Name"
                                                id="categoryNameUpdate" name="category_name" disabled> -->
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <label for="productSize" class="col-sm-2 col-form-label">Portion</label>
                                        <div class="col-sm-10">
                                            <div class="row">
                                                <!-- <div class="col-md-8">
                                                    <input class="form-control" type="text" placeholder="Food Portion"
                                                        id="productSizeUpdate" name="food_portion">
                                                </div> -->
                                                <div class="col-md-4">

                                                    <select class="form-select" id="productSizeUpdate"
                                                        name="food_portion">
                                                        <!-- <option selected>Unit</option> -->
                                                        <!-- <option value="Kg"> Kg</option> -->
                                                        <option value="Small"> Small</option>
                                                        <option value="Large"> Large</option>
                                                        <!-- <option value="ml"> ml</option> -->
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                    </div>











                                    <div class="mb-3 row">
                                        <label for="food_price" class="col-sm-2 col-form-label">Price </label>
                                        <div class="col-sm-10">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <span class="input-group-text col-form-label">Rs.</span>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control col-form-label"
                                                        placeholder="Food Price" id="productPriceUpdate"
                                                        name="food_price">
                                                </div>
                                                <div class="col-md-2">
                                                    <span class="input-group-text col-form-label">.00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="food_quantity" class="col-sm-2 col-form-label">Quantity</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text"
                                                placeholder="Available Food Quantity" id="productQtyUpdate"
                                                name="food_quantity">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="food_discount" class="col-sm-2 col-form-label">Discount</label>
                                        <div class="col-sm-10">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input class="form-control" type="text" placeholder="Food Discount"
                                                        id="productDiscountUpdate" name="food_discount">
                                                </div>
                                                <div class="col-md-2">
                                                    <span class="input-group-text col-form-label">%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>






                                    <div class="mb-3 row">
                                        <label for="food_discount" class="col-sm-2 col-form-label">Description</label>
                                        <div class="col-sm-10">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input class="form-control" type="text"
                                                        placeholder="Food Description" id="productDescriptionUpdate"
                                                        name="food_description">
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                    <div class="mb-3 row">
                                        <label for="food_image" class="col-sm-2 col-form-label">Image</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" id="productImgUpdate" type="file"
                                                name="food_image" accept=".jpg,.jpeg">
                                        </div>
                                    </div>
                                    <div>
                                        <input type="text" id="productIdupdate" name="food_id" hidden>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="update" class="btn btn-primary">Update</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>


                <!-- Delete Alert Model -->

                <div class="modal fade " id="deleteAlert" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Warnning!</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h5>Are you sure to delete the product?</h5>
                            </div>

                            <div>
                                <!-- food  id -->
                                <input type="text" id="productIdDelete" name="food_id" hidden>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                <button type="button" class="btn btn-primary"
                                    onclick="window.location.href = '../includes/deletefood.php?delete='+document.getElementById('productIdDelete').value;">Delete</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end delete model -->



            </main>
        </div>
    </div>

    <?php
        // }
    ?>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>

</body>

</html>