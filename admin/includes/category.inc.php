<?php

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

if(isset($_POST['submit'])){

    $categoryName = $_POST['category_name'];
    $categoryImage = addslashes(file_get_contents($_FILES['category_image']['tmp_name']));  
    //$categoryImage = "";

  //  echo $categoryImage;
    

    // if(emptyInputCategory($categoryImage, $categoryName, $categoryDescription) !== false){
    //     header("location: ../ui/categories.php?error=emptyinput");
    //     exit();
    //   }
    // if(categoryExists($conn, $categoryName) !== false){
    //     header("location: ../ui/categories.php?error=categoryexists");
    //     exit();
    // }

    addCategory($conn, $categoryName, $categoryImage);

}else{
    header("Location: ../dashboard/category.php");
}

if(isset($_GET['delete'])){
  $categoryName = $_GET['category_name'];


  deleteCategory($conn, $categoryName);
}