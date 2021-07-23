<?php

    if(isset($_POST['update'])){
      require_once 'dbh.inc.php';
      require_once 'functions.inc.php';

      
      $categoryName = $_POST['category_name'];
      $categoryImage = addslashes(file_get_contents($_FILES['category_image']['tmp_name']));
      $categoryId = $_POST['category_id'];
      
      if($categoryImage == NULL){
        // $image= addslashes(file_get_contents($_FILES['categoryImg']['tmp_name']));
        $sql = "UPDATE category
        SET category_name='$categoryName'
        WHERE category_id =$categoryId ";
      }
      else {
        // $image= addslashes(file_get_contents($_FILES['categoryImage']['tmp_name'])); 
        $sql = "UPDATE category 
        SET category_name='$categoryName', category_image ='$categoryImage'  
        WHERE category_id =$categoryId ";

      }

      // $sql = "UPDATE categories 
      //         SET categoryName=' $categoryName', categoryImg ='$image'  
      //         WHERE categoryId =$categoryId ";

      $sql_run = mysqli_query($conn, $sql);

      if ($sql_run){
        header("Location: ../dashboard/category.php?error=none");
      }else {
        header("Location: ../dashboard/category.php?error=noneupdatefail");
        //  echo  $conn->error;
      }

    

  }
  else{
      header("Location: ../dashboard/category.php");
  }





        // if(isset($_GET['id'])){
        //   require_once 'dbh.inc.php';
        //   require_once 'functions.inc.php';

        //   $categoryName = $_GET['categoryName'];
        //   $categoryImage = addslashes(file_get_contents($_FILES['categoryImage']['tmp_name'])); 

        //   $sql = "SELECT * FROM categories WHERE categoryId =$id";
        //   $sql_run = mysqli_query($conn, $sql);

        //   if(mysqli_num_rows($sql_run)>0){
        //     $row = mysqli_fetch_assoc($sql_run);
        //   }else {
        //     header("Location: ../dashboard/categories.php");
        //   }

        // }