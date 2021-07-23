<?php

        $id = $_GET['delete'];

         echo $id;
         require_once 'dbh.inc.php';

        $sql = "DELETE FROM foodmenu WHERE food_id  =$id";
        $sql_run = mysqli_query($conn, $sql);
    
        if ($conn->query($sql) === TRUE) {
            header("Location: ../dashboard/foodmenu.php?itemdeleted");
          } else {
            header("Location: ../dashboard/foodmenu.php?error=deletefailed");
            
          }
          
          $conn->close();