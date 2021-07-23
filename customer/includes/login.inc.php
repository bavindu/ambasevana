<?php


if(isset($_POST["submit"])){


$email=$_POST["email"];
$password=$_POST["password"];


require 'dbh.inc.php';
require 'functions.inc.php';

//if(emptyInputLogin($email, $password) !== false){
 //   header("location: ../login.php?error=emptyinput");
 //   exit();
 // }
 
 loginUser($conn, $email, $password);
}
else{
    // 19-6 sign up page does nit work
    header("location: ../ui/login.php");
    exit();
}