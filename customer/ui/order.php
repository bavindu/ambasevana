<?php
  session_start();
  require_once('../includes/dbh.inc.php');
  require_once('./components.php');
  require_once('../includes/functions.inc.php');

  if(!isset($_SESSION["customer_id"])){
    header("location: ./login.php");
    exit();
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- font awesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">

    <!--  Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./main.css">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">




    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="./main.css">
    <!-- <link href="../assets/css/style.css" rel="stylesheet"> -->

    <title>AMBASEWANA RESTAURANT</title>
    <link rel="icon" href="images/logo2.png">

</head>

<body class="bg-light">

    <?php
        // require_once('./component/header.php');
    ?>
    <div id="topbar" class="d-flex align-items-center bg-dark fixed-top">
        <div class="container d-flex">
            <div class="contact-info mr-auto">
                <i class="icofont-phone"></i> 071 9988 037 / 041 2222 911
                <span class="d-none d-lg-inline-block "><i class="text-light icofont-clock-time icofont-rotate-180"></i>
                    Mon-Sat:
                    11:00 AM - 10:00 PM</span>
            </div>
        </div>
    <!-- ======= Header ======= -->
        <header id="header" class="fixed-top">
            <nav class=" navbar navbar-expand-lg navbar-dark nav-menu  ">
                <div class="container d-flex ">
                    <div class="logo mr-auto">
                        <h1 class="text-light"><a href="index2.html">Ambasewana Restaurant</a></h1>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span></button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="index2.php"> Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#about"> About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#menu"> Menu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#specials"> Specials</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#contact"> Contact</a>
                            </li>
                            <?php
                            if (isset($_SESSION["customer_id"])) {
                                // echo "<li class='book-a-table text-center'><a href='cart.php'>Cart</a>
                                // </li>";
                                echo "<li class='book-a-table text-center'><a href='./order.php'>Profile</a>
                                    </li>";
                                echo "<li class='book-a-table text-center'><a href='../includes/logout.inc.php'>LogOut</a>
                                    </li>";
                            } else {
                                echo "<li class='book-a-table text-center'><a href='login.php'>LogIn</a>
                                    </li>";
                                echo "<li class='book-a-table text-center'><a href='signup.php'>SignUp</a>
                                    </li>";
                            }
                            ?>
                            <li class="nav-item bg-light rounded-circle ml-3">
                                <a href="cart.php" class="nav-link active " id="cart">
                                    <?php
                                    if (isset($_SESSION['cart'])) {
                                        $count = count($_SESSION['cart']);
                                        echo " <div id='cartCount' class='text-danger text-left'>
                                    <i class='fas fa-shopping-cart'>
                                    $count
                                    </i>
                                    </div>";
                                    } else {
                                        // echo " <span id='cartCount' class='text-danger' bg-light>0</span>" ; 
                                        echo " <div id='cartCount' class='text-danger text-left' ><i class='fas fa-shopping-cart'>0</i></div>";
                                    }
                                    ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
    </div>

    <div class="container-fluid " style="margin-top:150px">


        <?php 
            $msg ="";
            if(isset($_GET['orderPlaced'])){
                $msg="Order Placed Successfully.An email has been sent to your email address with order details ";
                echo '<div class="alert alert-success">'.$msg.'</div>';
            }
        ?>

        <div class="row content">
            <div class="col-md-1"></div>
            <!--Display categories table start -->
            <div class="col-md-10">
                <form action="" method="POST" enctype="multipart/form-data">
                    <h1 class="h2 py-3 ">Your Orders</h1>
                    <table class="table table-hover  border-success ">
                        <thead id="tableHead" class="border-success border border-2 ">
                            <tr>
                                <th scope="col">Order Id</th>
                                <!-- <th scope="col">Customer Id</th> -->
                                <th scope="col">Mobile No.</th>
                                <!-- <th scope="col">Delivery Address</th> -->
                                <th scope="col">Grand Total (Rs.)</th>
                                <th scope="col">Date</th>
                                <th scope="col">Order Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include_once './order.table.php'
                    ?>
                        </tbody>
                    </table>
                </form>
            </div>
            <div class="col-md-1"></div>
            <!--Display table end -->


        </div>










        <!-- jquery cdn -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <!-- bootstrap js -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
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


</body>

</html>