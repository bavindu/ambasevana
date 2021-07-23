<?php
    //  session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>AMBASEWANA-Main Page</title>





    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

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

</head>

<body>

    <!-- ======= Top Bar ======= -->
    <div id="topbar" class="d-flex align-items-center bg-dark fixed-top">
        <div class="container d-flex">
            <div class="contact-info mr-auto">
                <i class="icofont-phone"></i> 071 9988 037 / 041 2222 911
                <span class="d-none d-lg-inline-block "><i class="text-light icofont-clock-time icofont-rotate-180"></i>
                    Mon-Sat:
                    11:00 AM - 10:00 PM</span>
            </div>
        </div>
    </div>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <nav class=" navbar navbar-expand-lg navbar-dark nav-menu  ">
            <div class="container d-flex ">
                <div class="logo mr-auto">
                    <h1 class="text-light"><a href="index2.html">Ambasewana Restaurant</a></h1>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent-4" aria-controls="navbarSupportedContent-4"
                    aria-expanded="false" aria-label="Toggle navigation">
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
                        <!--             
                        <li class="nav-item">
                            <a class="nav-link" href="#events"> Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#gallery"> Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#chefs"> Chefs</a>
                        </li>
                        -->
                        <li class="nav-item">
                            <a class="nav-link" href="#contact"> Contact</a>
                        </li>

                        <!-- after login view -->



                        <!-- <i class="fas fa-shopping-cart"></i>
                            <?php
                                // if(isset($_SESSION['cart'])){
                                //     $count = count($_SESSION['cart']);
                                //     echo " <span id='cartCount' class='text-warning' bg-light>$count</span>" ;
                                // }
                                // else{
                                //     echo " <span id='cartCount' class='text-warning' bg-light>0</span>" ; 
                                // }
                            ?> -->

                        <!-- </h6> -->
                        </a>


                        <!--  19/6 after login view -->

                        <!-- <li class="book-a-table text-center"><a href="login.php">LogIn</a>
                        </li>
                        <li class="book-a-table text-center"><a href="signup.php">Sign Up</a>
                        </li>  -->



                        <?php
                            if(isset($_SESSION["customer_id"])){
                                // echo "<li class='book-a-table text-center'><a href='cart.php'>Cart</a>
                                // </li>";
                                echo "<li class='book-a-table text-center'><a href='./order.php'>Profile</a>
                                </li>";
                                echo "<li class='book-a-table text-center'><a href='../includes/logout.inc.php'>LogOut</a>
                                </li>";
                         
                            }
                            else{
                                echo "<li class='book-a-table text-center'><a href='login.php'>LogIn</a>
                                </li>";
                                echo "<li class='book-a-table text-center'><a href='signup.php'>SignUp</a>
                                </li>";
                            }
                        ?>


                        <li class="nav-item bg-light rounded-circle ml-3">
                            <a href="cart.php" class="nav-link active " id="cart">
                                <!-- <h6 class="px-5 cart "> -->
                                <!-- <div class="row"> -->
                                <!-- <div class="col-6">
                        <i class="fas fa-shopping-cart"></i>
                        </div> -->
                                <!-- <div class="col-6"> -->

                                <!-- </div> -->
                                <!-- </div> -->
                                <?php
                            if(isset($_SESSION['cart'])){
                                $count = count($_SESSION['cart']);
                                echo " <div id='cartCount' class='text-danger text-left'>
                                <i class='fas fa-shopping-cart'>
                                 $count
                                </i>
                                </div>" ;
                            }
                            else{
                                // echo " <span id='cartCount' class='text-danger' bg-light>0</span>" ; 
                                echo " <div id='cartCount' class='text-danger text-left' ><i class='fas fa-shopping-cart'>0</i></div>" ;
                            }
                        ?>
                        </li>


                    </ul>
                </div>
            </div>
        </nav>
    </header>