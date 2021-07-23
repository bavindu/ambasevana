<?php
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(isset($_POST['submit'])){
      
        $expensename = $_POST['expense_name'];
        // $lastName= $_POST['lastName'];
        $expensetype = $_POST['expense_type'];
        $nic = $_POST['employee_nic'];
        // $landNum = $_POST['landNum'];
        $expensevalue = $_POST['expense_value'];
        // $address = $_POST['address1']. ", ".$_POST['address2'] .", ".  $_POST['address3'] .", ". $_POST['address4'] ;
        // $address1 = $_POST['employee_address'];
        // $address2 = $_POST['address2'];
        // $address3 = $_POST['address3'];
        // $address4 = $_POST['address4'];
        // $email = $_POST['employee_email'];
        // $salary = $_POST['employee_salary'];
        
    
        // addEmployee($conn, $firstName, $lastName, $jobRole, $nic, $landNum, $mobileNum, $address, $email );
        addExpense($conn,  $expensename, $expensetype,$expensevalue );
    
    }else{
        header("Location: ../dashboard/expense.php");
    }