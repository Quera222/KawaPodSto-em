<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Kawa Pod Stołem</title>
    <link rel="stylesheet" href="menu&footer.css" />
    <link rel="stylesheet" href="about.css"/>
    <link rel="stylesheet" href="products.css" />
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
      <div class="about-container">
            <div class="about-img">
            <img src="img/businesswoman.jpg"/>
            </div>
            <div class="about-text">
              <h2>Kim jesteśmy?</h2>
              <p>Jesteśmy dwiema siostrami, które od wielu lat dzielą marzenie o wspólnym biznesie. <br></p>
              <p>Łączy nas wiele, lecz jedno z zamiłowań jest szczególnie mocno zaakcentowane. To pasja do parzenia i spożywania kawy. Spędziłyśmy wiele godzin na wspólnych rozmowach przy tym napoju, poznałyśmy od podszewki sztukę parzenia coraz to lepszej kawy, stale się w tej dziedzinie doskonaląc. To właśnie jedna z takich wspólnych rozmów stała się dla nas inspiracją do stworzenia wspólnego dzieła. Wszakże może nim być kawiarnia! Nasza pasja, odskocznia od szarej rzeczywistości, może być jednocześnie tym, czym chcemy zajmować się w życiu, prawda?
                Teraz i Państwo mogą poczuć atmosferę wspólnych rozmów przy dobrze zaparzonej kawie. Na dodatek nie wychodząc z domu, gdyż oferujemy możliwość zamówienia kawy przez Internet!
                </p>
            </div>
      </div>
      <div class="form-contact-container">
        <h3 class="title">Masz pytania?</h3>
        <h4>Napisz do nas!</h4>
        <form class="form-contact" action="add_message.php" method="POST"> 
            <input type="text" id="name" name="name" class="contact-inputs" placeholder="Imię"/>
            <input type="email" id="email" name="email" class="contact-inputs"  placeholder="Email">
            <textarea id="message" name="message" class="contact-inputs" placeholder="Wpisz swój tekst"></textarea>
            <button type="submit">Wyślij</button>
          </form>
      </div>
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
</body>
</html>