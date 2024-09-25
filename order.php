<!DOCTYPE html>
<html lang="pl">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kawa pod Stołem</title>
    <link rel="stylesheet" href="menu&footer.css">
    <link rel="stylesheet" href="products.css">
    <link rel="stylesheet" href="order.css">
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
       <!-- Order Details-->
       <section id="order-details" class="order-container">
        <h2 class="order-title">Zamówienie</h2>
        <div class="cart-content">
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
        <div class='order-cart-box'>
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
        </div>
         <!--Total -->
        <div class="total">
            <div class="total-title">Suma</div>
            <div class="total-price">0zł</div>
        </div>
       <button type="button" id="next-button" class="btn">Dalej</button>
       <script>
          document.addEventListener("DOMContentLoaded", function() {
          updatetotalorder();
           });
        </script>
      </section>
      <!-- Dane Osobowe -->
      <section id="personal-details" style="display: none;">
        <div class="personal-container">
          <h2 class="personal-title">Wpisz swoje dane osobowe</h2>
          <form method ="POST" action="add_client_to_database.php">
            <div class="form-container">
              <div class="form-group">
                <h3>Twoje dane:</h3>
                <label for="name">Imię:</label>
                <input type="text" id="name" name="name" required>
                <br>
                <label for="surname">Nazwisko:</label>
                <input type="text" id="surname" name="surname" required>
                <br>
                <label for="phone">Telefon:</label>
                <input type="tel" id="phone" name="phone" required placeholder="np. +48123123123" pattern="^\+?[0-9]{0,3}\d{9}$">
                <br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <br>
              </div>
              <div class="form-group">
                <h3>Adres wysyłki:</h3>
                <label for="city">Miasto:</label>
                <input type="text" id="city" name="city" required>
                <br>
                <label for="street">Ulica:</label>
                <input type="text" id="street" name="street" required pattern="^[A-Za-z.ąśżźóćłęń ]+$" placeholder="np. H.Sienkiewicza">
                <br>
                <label for="postal-code">Kod pocztowy:</label>
                <input type="text" id="postal-code" name="postal-code" required placeholder="np. 05-800" pattern="^[0-9]{2}-[0-9]{3}$">
                <br>
                <label for="house-number">Numer domu:</label>
                <input type="text" id="house-number" name="house-number" required pattern="^[0-9]+[A-Za-z]*$">
                <br>
                <label for="apartment-number">Numer mieszkania:</label>
                <input type="text" id="apartment-number" name="apartment-number">
                <br>
              </div>
            </div>
            <div class="button-container">
            <button type="button" id="back-button" class="btn">Wstecz</button>
              <input type="submit" value="Zatwierdź" id="end-button" class="btn">
            </div>
          </form>
        </div>
      </section>
      <footer>
        <div class="footer-info">
          <h3>Informacje</h3>
          <ul>
            <li>Kawa Pod Stołem</li>
            <li>Nip: 123456789</li>
            <li>05-800 Pruszków</li>
            <li>ul. Sienkiewicza 19</li>
          </ul>
        </div>
        <div class="footer-deliver">
          <h3>Dostawa i Płatność</h3>
          <ul>
            <li>Dostawa</li>
            <li>Zwroty</li>
            <li>Regulamin</li>
          </ul>
        </div>
        <div class="footer-kontakt">
          <h3>Kontakt</h3>
          <ul>
            <li>Tel: 123 123 123</li>
            <li>Od poniedziałku do piątku</li>
            <li>od 8:00 do 16:00</li>
            <li>Email: quera222@gmail.com</li>
          </ul>
        </div>
        <div class="footer-autor">
          <h3>O stronie</h3>
          <ul>
          <li style="color:red;">*Strona stworzona na potrzeby projektu na studia.</li>
            <li> Numer albumu: s217250</li>
            <li> Uczelnia: SGGW </li>
            <li>Autor: Aleksandra Noga</li>
          </ul>
        </div>
      </footer>
    <script src="main.js"></script> 
    <script src="order.js"></script>
</body>
</html>