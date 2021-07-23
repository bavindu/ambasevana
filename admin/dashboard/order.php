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
    <title>AMBASEWANA RESTAURANT </title>
    <link rel="icon" href="../images/logo2.png">

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
       include_once './components/navbar.php'
    ?>

    <div class="container-fluid">
        <div class="row">
            <?php
                include_once './components/sidebar.php'
            ?>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Customer Orders</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <!-- <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal"
                                data-bs-target="#addModal">
                                Add Product
                            </button> -->
                        </div>
                    </div>
                </div>

                <div>
                    <div>

                    </div>

                    <!--Display categories table start -->
                    <div>
                        <form action="" method="POST" enctype="multipart/form-data">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Order Id</th>
                                        <th scope="col">Customer Name</th>

                                        <th scope="col">Contact No.</th>
                                        <!-- <th scope="col">Delivery Address</th> -->
                                        <th scope="col">Total (Rs)</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Order Status</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                     include_once '../dashboard/components/ordertable.php'
                                ?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                    <!--Display table end -->
                </div>

                <!-- Modal update -->
                <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Order Status</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="../includes/updateorder.php" method="POST" enctype="multipart/form-data">
                                    <div class="mb-3 row">
                                        <div class="col-sm-3">
                                            <label for="category_name" class=" col-form-label">Order Status</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <select class="form-select" name="order_status" id="order_status">

                                                <option value="Order Placed">Order Placed</option>
                                                <option value="Order Processing">Order Processing</option>
                                                <option value="Order Prepared">Order Prepared</option>
                                                <option value="Order Completed">Order Completed </option>
                                                <!-- <option value="Delivered">Delivered</option> -->
                                            </select>
                                        </div>
                                    </div>

                                    <div>
                                        <input type="text" id="order_idupdate" name="order_id" hidden>
                                        <!-- <input type="text" id="cid" name="cid" hidden> -->
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
                <!-- Update Model End -->

                <!-- Modal -->
                <div class=" modal fade  " id="viewOrderModel" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!--Display order details table start -->
                                <div>
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Order Id</th>
                                                    <th scope="col">Food Menu Name</th>
                                                    <!-- <th scope="col">Mobile No.</th>
                                                    <th scope="col">Delivery Address</th> -->
                                                    <th scope="col">Ordered Quantity</th>
                                                    <th scope="col">Price</th>
                                                    <!-- <th scope="col">Order Status</th>
                                                    <th scope="col">Actions</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <input type="text" id="orderIdView" name="orderIdView"
                                                    value="<?php echo $row['order_id']; ?>" hidden>
                                                <?php
                                     include_once './components/ordertable.php'
                                ?>
                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                                <!--Display table end -->
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- emdModal -->

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