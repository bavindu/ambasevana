<?php

    if(isset($_POST['update'])){
      require_once 'dbh.inc.php';
      require_once 'functions.inc.php';

      $firstName = $_POST['employee_name'];
    //   $lastName= $_POST['lastName'];
      $jobRole = $_POST['employee_role'];
      $nic = $_POST['employee_nic'];
     // $landNum = $_POST['employee_contactnum'];
      $mobileNum = $_POST['employee_contactnum'];
      $address1 = $_POST['employee_address'];
    //   $address2 = $_POST['address2'];
    //   $address3 = $_POST['address3'];
    //   $address4 = $_POST['address4'];
      $email = $_POST['employee_email'];
      $salary = $_POST['employee_salary'];
      $employeeId = $_POST['employee_id'];
    

      $sql = "UPDATE employee 
              SET employee_name=' $firstName', employee_role ='$jobRole' , employee_nic='$nic' , employee_contactnum ='$mobileNum' , employee_address='$address1',employee_email ='$email'  , employee_salary='$salary'  
              WHERE employee_id =$employeeId ";

      $sql_run = mysqli_query($conn, $sql);

      if ($sql_run){
        header("Location: ../dashboard/employee.php?error=none");
      }else {
        header("Location: ../dashboard/employee.php?error=noneupdatefail");
        
      }

  }
  else{
      header("Location: ../dashboard/employee.php");
  }