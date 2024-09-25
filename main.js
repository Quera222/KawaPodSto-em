let search = document.querySelector(".search-box");

document.querySelector("#search-icon").onclick = () => {
  search.classList.toggle("active");
};

let nav = document.querySelector('.nav');

document.querySelector('#menu-icon').onclick = () =>{
  nav.classList.toggle('active');
  search.classList.remove('active');
}

window.onscroll = () => {
  nav.classList.remove('active');
  search.classList.remove('active');
}

// Cart

let cartIcon = document.querySelector("#cart-icon");
let cart = document.querySelector(".cart");
let closeCart = document.querySelector("#close-cart");

//Open Cart
cartIcon.onclick = () => {
 cart.classList.add("active");
};

//Close Cart
closeCart.onclick = () => {
 cart.classList.remove("active");
};

// Cart Working JS
if(document.readyState == "loading") {
document.addEventListener("DOMContentLoaded", ready);
} else {
  ready();
}

// Making Function
function ready(){
  
//Remove Items From Cart
var removeCartButtons = document.getElementsByClassName("cart-remove");
console.log(removeCartButtons);

for (var i = 0; i < removeCartButtons.length; i++){
var button = removeCartButtons[i];
button.addEventListener("click", removeCartItem);
}

//Quantity Changes
var quantityInputs = document.getElementsByClassName("cart-quantity");
for(var i = 0; i < quantityInputs.length; i++){
    var input = quantityInputs[i];
    input.addEventListener("change", quantityChanged);
  }

//Add To Cart

var addCart = document.getElementsByClassName('add-cart');
for(var i = 0; i < addCart.length; i++){
   var button = addCart[i];
   button.addEventListener("click", addCartClicked);
   }

}

function removeCartItem(event){
  var buttonClicked = event.target;
  buttonClicked.parentElement.remove();
  var title = buttonClicked.getAttribute('data-title');
  // AJAX
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "remove_to_cart.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
          console.log(xhr.responseText);
      }
    };

    xhr.send("product_title=" + encodeURIComponent(title));

 //Koniec AJAX

  updatetotalorder();
  updatetotal();
  UpdateCartCount()
  var orderContainer = document.getElementsByClassName("order-container")[0];
  if(orderContainer){
    window.location.reload();
  }
}

//Quantity Changes
function quantityChanged(event){
  var input = event.target;
  if(isNaN(input.value) || input.value <= 0){
	input.value = 1;
  }
// AJAX

    var cartDetail = input.parentElement;
    var title = cartDetail.querySelector(".cart-product-title").innerText;
    var quantity = input.value;

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "update_quantity.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            console.log(xhr.responseText);
        }
    };

    xhr.send("product_title=" + encodeURIComponent(title) + "&product_quantity=" + encodeURIComponent(quantity));

//Koniec AJAX
  updatetotalorder();
  updatetotal();
  UpdateCartCount();
  var orderContainer = document.getElementsByClassName("order-container")[0];
  if(orderContainer){
    window.location.reload();
  }
}

//Add to cart

function addCartClicked(event){
 var button = event.target;
 if (document.getElementById('index-page')) {
  shopProducts = button.parentElement.parentElement;
} else {
  shopProducts = button.parentElement;
}
 var title = shopProducts.querySelector(".product-title").innerText;
 var price = shopProducts.querySelector(".price").innerText;
 var productImg = shopProducts.querySelector(".product-img").src;
 var idProduct = button.getAttribute('data-id'); 


 console.log(title, price, productImg);
 addProductToCart(title, price, productImg,idProduct);
 updatetotalorder();
 updatetotal();
 UpdateCartCount();
}

