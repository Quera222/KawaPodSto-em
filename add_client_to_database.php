<?php 
session_start();
include('connect.php');

$_SESSION["name"] = $_POST['name'];
$_SESSION["surname"] = $_POST['surname'];
$_SESSION["phone"] = $_POST['phone'];
$_SESSION["email"] = $_POST['email'];
$_SESSION["city"] = $_POST['city'];
$_SESSION["street"] = isset($_POST['street']) ? $_POST['street'] : NULL;
$_SESSION["postal_code"] = $_POST['postal-code'];
$_SESSION["house_number"] = $_POST['house-number'];
$_SESSION["apartment_number"] = isset($_POST['apartment-number']) ? $_POST['apartment-number'] : NULL;

$query = "INSERT INTO klient (imie, nazwisko, telefon, email, miasto, ulica, kod_pocztowy, numer_d, numer_m)
 VALUES ('{$_SESSION['name']}', '{$_SESSION['surname']}', '{$_SESSION['phone']}', '{$_SESSION['email']}', 
 '{$_SESSION['city']}', '{$_SESSION['street']}', '{$_SESSION['postal_code']}', '{$_SESSION['house_number']}', 
 '{$_SESSION['apartment_number']}')";
$result = mysqli_query($con, $query);

$id_klienta = mysqli_insert_id($con);
$date = date('Y-m-d H:i:s');

$query_insert_to_order_table = "INSERT INTO zamowienie (id_klienta, data) VALUES ('$id_klienta','$date')";
$result_insert_to_order_Table = mysqli_query($con, $query_insert_to_order_table);

$_SESSION["id_zamowienia"] = mysqli_insert_id($con);

$select_query = "Select * from koszyk";
$result_query = mysqli_query($con, $select_query);

while($row=mysqli_fetch_assoc($result_query)){
        $product_title = $row['nazwa'];
        $product_price = $row['cena'];
        $product_quantity = $row['ilosc'];
        $product_id = $row['id_produktu'];
        $suma = $product_price * $product_quantity;

        $insert_order_details_query = "INSERT INTO zamowienie_szczegoly (id_zamowienia, id_produktu, nazwa, cena, ilosc, suma) VALUES ('{$_SESSION["id_zamowienia"]}','$product_id' , '$product_title', '$product_price', '$product_quantity','$suma')";
        $result_order_details_query = mysqli_query($con, $insert_order_details_query);
}


$delete_query = "DELETE FROM koszyk";

if (mysqli_query($con, $delete_query)) {
    include('end_order.php');
} else {
    echo "Błąd podczas usuwania wierszy: " . mysqli_error($con);
}


session_unset();
session_destroy();
?>