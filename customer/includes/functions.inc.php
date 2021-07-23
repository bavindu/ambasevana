<?php
//function emptyInputSignup($name ,$email ,$address ,$contact,$password, $repeatpassword){
   // $result;
//if(empty($name) || empty($email) || empty($address) || empty($contact) || empty($password) || empty($repeatpassword)){
//    $result=true;
//}
//else{
 //   $result=false;
//}
//    return $result;
//}
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

// checking for empty  inputs from user

 function invalidEmail($email){
 //   $result;
   if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $result=true;
  }
   else{
         $result=false;
     }
     return $result;
}

function invalidContactnum($contactnum){
  //  $result;
 if(!is_numeric($contactnum) || strlen($contactnum) != 10){
   $result=true;
}
 else{
   $result=false;
}
  return $result;
 }

 function pwdMatch($password, $repeatpassword){
 //   $result;
if($password !== $repeatpassword){
    $result=true;
 }
 else{
   $result=false;
 }
    return $result;
}

 function uidExists($conn, $email){
     //SEND DATA TO DATABASE FIRST THEN FILL IN THE PLACEHOLDERS. 
     $sql = "SELECT * FROM customer WHERE customer_email = ?  ;";

    //PREPARED STATEMENT- TO PREVENT USE OF CODE IN THE INPUT FIELDS OF INTERFACE.TO PREVENT SQL INJECTION
     $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        // 19-6 sign up page does nit work
         header("location: ../ui/signup.php?error=uidexisterror");
         exit();
     }
     //"ss"- FOR 1 STRING -(ONLY EMAIL)
     mysqli_stmt_bind_param($stmt, "s", $email);
     mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

     //FETCH DATA  .IF SAME EMAIL IS AVAILABLE RETURN ALL DETAILS(ROW) 
   if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result=false;
        return $result;
     }

    mysqli_stmt_close($stmt);
 }

// //INSERT NEW CUSTOMER/USER DATA
 function createUser($conn, $name, $email, $address,  $contact, $password){

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO customer (customer_name, customer_email, customer_address, customer_contactnum,  customer_password) VALUES ('$name', '$email', '$address', '$contact','$hashedPwd');";

    //PREPARED STATEMENT
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        // 19-6 sign up page does not work
        header("location: ../ui/signup.php?error=stmtfailed");
        exit();
    }

    if(mysqli_query($conn, $sql)) {   
        
        echo 'success';
    }
    else {
        echo  $conn->error;
    }

   
    // mysqli_stmt_execute($stmt, $sql);
    mysqli_stmt_close($stmt);
    // 19-6 sign up page does nit work
    header("location: ../ui/login.php?error=none");
    exit();
}


function loginUser($conn, $email, $password){
    $uidExists = uidExists($conn, $email);
   
   
   if($uidExists === false){
    //    19-6 sign up page does nit work
       header("location: ../ui/login.php?error=uiddoesnotexist");
        
      
        exit();
   }

    $pwdHashed = $uidExists["customer_password"];

    $checkPwd = password_verify($password, $pwdHashed);

    if($checkPwd === false){
        // 19-6 sign up page does nit work
        header("location: ../ui/login.php?error=wrongpassword");
        exit(); 
        // echo $pwdHashed;
    }
   else if($checkPwd === true){
        session_start();
        $_SESSION["customer_id"]= $uidExists["customer_id"];
        $_SESSION["customer_name"]= $uidExists["customer_name"];
        $_SESSION["customer_email"]= $uidExists["customer_email"];

    // 19-6 sign up page does nit work
       header("location: ../ui/index2.php");
        
        exit();
   }
 
}

function getData(){
    // require_once('./dbh.inc.php');
    $serverName="localhost";
    $dBUserName="root";
    $dBPassword="";
    $dBName="amba_db"; 

  //  $conn = mysqli_connect("localhost","root","","dipol_db");
     $conn = mysqli_connect($serverName,$dBUserName,$dBPassword,$dBName);

    $sql = "SELECT * FROM foodmenu;";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result)>0){
        return $result;
    }

}



function addFeedback($conn, $name,$email,$type, $comment){

    $sql = "INSERT INTO feedback (name, email, subject, message) VALUES ('$name', '$email','$type','$comment')";
    $sql_run = mysqli_query($conn, $sql);

    if($sql_run){
        header("location: ../feedback.php?success"); 
    }else{
        header("location: ../index2.php?error=submitfail"); 
        // echo  $conn->error;
    }

}



