<?php
include('connect.php');

if (isset($_POST['product_title'])) {
    $product_title = $_POST['product_title'];
    $product_quantity = $_POST['product_quantity'];
    
    $query = "UPDATE koszyk SET ilosc = '$product_quantity' WHERE nazwa = '$product_title'";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "Zaktualizowano";
    } else {
        echo "Błąd: " . mysqli_error($con);
    }
}
?>




