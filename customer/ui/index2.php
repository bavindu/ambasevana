<?php
  session_start();
  require_once('../includes/dbh.inc.php');
  require_once('./components.php');
  require_once('../includes/functions.inc.php');



  $serverName="localhost";
  $dBUserName="root";
  $dBPassword="";
  $dBName="amba_db";

  $conn = mysqli_connect($serverName,$dBUserName,$dBPassword,$dBName);

  if(isset($_POST['order'])){
    //  print_r($_POST['food_id']);
    if(isset($_SESSION['cart'])){

     $item_array_id = array_column($_SESSION['cart'], 'food_id');
    // print_r($item_array_id);

     if(in_array($_POST['food_id'],$item_array_id)){
       echo "<script>alert('Product is already added')</script>";
       echo "<script>window.location=index2.php</script>";
     }else{
        $count = count($_SESSION['cart']);
        $item_array= array('food_id' => $_POST['food_id']);
        $_SESSION['cart'][$count]= $item_array;
        //print_r($_SESSION['cart']);
     }

      // print_r($_SESSION['cart']);
    }
    else{
      $item_array = array ('food_id'=>$_POST['food_id'] );
      $_SESSION['cart'][0]=$item_array;
 //   print_r($_SESSION['cart']);
    }
  }

?>
<?php
  include_once 'header.php';
  ?>
<!-- End Header -->
<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">
    <div class="container position-relative text-center text-lg-left" data-aos="zoom-in" data-aos-delay="100">
        <div class="row">
            <div class="col-lg-8">
                <h1>Welcome to<br> <span>Ambasewana Restaurant</span></h1>
                <br>
                <h2>- The Best Taste in Matara -</h2>
                <div class="btns">

                    <a href="#menu" class="btn-menu animated fadeInUp scrollto">Order Food</a>
                    <a href="book.php" class="btn-book animated fadeInUp scrollto">Book a Table</a>
                    <!-- <a href="#about" class="btn-book animated fadeInUp scrollto">Deliver Food</a> -->
                </div>
            </div>


        </div>
    </div>
</section>


