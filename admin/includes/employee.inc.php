<?php
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(isset($_POST['submit'])){
      
        $firstName = $_POST['employee_name'];
        // $lastName= $_POST['lastName'];
        $jobRole = $_POST['employee_role'];
        $nic = $_POST['employee_nic'];
        // $landNum = $_POST['landNum'];
        $mobileNum = $_POST['employee_contactnum'];
        // $address = $_POST['address1']. ", ".$_POST['address2'] .", ".  $_POST['address3'] .", ". $_POST['address4'] ;
        $address1 = $_POST['employee_address'];
        // $address2 = $_POST['address2'];
        // $address3 = $_POST['address3'];
        // $address4 = $_POST['address4'];
        $email = $_POST['employee_email'];
        $salary = $_POST['employee_salary'];
        
    
        // addEmployee($conn, $firstName, $lastName, $jobRole, $nic, $landNum, $mobileNum, $address, $email );
        addEmployee($conn, $firstName, $jobRole, $nic, $mobileNum, $address1, $email,$salary );
    
    }else{
        header("Location: ../dashboard/employee.php");
    }