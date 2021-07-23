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

    <title>AMBASEWANA - Log In</title>
    <style>
    * {

        padding: 0;
        margin: 0;
        border: 0;
        box-sizing: border-box;

    }

    body {
        background: rgba(70, 63, 47, 0.96);
    }

    .row {
        background: white;
        border-radius: 30px;
        box-shadow: 12px, 12px, 22px, grey;
    }

    /* img {
        border-top-left-radius: 30px;
        border-bottom-left-radius: 30px;
        border-radius: 4px;
        font-weight: bold;

    } */

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
                    <img= src="assets/img/ambasewana.png" class="img-fluid" alt="">
                </div>
                <div class="col-lg-7 px-5 pt-5">
                    <h3 class="font-weight-bold py-3">AMBASEWANA RESTAURANT</h3>
                    <h4>ADMIN LOG IN</h4>


                    <form action="./includes/login.inc.php" method="post">


                        <div class="form-row">
                            <div class="col-lg-7">

                                <input type="text" class="form-control my-3 p-2" name="email"
                                    placeholder="Email Address" value="" required>

                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">

                                <input type="password" class="form-control my-3 p-2" name="password"
                                    placeholder="Password" required>

                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <button type="submit" class="btn1 mt-3 mb-5" name="submit"> Log In</button>
                            </div>
                        </div>
                        <!-- <a href="#">Forgot Password</a> -->
                        <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
                        <!-- <a href="./dashboard/index.php">Back to Main Page</a> -->

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