<?php
    // include_once 'header.php';
?>

<!-- Bootstrap CSS-->
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>AMBASEWANA - Sign Up</title>
    <style>
    * {

        padding: 0;
        margin: 0;
        border: 0;
        box-sizing: border-box;

    }

    body {
        background: rgba(70, 63, 47, 0.96);
        /* outiside form colour*/
    }

    .row {
        background: whitesmoke;
        /*inside form colour*/
        border-radius: 30px;
        box-shadow: 12px, 12px, 22px, grey;
    }

    img {
        border-top-left-radius: 30px;
        border-bottom-left-radius: 30px;
        border-radius: 4px;
        font-weight: bold;

    }


    .btn1:hover {
        background: white;
        border: 1px solid;
        color: black;
    }

    .btn1 {
        border: none;
        outline: none;
        height: 50px;
        width: 100px;
        background-color: #000000;
        color: white;
        border-radius: 4px;
        font-weight: bold;


    }
    </style>
</head>

<body>
    <section class="form my-4 mx-5">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-5">
                    <img= src="./assets/img/logo.png" class="img-fluid" alt="">
                </div>
                <div class="col-lg-7 px-5 pt-5">
                    <h3 class="font-weight-bold py-3">AMBASEWANA RESTAURANT</h3>
                    <h4>Admin Log In </h4>


                    <form action="./includes/signup.inc.php" method="post">

                        <?php 
    // if(isset($_GET["error"])){
        // if($_GET["error"]=="emptyinput"){
        //     echo '<div class="alert alert-danger" role="alert">Fill in all the fields!</div>';
        // }
    //     if($_GET["error"]=="invaliduid"){
    //         echo '<div class="alert alert-danger" role="alert">Choose a proper username!</div>';
    //     }
    //     else if($_GET["error"]=="invalidemail"){
    //         echo '<div class="alert alert-danger" role="alert">Choose a proper email!</div>';
    //     }
    //     else if($_GET["error"]=="passworddontmatch"){
    //         echo '<div class="alert alert-danger" role="alert">Passwords does not match!</div>';
    //     }
    //     // else if($_GET["error"]=="stmtfailed"){
    //     //     echo '<div class="alert alert-danger" role="alert">Something went wrong, please try again!</div>';
    //     // }
    //     else if($_GET["error"]=="emailtaken"){
    //         echo '<div class="alert alert-danger" role="alert">Username already taken, please try another one!</div>';
    //     }
    //     else if($_GET["error"]=="invalidContactNo"){
    //       echo '<div class="alert alert-danger" role="alert">Choose a proper contact no!</div>';
    //   }
    // }
    ?>



                        <div class="form-row">
                            <div class="col-lg-7">

                                <input type="text" name="name" class="form-control my-3 p-2" placeholder="Full name"
                                    value="" required>

                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">

                                <input type="email" name="email" class="form-control my-3 p-2"
                                    placeholder="Email Address" value="" required>

                            </div>
                        </div>

                        <!-- <div class="form-row">
                            <div class="col-lg-7">

                                <input type="text" name="address" class="form-control my-3 p-2" placeholder="address"
                                    required>

                            </div>
                        </div> -->
                        <!-- 
                        <div class="form-row">
                            <div class="col-lg-7">

                                <input type="text" name="contactnum" class="form-control my-3 p-2"
                                    placeholder="Contact Number" required>

                            </div>
                        </div> -->
                        <div class="form-row">
                            <div class="col-lg-7">

                                <input type="password" name="password" class="form-control my-3 p-2"
                                    placeholder="Password" required>

                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">

                                <input type="password" name="checkPassword" class="form-control my-3 p-2"
                                    placeholder="Repeat Password" required>

                            </div>
                        </div>



                        <div class="form-row">
                            <div class="col-lg-7">
                                <button type="submit" class="btn1 mt-3 mb-5" name="submit"> Sign Up</button>
                            </div>
                        </div>
                        <!-- <a href="#">Forgot Password</a> -->
                        <p>Already have an account? <a href="login.php">Log In</a></p>
                        <!-- <a href="index2.php">Back to Main Page</a> -->

                    </form>

                </div>

            </div>

    </section>













    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>


<?php
     include_once 'newfooter.php';
?>