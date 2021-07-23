<?php

    if(isset($_POST['update'])){
      require_once 'dbh.inc.php';
      require_once 'functions.inc.php';

      
      $productName = $_POST['food_name'];
      $categoryName= $_POST['category_name'];
      $productPrice = $_POST['food_price'];
      $productQty = $_POST['food_quantity'];
      $productDiscount = $_POST['food_discount'];
      $productDescription = $_POST['food_description'];
      $productImg = addslashes(file_get_contents($_FILES['food_image']['tmp_name']));  
      $productId = $_POST['food_id'];
      
      if($productImg == NULL){
        $sql = "UPDATE foodmenu
        SET food_name='$productName',category_name='$categoryName',food_price ='$productPrice', food_quantity ='$productQty', food_discount ='$productDiscount' ,food_description='$productDescription'
        WHERE food_id =$productId ";
      }
      else {
        $sql = "UPDATE foodmenu 
        SET food_name=' $productName', category_name='$categoryName',food_price ='$productPrice', food_quantity ='$productQty', food_discount ='$productDiscount', food_image ='$productImg' ,food_description='$productDescription'
        WHERE food_id =$productId ";

      }

      $sql_run = mysqli_query($conn, $sql);

      if ($sql_run){
        header("Location: ../dashboard/foodmenu.php?error=none");
      }else {
        header("Location: ../dashboard/foodmenu.php?error=noneupdatefail");
      }

  }
  else{
      header("Location: ../dashboard/foodmenu.php");
  }