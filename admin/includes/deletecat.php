<?php

        $id = $_GET['delete'];

         echo $id;
         require_once 'dbh.inc.php';
       // require_once 'functions.inc.php';

        $sql = "DELETE FROM category WHERE category_id =$id";
        $sql_run = mysqli_query($conn, $sql);
    
        if ($conn->query($sql) === TRUE) {
            header("Location: ../dashboard/category.php?itemdeleted");
          } else {
           header("Location: ../dashboard/category.php?error=deletefailed");
            // echo  $conn->error;
          }
          
          $conn->close();