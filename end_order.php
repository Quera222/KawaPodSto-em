
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kawa pod Stołem</title>
    <link rel="stylesheet" href="menu&footer.css">
    <link rel="stylesheet" href="products.css">
    <link rel="stylesheet" href="end_order.css">
        <!-- Box Icons -->
        <link
        rel="stylesheet"
        href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      />
      <link rel="icon" href="Img/domena.jpg">
</head>
<body>
    <header>
            <!--LOGO -->
            <div class="logo-container">
            <i class='bx bxs-coffee-alt' ></i>
            <p class="p-logo1">Kawa</p>
            <p class="p-logo2">Pod Stołem</p>
            <!-- <a href="#" class="logo"> <img src="logo.png" /></a>  -->
            </div>
            <!--Menu Icon-->
            <i class="bx bx-menu" id="menu-icon"></i>
            <!--Nawigacja-Linki-->
            <ul class="nav">
            <li><a href="index.php">Strona Główna</a></li>
            <li><a href="products.php">Produkty</a></li>
            <li><a href="about.php">O nas</a></li>
            <li><a href="contact.php">Kontakt</a></li>
            </ul>
            <!--Icon-->
            <div class="header-icon">
            <i class="bx bx-search bx-icons" id="search-icon"></i>
            <i class="bx bxs-user-account bx-icons"></i>
            <div id="cart-icon">
                <i class="bx bx-cart bx-icons" id="cart-icon-with-count"></i>
                <span class="cart-count"></span>
            </div>
            <!-- Cart -->
            <div class="cart">
                <h2 class="cart-title">Twój koszyk</h2>
                <div class="cart-content">
                <?php 
                include('create_cart.php');
                ?>
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                    updatetotal();
                    UpdateCartCount();
                    });
                </script>
                </div>
                <!--Total -->
                <div class="total">
                <div class="total-title">Suma</div>
                <div class="total-price">0zł</div>
                </div>
                <!--Buy Buttom-->
                <a href="order.php">
                <button type="button" class="btn-buy">Kup Teraz</button>
                </a>
                <!--Cart Close-->
                <i class='bx bx-x' id="close-cart"></i>
            
            </div>
            
            </div>
            <!--Search Box-->
            <div class="search-box">
            <input type="search" name="" id="" placeholder="Wyszukaj tutaj...">
            </div>
    </header>
<div id="container">
    <section id="end-order-container">
        <h2>Dziękujemy za złożenie zamówienia!</h2>
        <p>Poniżej szczegóły Twojego zamówienia:</p> 
        <p><strong>Numer zamówienia:</strong><?php echo"{$_SESSION["id_zamowienia"]}";?></p>
        <div id="order-personal-details">
            <div> 
                <h3>Twoje Dane:</h3>
                <p><strong>Imię:</strong> <?php echo $_SESSION['name']; ?></p>
                <p><strong>Nazwisko:</strong> <?php echo $_SESSION['surname']; ?></p>
                <p><strong>Telefon:</strong> <?php echo $_SESSION['phone']; ?></p>
                <p><strong>Email:</strong> <?php echo $_SESSION['email']; ?></p>
            </div>
            <div> 
                <h3>Adres Wysyłki:</h3>
                <p><strong>Miasto:</strong> <?php echo $_SESSION['city']; ?></p>
                <p><strong>Ulica:</strong> <?php echo $_SESSION['street']; ?></p>
                <p><strong>Kod pocztowy:</strong> <?php echo $_SESSION['postal_code']; ?></p>
                <p><strong>Numer domu:</strong> <?php echo $_SESSION['house_number']; ?></p>
                <p><strong>Numer mieszkania:</strong> <?php echo $_SESSION['apartment_number']; ?></p>
            </div>
        </div>
        <div>
            <h3>Zamówione produkty:</h3>
            <div>
                    <table>
                    <thead>
                        <tr>
                            <th>Nazwa Produktu</th>
                            <th>Ilość</th>
                            <th>Cena Jednostkowa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $order_id = $_SESSION["id_zamowienia"];
                            $query = "SELECT * FROM `zamowienie_szczegoly` WHERE id_zamowienia = '$order_id'";

                            $total_price = 0;
                            
                            $result = mysqli_query($con, $query);
                            if ($result) {
            
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $product_name = $row['nazwa'];
                                        $product_quantity = $row['ilosc'];
                                        $product_price = $row['cena'];
                                        $product_total = $row['suma'];
                                        $total_price = $total_price + $product_total;
                        
                                        echo "<tr>";
                                        echo "<td>$product_name</td>";
                                        echo "<td>$product_quantity</td>";
                                        echo "<td>$product_price PLN</td>";
                                        echo "</tr>";
                                    }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <p><strong>Suma zamówienia: </strong><?php echo"$total_price";?> PLN</p>
        <h3>Wróć do strony głównej!</h3>
        <a href="index.php"> <button class="btn">Powrót</button> </a>
    </section>
    <section id="section-img">
        <img src="Img/kawa-koniec.png"/>
    </section>
</div>
    <script src="main.js"></script> 
</body>
</html>