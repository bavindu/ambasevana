<?php
    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if(isset($_POST['submit'])){
       
        $productName = $_POST['food_name'];
        $categoryName= $_POST['category_name'];
        $productSize = $_POST['food_portion']. " " . $_POST['unit'] ;
        $productPrice = $_POST['food_price'] . ".00";
        $productQty = $_POST['food_quantity'];
        $productDiscount = $_POST['food_discount'];
        $productDiscountPrice = $_POST['food_discountedprice'];
        $productDescription = $_POST['food_description'];
        $productImg = addslashes(file_get_contents($_FILES['food_image']['tmp_name']));  

        // $productDiscountPrice=$productPrice*(1+  $productDiscount/100);


      

      //  echo $categoryImage;
        
    
        // if(emptyInputCategory($categoryImage, $categoryName, $categoryDescription) !== false){
        //     header("location: ../ui/categories.php?error=emptyinput");
        //     exit();
        //   }
        // if(categoryExists($conn, $categoryName) !== false){
        //     header("location: ../ui/categories.php?error=categoryexists");
        //     exit();
        // }
    
        addProduct($conn, $productName,$categoryName,$productSize, $productPrice, $productDiscount, $productQty, $productImg, $productDescription, $productDiscountPrice);
    
    }else{
        header("Location: ../dashbaord/foodmenu.php");

    }