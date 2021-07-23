<?php
  session_start();
  require_once('../includes/dbh.inc.php');
  require_once('./components.php');
  require_once('../includes/functions.inc.php');

  if(!isset($_SESSION["customer_id"])){
    header("location: ./login.php");
    exit();
  }
  

  if(isset($_POST['remove'])){
     if($_GET['action']=='remove'){
         foreach($_SESSION['cart'] as $key => $value){
             if($value["food_id"]==$_GET['id']){
                 unset($_SESSION['cart'][$key]);
                echo "<script>alert('Product has been Removed...!')</script>";
                echo "<script>window.location = 'cart.php'</script>";
             }
         }
     }
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">



    <!-- font awesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <!-- style changed -->
    <link rel="stylesheet" type="text/css" href="./main.css">


    <title>AMBASEWANA RESTAURANT</title>
    <link rel="icon" href="images/logo2.png">


    <script>
    var count1 = 0;
    var input_value = [];
    var unit = [];

    function priceCal(x, y) {
        console.log(x * y)
    }
    </script>

</head>





<?php
        // require_once('./header.php');
    ?>

<body class="bg-light">
    <div class="container-fluid">
        <div class="row px-5 mt-5">
            <div class="col-md-7 mt-5">
                <div class="shopping-cart">
                    <h3 class="text-center text-dark">My Cart</h3>
                    <hr>

                    <?php
                        $total =0;
                        $qtyVal =1;
                        if(isset($_SESSION['cart'])){
                            $product_id = array_column($_SESSION['cart'],'food_id');
                            // print_r($_SESSION['cart']);

                            $result = getData();
                            while($row = mysqli_fetch_assoc($result)){
                                foreach($product_id as $id){
                                    if($row['food_id']==$id){
                                        cartElement($row['food_image'], $row['food_name'], $row['food_portion'], $row['food_price'], $row['food_id'], $row['food_quantity'],$row['food_description']);
                                        // $qtyVal is not included
                                        $total = $total +(int)$row['food_price'];
                                     }
                                }
                            }
                            // $result = getDataDetergents();
                            // while($row = mysqli_fetch_assoc($result)){
                            //     foreach($product_id as $id){
                            //         if($row['productId']==$id){
                            //             cartElement($row['productImg'], $row['productName'], $row['productSize'], $row['productPrice'], $row['productId'], $row['productQty'],$qtyVal);
                            //             $total = $total +(int)$row['productPrice'];
                                       
                            //          }
                            //     }
                            // }

                        }
                        else{
                            echo"<h5>Cart is Empty</h5>";
                        }
                    ?>

                </div>
            </div>
            <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25 ">
                <div class="pt-4">
                    <h6>Price Details</h6>
                    <hr>
                    <div class="row price-details">
                        <div class="col-md-6">
                            <?php
                                if(isset($_SESSION['cart'])){
                                    $count = count($_SESSION['cart']);
                                    echo "<h6 >Price($count items)</h6>";
                                }
                                else{
                                    echo "<h6>Price (0 items)</h6>";
                                }
                            ?>

                            <hr>
                            <h6>Grand Total</h6>
                        </div>

                        <div class="col-md-6">
                            <h6><?php 
                            
                            if(isset($_SESSION['cart'])){
                                if(isset($_SESSION['total'])){
                                    $total = $_SESSION['total'];
                                }
                                if ($_SESSION['cart'] == NULL){
                                    echo "<script>
                                    document.getElementById('grand').innerHTML = '0.00';
                                    document.getElementById('beforetax').innerHTML = '0.00';
                                    </script>";
                                    unset($_SESSION['total']);
                                    $total = 0.00;
                                }
                            }
                            
                            echo "Rs.<span id='beforetax'>$total</span></h6>";
                            ?>
                                <hr>
                                <h6><?php echo "Rs.<span id='grand'> $total</span>"; ?></h6>
                                <hr>
                                <?php 
                                if(isset($_SESSION['cart'])):
                                if(count($_SESSION['cart'])>0):
                            ?>
                                <button class="btn btn-success" type='button' data-bs-toggle="modal"
                                    data-bs-target="#placeOrderAlert">Place the Order</button><br>
                                <?php endif; endif; ?>

                        </div>
                    </div>


                </div>

            </div>

        </div>

        <!-- Are you sure to place the order Model -->

        <div class="modal fade " id="placeOrderAlert" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="../includes/order.inc.php" method="POST" enctype="multipart/form-data">
                            <div class="mb-3 row">
                                <label for="phone" class="col-sm-2 col-form-label">Mobile</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" placeholder="Mobile Phone"
                                        id="mobileNumUpdate" name="customer_contactnum"
                                        value="<?php echo $_SESSION["mobile"] ?>">
                                    <input class="form-control" type="hidden" id="billtotal" name="billtotal"
                                        value="<?php echo $total ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">

                                <input type="hidden" name="customer_id" value=" <?php echo $_SESSION["customer_id"] ?>">

                            </div>









                            <?php
                        //     if(isset($_SESSION['cart'])){
                        //     $product_id = array_column($_SESSION['cart'],'product_id');

                        //     $result = getData();
                        //     while($row = mysqli_fetch_assoc($result)){
                        //         foreach($product_id as $id){
                        //             if($row['productId']==$id){
                        //                 cartElement($row['productImg'], $row['productName'], $row['productSize'], $row['productPrice'], $row['productId'], $row['productQty'],$qtyVal);
                        //                 $total = $total +(int)$row['productPrice'];
                        //             }
                        //         }
                        //     }
                        // }
                        ?>
                    </div>
                    <div class="modal-footer">
                        <a href="cart.php"><button type="button" class="btn btn-outline-success">Back to
                                cart</button></a>
                        <a href="index2.php"><button type="button" class="btn btn-outline-success">Order
                                More</button></a>
                        <button type="submit" name="submit" class="btn btn-success">Place the Order</button>
                        <!-- <div id="paypal-payment-button"></div> -->

                    </div>

                </div>
            </div>
        </div>


        <div>

            <?php 
// require_once("./component/footer.php"); 
?>

        </div>



        <!-- jquery cdn -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <!-- font awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
            integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- bootstrap js -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
            integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous">
        </script>

        <script type="text/javascript">
        // $(document).ready(function(){
        //     $(".itemQty").on('change',function(){
        //         var $el = $(this).closest('tr');
        //         var 
        //     })
        // })
        </script>

        <script src="js/scriptIndex.js"></script>

        <!-- Payment Gateway -->
        <script
            src="https://www.paypal.com/sdk/js?client-id=AZpQq6NbTz9uGIkioFyueqOn8NgJWZzNDWDns6GV8ygXXKQFuOJQi43MWLrdRe250Rt0_jeyX2xlI7I_&disable-funding=credit,card">
        </script>
        <script>
        // paypal.Buttons().render('#paypal-payment-button');
        </script>
        <!-- <script src="./paypal/index.js"></script> -->

</body>

</html>