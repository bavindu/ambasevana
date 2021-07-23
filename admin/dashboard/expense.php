<!-- new expense table -->
<?php
// session_start();
// if(!isset($_SESSION["user_id"])){
//   header("location: ../login.php");
//   exit();
// }
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
                    <h1 class="h2">Expenses</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal"
                                data-bs-target="#addModal">
                                Add Expenses
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
                                        <th scope="col"> Name</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Value</th>
                                        <!-- <th scope="col">Mobile Phone</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Salary</th> -->
                                        <th scope="col"> Date</th>

                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                     include_once '../dashboard/components/expensetable.php'
                                ?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                    <!--Display categories table end -->
                </div>

                <!--  Expense Modal -->
                <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add New Expense</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="../includes/expense.inc.php" method="POST" enctype="multipart/form-data">

                                    <div class="mb-3 row">
                                        <label for="employee_name" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" placeholder="Expense Name"
                                                id="expense_name" name="expense_name">
                                        </div>
                                    </div>

                                    <!-- <div class="mb-3 row">
                                        <label for="lastName" class="col-sm-2 col-form-label">Last Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" placeholder="Last Name"
                                                id="lastName" name="lastName">
                                        </div>
                                    </div> -->

                                    <div class="mb-3 row">
                                        <label for="expense_type" class="col-sm-2 col-form-label">Type</label>
                                        <div class="col-sm-10">
                                            <!-- <input class="form-control" type="text" placeholder="Expense Type"
                                                id="expense_type" name="expense_type">
                                        </div> -->

                                            <div class="row">
                                                <!-- <div class="col-md-8">
                                                    <input class="form-control" type="text" placeholder="Product Size"
                                                        id="productSize" name="productSize">
                                                </div> -->
                                                <div class="col-md-6">
                                                    <select class="form-select" name="expense_type" id="expense_type">
                                                        <!-- <option selected>Portion</option> -->
                                                        <option value="Wages"> Wages</option>
                                                        <option value="Bill Payments"> Bill Payments</option>
                                                        <option value="Item Purchases"> Item Purchases</option>
                                                        <option value="Assets Purchases">Assets Purchases </option>
                                                        <option value="Other"> Other</option>
                                                        <!-- <option value="L"> L</option>
                                                        <option value="ml"> ml</option> -->
                                                    </select>
                                                </div>
                                            </div>
                                        </div>





                                    </div>

                                    <div class="mb-3 row">
                                        <label for="expense_value" class="col-sm-2 col-form-label">Value</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" placeholder="Expense Value"
                                                id="expense_value" name="expense_value">
                                        </div>
                                    </div>

                                    <!-- <div class="mb-3 row">
                                        <label for="employee_contactnum" class="col-sm-2 col-form-label">Contact
                                            Number</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" placeholder="Contact Number"
                                                id="employee_contactnum" name="employee_contactnum">
                                             <input class="form-control" type="text" placeholder="Mobile Phone"
                                                id="employee_contactnum" name="employee_contactnum"> -->
                                    <!-- </div>
                                    </div>  -->




                                    <!-- <div class="mb-3 row">
                                        <label for="categoryDescription"
                                            class="col-sm-2 col-form-label">Description</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" placeholder="Category Description"
                                                id="categoryDescription" rows="3" name="categoryDescription"></textarea>
                                        </div>
                                    </div> -->
                                    <!-- <div class="mb-3 row">
                                        <label for="productImg" class="col-sm-2 col-form-label">Image</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" id="productImg" type="file"
                                                name="productImg" accept=".jpg,.jpeg">
                                        </div>
                                    </div> -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="submit" class="btn btn-primary">Add</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Update expense  Model  -->
                <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Expense</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="../includes/updateexpense.php" method="POST"
                                    enctype="multipart/form-data">

                                    <div class="mb-3 row">
                                        <label for="employee_name" class="col-sm-2 col-form-label"> Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" placeholder="Expense Name"
                                                id="expensenameupdate" name="expense_name">
                                        </div>
                                    </div>

                                    <!-- <div class="mb-3 row">
                                        <label for="lastName" class="col-sm-2 col-form-label">Last Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" placeholder="Last Name"
                                                id="lastNameUpdate" name="lastName">
                                        </div>
                                    </div> -->

                                    <div class="input-group mb-3">
                                        <label for="expense_type" class="col-sm-2 col-form-label">Expense Type</label>
                                        <div class="col-sm-10">
                                            <div class="row">
                                                <!-- <div class="col-md-8">
                                                    <input class="form-control" type="text" placeholder="Food Portion"
                                                        id="productSizeUpdate" name="food_portion">
                                                </div> -->
                                                <div class="col-md-6">

                                                    <select class="form-select" id="expensetypeupdate"
                                                        name="expense_type">
                                                        <!-- <option selected>Unit</option> -->
                                                        <!-- <option value="Kg"> Kg</option> -->
                                                        <option value="Wages"> Wages</option>
                                                        <option value="Bill Payments"> Bill Payments</option>
                                                        <option value="Item Purchases"> Item Purchases</option>
                                                        <option value="Assets Purchases">Assets Purchases </option>
                                                        <option value="Other"> Other</option>
                                                        <!-- <option value="ml"> ml</option> -->
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                    </div>








                                    <div class="mb-3 row">
                                        <label for="expense_value" class="col-sm-2 col-form-label">Value </label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" placeholder="Expense Value"
                                                id="expensevalueupdate" name="expense_value">
                                        </div>
                                    </div>






                                    <div>
                                        <input type="text" id="expenseidupdate" name="expense_id" hidden>
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
                                <h5>Are You Sure to Delete the Expense?</h5>
                            </div>

                            <div>
                                <input type="text" id="expenseidDelete" name="expense_id" hidden>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                <button type="button" class="btn btn-primary"
                                    onclick="window.location.href = '../includes/deleteexpense.php?delete='+document.getElementById('expenseidDelete').value;">Delete</button></a>

                            </div>
                        </div>
                    </div>
                </div>



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