<?php
// <small><s class='text-secondary'>$productPrice</s></small>
function displaymenu($productImg, $productName,$productSize,$productPrice, $productId ){
    $element = "
    <div class='col-md-3 col-sm-6 my-3 my-md-0'>
    <form action='index2.php' method='POST'>
      <div class='card shadow' id='topic'>
        <div><img src='data:image;base64,".base64_encode($productImg)."' alt='product image' id='img' class='img-fluid card-img-top' style='height: 300px;'>
        </div>
        <div class='card-body'>
          <h4 class='card-title'>$productName</h4>
          <p class='card-text'><b>$productSize</b></p>
          <h6>Rs.
           
            <span class='price'>$productPrice</span>
          </h6>
          <button type='submit' class='btn btn-danger my-3' name='order' >Add to Cart</button>
          <input type='hidden' name='product_id' value='$productId'>

          
          
        </div>
      </div>
    </form>
  </div>
    ";
    echo $element;

}