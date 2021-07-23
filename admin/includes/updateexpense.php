<?php

    if(isset($_POST['update'])){
      require_once 'dbh.inc.php';
      require_once 'functions.inc.php';

      $expensename = $_POST['expense_name'];
    //   $lastName= $_POST['lastName'];
    $expensetype = $_POST['expense_type'];
      $expensevalue = $_POST['expense_value'];
     // $landNum = $_POST['expense_contactnum'];
      // $mobileNum = $_POST['expense_contactnum'];
      // $address1 = $_POST['expense_address'];
    //   $address2 = $_POST['address2'];
    //   $address3 = $_POST['address3'];
    //   $address4 = $_POST['address4'];
      // $email = $_POST['expense_email'];
      // $salary = $_POST['expense_salary'];
      $expenseid = $_POST['expense_id'];
    

      $sql = "UPDATE expense
              SET expense_name=' $expensename', expense_type ='$expensetype' , expense_value='$expensevalue' 
              WHERE expense_id =$expenseid ";

      $sql_run = mysqli_query($conn, $sql);

      if ($sql_run){
        header("Location: ../dashboard/expense.php?error=none");
      }else {
        header("Location: ../dashboard/expense.php?error=noneupdatefail");
        
      }

  }
  else{
      header("Location: ../dashboard/expense.php");
  }