<?php 
include('connect.php');

$select_query = "Select * from koszyk";
$result_query = mysqli_query($con, $select_query);

while($row=mysqli_fetch_assoc($result_query)){
  $title = $row['nazwa'];
  $price = $row['cena'];
  $productImg = $row['img'];
  $quantity = $row['ilosc'];
  echo "
  <div class='cart-box'>
  <img src='Img/${productImg}' alt='' class='cart-img'>
  <div class='detail-box'>
    <div class='cart-product-title'>${title}</div>
    <div class='cart-price'>${price}zł</div>
    <input type='number' value='${quantity}' class='cart-quantity'>
  </div>
  <i class='bx bxs-trash-alt cart-remove' data-title='${title}'></i>
  </div>";
}

?>