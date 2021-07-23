<?php

        $id = $_GET['delete'];

         echo $id;
         require_once 'dbh.inc.php';

        $sql = "DELETE FROM expense WHERE expense_id =$id";
        $sql_run = mysqli_query($conn, $sql);
    
        if ($conn->query($sql) === TRUE) {
            header("Location: ../dashboard/expense.php?employeeDeleted");
          } else {
           header("Location: ../dashboard/expense.php?error=deletefailed");
            // echo  $conn->error;
          }
          
          $conn->close();