function addProductToCart(title, price, productImg, idProduct){
 var cartShopBox = document.createElement("div");
 cartShopBox.classList.add("cart-box");
 var cartItems = document.getElementsByClassName('cart-content')[0];
 var cartItemsNames = cartItems.getElementsByClassName('cart-product-title');
 for(var i = 0; i < cartItemsNames.length; i++){

    if(cartItemsNames[i].innerText==title){
        alert("Dodałeś już ten produkt do koszyka");
        return;
    }
  }

// AJAX - Add product to cart. 
// Przejęcie danych po kliknięciu przycisku "dodaj do koszyka" i przekazanie do php
var productImgFileName = getFileNameFromUrl(productImg);

var xhr = new XMLHttpRequest();
xhr.open("POST", "add_to_cart.php", true);
xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
xhr.onreadystatechange = function () {
  if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
      console.log(xhr.responseText);
  }
};
console.log(idProduct);
xhr.send("product_title=" + encodeURIComponent(title) + "&product_price=" + encodeURIComponent(price) + "&product_img=" + encodeURIComponent(productImgFileName) +"&product_id=" + encodeURIComponent(idProduct));

// Koniec AJAX

  cartBoxContent = 
  `<img src="${productImg}" alt="" class="cart-img">
  <div class="detail-box">
    <div class="cart-product-title">${title}</div>
    <div class="cart-price">${price}</div>
    <input type="number" value="1" class="cart-quantity">
  </div>
  <i class='bx bxs-trash-alt cart-remove' data-title='${title}'></i>`
  
  cartShopBox.innerHTML = cartBoxContent;
  cartItems.append(cartShopBox);
  cartShopBox.getElementsByClassName('cart-remove')[0].addEventListener("click", removeCartItem);
  cartShopBox.getElementsByClassName('cart-quantity')[0].addEventListener("change", quantityChanged);
}



//Update Total

function updatetotal(){
 var cartContent = document.getElementsByClassName("cart-content")[0];
 var cartBoxes = cartContent.getElementsByClassName("cart-box");
 var total = 0;

for(var i = 0; i < cartBoxes.length; i++) {
 var cartBox = cartBoxes[i];
 var priceElement = cartBox.getElementsByClassName("cart-price")[0];
 var quantityElement = cartBox.getElementsByClassName("cart-quantity")[0];
 var price = parseFloat(priceElement.innerText.replace("zł", ""));
 var quantity = quantityElement.value;
 total = total + (price * quantity);
}
//If price contain some cents value
 total = Math.round(total*100)/100;


 document.getElementsByClassName('total-price')[0].innerText =  total + "zł";
}


function UpdateCartCount(){
    var cartContent = document.getElementsByClassName("cart-content")[0];
    var cartBoxes = cartContent.getElementsByClassName("cart-box");
    var total = 0;
    for(i = 0; i < cartBoxes.length ; i++){
        var cartBox = cartBoxes[i];
        var quantityElement = cartBox.getElementsByClassName("cart-quantity")[0];
        var quantity = parseInt(quantityElement.value);
        total = total + quantity
    }
    var cartCount = document.querySelector(".cart-count");
    cartCount.innerText = total;

    if(total > 0){
        cartCount.style.display = "block";
    } else{
        cartCount.style.display = "none";
    }
}


function getFileNameFromUrl(url) {
  // Pobieranie ostatniej części ścieżki URL (po ostatnim '/')
  var parts = url.split('/');
  var fileName = parts[parts.length - 1];
  return fileName;
}

function updatetotalorder(){
  var orderContainer = document.getElementsByClassName("order-container")[0];
  if (!orderContainer) {
    return;
}
  var cartContent = orderContainer.getElementsByClassName("cart-content")[0];
  var cartBoxes = cartContent.getElementsByClassName("order-cart-box");
  var total = 0;
 
 for(var i = 0; i < cartBoxes.length; i++) {
  var cartBox = cartBoxes[i];
  var priceElement = cartBox.getElementsByClassName("cart-price")[0];
  var quantityElement = cartBox.getElementsByClassName("cart-quantity")[0];
  var price = parseFloat(priceElement.innerText.replace("zł", ""));
  var quantity = quantityElement.value;
  total = total + (price * quantity);
 }
 //If price contain some cents value
  total = Math.round(total*100)/100;
  orderContainer.getElementsByClassName('total-price')[0].innerText =  total + "zł";
 }