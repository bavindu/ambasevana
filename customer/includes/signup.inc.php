<?php

if(isset($_POST['submit'])){

$name=$_POST['name'];
$email=$_POST['email'];
$address=$_POST['address'];
$contact=$_POST['contactnum'];
$password=$_POST['password'];
$repeatpassword=$_POST['repeatpassword'];

require_once 'dbh.inc.php';
require_once 'functions.inc.php';



//error handling
//     if(emptyInputSignup($name, $email, $address, $contact, $password, $repeatpassword) !== false){
 //     header("location: ../signup.php?error=emptyinput");
 //     exit();
 //     }
   

  
     if(invalidEmail($email)==true){
      //  19-6 sign up page does nit work
        header("location: ../ui/signup.php?error=invalidemail");
        exit();
      }
      if(pwdMatch($password, $repeatpassword)!==false){
        // 19-6 sign up page does nit work
       header("location: ../ui/signup.php?error=passworddontmatch");
        exit();
     }
      if( uidExists($conn,$email)!==false){
        // 19-6 sign up page does nit work
        header("location: ../ui/signup.php?error=emailtaken");
      exit();
    }
     if(invalidContactnum($contact)!==false){
        header("location: ../ui/signup.php?error=invalidContactNo");
        exit();
    }
    
     createUser($conn, $name, $email,$address , $contact, $password );
      
 }


    else{
      // 19-6 sign up page does nit work
        header("location: ../ui/signup.php");
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