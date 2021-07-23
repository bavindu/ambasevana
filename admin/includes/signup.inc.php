<?php

if(isset($_POST['submit'])){
    $userName = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $checkPassword = $_POST['checkPassword'];   

    require 'dbh.inc.php';
    require 'functions.inc.php';
    
    //if(emptyInputLogin($email, $password) !== false){
     //   header("location: ../login.php?error=emptyinput");
     //   exit();
     // }
    
     createAdmin($conn,  $userName, $email, $password);
    }
    else{
        header("location: ../login.php");
        exit();
    }





//$conn = mysqli_connect($serverName,$dBUserName,$dBPassword,$dBName);


//if($conn){
//    echo "connected";


//}else{
//    echo "not connected";
//}
  
//$query ="INSERT INTO customer (customer_name,email,address,contactnum,password)";
//$query .="VALUES  ('$username','$useremail', '$useraddress','$usercontact','$userpassword')";


//$result= mysqli_query($conn,$query);

//if(!$result){
 //   die('Query Failed' .mysqli_error());
//}