function sendBill($conn,$orderId,$customerId){

    $sqlOrder = "SELECT * FROM orders WHERE order_id = $orderId;";
    $resultOrder = mysqli_query($conn, $sqlOrder);
    $rowOrder = mysqli_fetch_array($resultOrder);
    $total= $rowOrder['total'];
    $phone= $rowOrder['phone'];
    // $address= $rowOrder['address1'].", ".$rowOrder['address2'].", ".$rowOrder['address3'].", ".$rowOrder['address4'];
    $date= $rowOrder['order_date'];

    $sqlCustomer = "SELECT * FROM customer WHERE customer_id = $customerId;";
    $resultCustomer = mysqli_query($conn, $sqlCustomer);
    $rowCustomer = mysqli_fetch_array($resultCustomer);
    $customerName= $rowCustomer['customer_name'];
    $email= $rowCustomer['customer_email'];

    $sqlEmail ="SELECT * 
    FROM orderdetails 
    INNER JOIN foodmenu ON orderdetails.food_id  =foodmenu.food_id
    WHERE order_id= $orderId ;";

    $query =mysqli_query($conn, $sqlEmail);

    $subject ="Order Details";
    while ($item = mysqli_fetch_array($query)) {
        $body = "Hello ".$customerName. "! <br><br>
        <b>Order Details of Order No:".$orderId."</b><br>
        ".$item['food_name']." (". $item['food_portion'].") - ".$item['order_quantity'] ."<br>  
        <hr>
        Grand Total(Rs.): ".  $total.".00<br><br>
        Ordered Date and Time: ".  $date."<br>
       
        Mobile Number: ".  $phone."<br><br>
        Thank you for shopping with Dip Products.";
    }

    sendBillEmail($email, $body, $subject);
    header("Location:../order.php?orderPlaced");
    exit();  
}

function sendBillEmail($email, $body, $subject){
    
    require '../ui/vendor/autoload.php';

    include('../ui/smtp/PHPMailerAutoload.php');
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com'; 
        $mail->Port       = 587;                      // Set the SMTP server to send through
        $mail->SMTPSecure = 'tls';  
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'ambasewana@gmail.com';                     // SMTP username
        $mail->Password   = 'ambasewana@123';                               // SMTP password

        //Recipients
        $mail->setFrom('ambasewana@gmail.com');
        $mail->addAddress($email);     // Add a recipient
        //$mail->addAddress('ellen@example.com');               // Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        $mail->addBCC('ambasewana@gmail.com');

        // Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'logo.jpg');    // Optional name
        
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $body;
        $mail->AltBody = strip_tags($body);

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}






//insert new customer

/*
$query ="INSERT INTO  customer(customer_name, customer_email, customer_address, customer_contactnum,customer_password)";
    $query .="VALUES ('$name, $email, $address, $contact, $password')";


    $result=mysqli_query($conn, $query);

    if(!$result){
        die('query failed');
    }
*/
    
/*
    //ENCRYPTING PASSWORD
    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssss", $name, $email, $ $contactnum, $address, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    
    //SENDS THE USER TO LOGIN PAGE AFTER SUCCESSFUL SIGNUP
    header("location: ../login.php?error=none");
    exit();
}
*/

/*
function emptyInputLogin($username, $pwd){
    $result;
if(empty($username) || empty($pwd)){
    $result=true;
}
else{
    $result=false;
}
    return $result;
}

function loginUser($conn, $username, $pwd){
    $uidExists = uidExists($conn, $username, $username);

    if($uidExists === false){
        header("location: ../ui/login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if($checkPwd === false){
        header("location: ../ui/login.php?error=wronglogin");
        exit();
    }
    else if($checkPwd === true){
        session_start();
        $_SESSION["userid"]= $uidExists["usersId"];
        $_SESSION["useruid"]= $uidExists["usersUid"];
        header("location: ../ui/dashboard.php");
        exit();
    }
}

function addCategory($conn, $categoryImage, $categoryName, $categoryDescription){

    $sql = "INSERT INTO `categories` (`categoriesImage`, `categoriesName`, `categoriesDescription`) VALUES ('$categoryImage', '$categoryName', '$categoryDescription')";
    $sql_run = mysqli_query($conn, $sql);

    if($sql_run){
        header("Location: ../ui/categories.php?error=none");
    }else{
        header("Location: ../ui/categories.php?error=addfailed");
    }

}

function emptyInputCategory($categoryImage, $categoryName, $categoryDescription){
    $result;
if(empty($categoryImage) || empty($categoryName) || empty($categoryDescription)){
    $result=true;
}
else{
    $result=false;
}
    return $result;
}

function categoryExists($conn, $categoryName){
    $sql = "SELECT * FROM categories WHERE categoriesName = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../ui/categories.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $categoryName);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result=false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function categoryImageSize($fileSize){
    $result;
if($fileSize > 5242880){
    $result=true;
}
else{
    $result=false;
}

    return $result;
}

*/