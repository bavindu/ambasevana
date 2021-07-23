<?php

    // $checkPassword = $_POST['checkPassword'];
    // $checkPassword = $_POST['checkPassword'];

function uidExists($conn, $email){
    $sql = "SELECT * FROM user WHERE user_email = ?;";
    $stmt = mysqli_stmt_init($conn);
    
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../signup.php?error=stmtfailed");
            exit();
        }
    
        mysqli_stmt_bind_param($stmt, "s", $email);
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

    
function createAdmin($conn, $userName, $email, $password){
    
    // encrypting the password
    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO user ( user_name, user_email, user_password) VALUES ('$userName', '$email','$hashedPwd')";

    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){ 
        header("location: ../signup.php?error=stmtfailed"); 
            exit();
    }
    if(mysqli_query($conn, $sql)) {  
        echo 'success';
    }
    else {
        echo  $conn->error;
    }

    mysqli_stmt_execute($stmt, $sql);
    mysqli_stmt_close($stmt);
    
    header("location: ../login.php?error=none");
    exit();
}




function loginAdmin($conn, $email, $pw){

    $uidExists = uidExists($conn, $email);

    if($uidExists === false){
       header("location: ../login.php?error=wronglogin");
        //echo  $conn->error;
        exit();
    }

    $pwdHashed = $uidExists["user_password"];
    $checkPwd = password_verify($pw, $pwdHashed);
    $checkPwd = true;

    if($checkPwd === false){
        // var_dump($email);
        header("location: ../login.php?error=wronglogin");
        exit(); 
    }
    else if($checkPwd === true){
        echo "first one";
        session_start();
        $_SESSION["user_id"]= $uidExists["user_id"];
        $_SESSION["user_email"]= $uidExists["user_email"];
        $_SESSION["user_name"]= $uidExists["user_name"];
        header("location: ../dashboard/index.php");
        exit();
    }
    else if($pwdHashed == $pw){
        echo "true";
        session_start();
        $_SESSION["user_id"]= $uidExists["user_id"];
        $_SESSION["user_email"]= $uidExists["user_email"];
        $_SESSION["user_name"]= $uidExists["user_name"];
        header("location: ../dashboard/index.php");
        exit();
    }
}

function addCategory($conn, $categoryName, $categoryImage){

    $sql = "INSERT INTO category(category_name,category_image) VALUES ('$categoryName','$categoryImage')";
    $sql_run = mysqli_query($conn, $sql);

    if($sql_run){
        echo"connected";
        header("Location: ../dashboard/category.php?error=none");
        
    }else{
        header("Location: ../dashboard/category.php?error=addfailed");
        //echo  $conn->error;
    }

}

function addProduct($conn, $productName,$categoryName,$productSize, $productPrice,  $productDiscount, $productQty, $productImg, $productDescription, $productDiscountPrice){
    
    // $productDiscountPrice=$productPrice*(1+  $productDiscount/100);


    $sql = "INSERT INTO foodmenu (food_name, category_name, food_portion, food_price,food_discountedprice,food_quantity,food_image,food_description, food_discount,) VALUES ('$productName', '$categoryName', '$productSize','$productPrice','$productDiscount',' $productQty','$productImg',' $productDescription','$productDiscountPrice')";
    $sql_run = mysqli_query($conn, $sql);

    if($sql_run){
        
        header("Location: ../dashboard/foodmenu.php?error=none");
       // echo $productSize;
    }else{
        header("Location: ../dashboard/foodmenu.php?error=addfailed");
        // echo  $conn->error;
    }

}
function deleteCategory($conn,$categoryName){

    $sql = "DELETE FROM category (category_name,category_image) WHERE category_name='$categoryName'";
    $sql_run = mysqli_query($conn, $sql);

    if($sql_run){
       header("Location: ../dashboard/category.php?error=none");
    }else{
       header("Location: ../dashboard/category.php?error=deletefailed");
        //echo  $conn->error;
    }
}



function addEmployee($conn, $firstName,$jobRole, $nic, $mobileNum, $address1,$email, $salary ){

    $sql = "INSERT INTO employee (employee_name, employee_role, employee_nic, employee_contactnum, employee_address,employee_email,employee_salary) VALUES ('$firstName','$jobRole','$nic','$mobileNum','$address1','$email','$salary')";
    $sql_run = mysqli_query($conn, $sql);

    if($sql_run){
        header("Location: ../dashboard/employee.php?error=none");
       // echo $productSize;
    }else{
        // header("Location: ../dashboard/employee.php?error=addfailed");
        echo  $conn->error;
    }

}

function addExpense($conn,  $expensename, $expensetype,$expensevalue ){

    $sql = "INSERT INTO expense (expense_name, expense_type, expense_value) VALUES ('$expensename','$expensetype','$expensevalue')";
    $sql_run = mysqli_query($conn, $sql);

    if($sql_run){
        header("Location: ../dashboard/expense.php?error=none");
       // echo $productSize;
    }else{
        // header("Location: ../dashboard/employee.php?error=addfailed");
        echo  $conn->error;
    }

}