<?php
include('connect.php');

if (isset($_POST['product_title']) && isset($_POST['product_price']) && isset($_POST['product_img'])) {
    $product_title = $_POST['product_title'];
    $product_price = $_POST['product_price'];
    $product_img = $_POST['product_img'];
    $product_id = $_POST['product_id'];
    $product_quantity = 1;

    $query = "INSERT INTO koszyk (id_produktu,nazwa, cena, img, ilosc) VALUES ('$product_id','$product_title', '$product_price', '$product_img', '$product_quantity')";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "Produkt został dodany do koszyka.";
    } else {
        echo "Błąd: " . mysqli_error($con);
    }
}
?>




