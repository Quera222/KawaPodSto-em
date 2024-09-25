<?php
include('connect.php');

if (isset($_POST['product_title'])) {
    $product_title = $_POST['product_title'];
    
    $query = ("DELETE FROM koszyk WHERE nazwa='$product_title'");
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "Produkt został usunięty z koszyka.";
    } else {
        echo "Błąd: " . mysqli_error($con);
    }
}
?>