<link rel="stylesheet" type="text/css" href="main.css">
<!-- End Hero -->
<main id="main">
    <!-- ======= About Section ======= -->


    <section id="about" class="about">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-12 section-title">
                    <!-- <h2>About Us</h2> <br>
                    <h4>A Leading Restaurant in Matara serving lunch and dinner with different varieties of food items.
                    </h4><br><br> -->
                    <p>Our services are </p>
                </div>
            </div>


            <div class="row ">
                <div class=" col-4 col-lg-4 col-sm-12">
                    <h2>Online Ordering</h2>
                    <p> </p>
                </div>


                <div class="col-4 col-lg-4 col-sm-12">
                    <h2>Table Reservation</h2>
                </div>


                <div class="col-4 col-lg-4 col-sm-12  ">
                    <h2>Delivery</h2>
                    <p></p>


                </div>

            </div>



        </div>

        </div>
    </section>

    <!-- End About Section -->



    <!-- ======= Why Us Section ======= -->

    <section id="why-us" class="why-us">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Why Us</h2>
                <p>Why Choose Our Restaurant</p>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="box" data-aos="zoom-in" data-aos-delay="100">
                        <span>01</span>
                        <h4>Variety of Foods</h4>

                    </div>
                </div>

                <div class="col-lg-4 mt-4 mt-lg-0">
                    <div class="box" data-aos="zoom-in" data-aos-delay="200">
                        <span>02</span>
                        <h4>Online Reservation facilities</h4>

                    </div>
                </div>
                <div class="col-lg-4 mt-4 mt-lg-0">
                    <div class="box" data-aos="zoom-in" data-aos-delay="300">
                        <span>03</span>
                        <h4> Comfortable Price Range</h4>

    </section>
    <!-- End Why Us Section -->


    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Menu</h2>
                <p>Check Our Tasty Menu</p>
            </div>

            <?php
            // component('./images/wp png.png','Washing Powder', '1 Kg', 150);
             $result = getData();
            while($row = mysqli_fetch_assoc($result)){
            component($row['food_image'], $row['food_name'],$row['food_price'],$row['food_description'], $row['food_id']);
            }
        
            ?>


        </div>
    </section>


    -
    <!-- End Menu Section -->

    <!-- ======= Specials Section ======= -->
    <!-- <section id="specials" class="specials">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Specials</h2>
                <p>Check Our Specials</p>
            </div>


    </section> -->

    <!-- End Specials Section -->

    <!-- ======= Book A Table Section ======= -->
    <!-- <section id="book-a-table" class="book-a-table">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Reservation</h2>
                <p>Book a Table</p>
            </div> -->















    <!-- <form action="forms/book-a-table.php" method="post" role="form" class="php-email-form" data-aos="fade-up"
                data-aos-delay="100">
                <div class="form-row">
                    <div class="col-lg-4 col-md-6 form-group">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"
                            data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                        <div class="validate"></div>
                    </div>
                    <div class="col-lg-4 col-md-6 form-group">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email"
                            data-rule="email" data-msg="Please enter a valid email">
                        <div class="validate"></div>
                    </div>
                    <div class="col-lg-4 col-md-6 form-group">
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Your Phone"
                            data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                        <div class="validate"></div>
                    </div>
                    <div class="col-lg-4 col-md-6 form-group">
                        <input type="text" name="date" class="form-control" id="date" placeholder="Date"
                            data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                        <div class="validate"></div>
                    </div>
                    <div class="col-lg-4 col-md-6 form-group">
                        <input type="text" class="form-control" name="time" id="time" placeholder="Time"
                            data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                        <div class="validate"></div>
                    </div>
                    <div class="col-lg-4 col-md-6 form-group">
                        <input type="number" class="form-control" name="people" id="people" placeholder="# of people"
                            data-rule="minlen:1" data-msg="Please enter at least 1 chars">
                        <div class="validate"></div>
                    </div>
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
                    <div class="validate"></div>
                </div>
                <div class="mb-3">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your booking request was sent. We will call back or send
                        an Email to confirm your reservation. Thank you!</div>
                </div>
                <div class="text-center"><button type="submit">Book a Table</button></div>
            </form> -->
    <!-- </div>
    </section> -->
    <!-- End Book A Table Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Contact</h2>
                <p>Contact Us</p>
            </div>
        </div>





        <div data-aos="fade-up">

        </div>
        <div class="container" data-aos="fade-up">
            <div class="row mt-5">

                <div class="col-lg-4">
                    <div class="info">
                        <div class="address">
                            <i class="icofont-google-map"></i>
                            <h4>Location:</h4>
                            <p> No 23, <br> Kumarathunga Mawatha, <br> Matara.</p>
                        </div>
                        <div class="open-hours">
                            <i class="icofont-clock-time icofont-rotate-90"></i>
                            <h4>Open Hours:</h4>
                            <p>
                                Monday-Saturday:<br>
                                11:00 AM - 10:00 PM
                            </p>
                        </div>
                        <div class="email">
                            <i class="icofont-envelope"></i>
                            <h4>Email:</h4>
                            <p> ambasewana@gmailcom</p>
                        </div>
                        <div class="phone">
                            <i class="icofont-phone"></i>
                            <h4>Call:</h4>
                            <p>071 9988 037 / 041 2222 911</p>
                        </div>

                    </div>
                </div>





                <div class="col-lg-8 mt-5 mt-lg-0">
                    <form action="../includes/feedback.inc.php" method="POST" role="form" class="php-email-form">
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name"
                                    data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                <div class="validate"></div>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                <div class="validate"></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject"
                                data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                            <div class="validate"></div>


                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" rows="8" data-rule="required"
                                data-msg="Please write something for us" placeholder="Message"></textarea>
                            <div class="validate"></div>
                        </div>
                        <div class="mb-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your feedback has been sent. Thank you!</div>
                        </div>
                        <div class="text-center"><button type="submit" name="button">Send Feedback</button></div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</main>
<!-- End #main -->
<!-- ======= Footer ======= -->

<?php
  include_once 'footer.php';
  ?>




<!-- End Footer -->
<a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>
<div id="preloader"></div>



</body>

</html>


<!-- jquery cdn -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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



<script src="../assets/vendor/jquery/jquery.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="../assets/vendor/php-email-form/validate.js"></script>
<script src="../assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="../assets/vendor/venobox/venobox.min.js"></script>
<script src="../assets/vendor/aos/aos.js"></script>

<!-- Template Main JS File -->
<script src="../assets/js/main.js"></script>