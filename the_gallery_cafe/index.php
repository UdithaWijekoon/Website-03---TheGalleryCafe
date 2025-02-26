<?php
include('config.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="guest/css/index.css">
</head>

<style>
  header{
  background-image: url(images/background/1.jpg);
  background-size: cover;
}
/* main-container */
.main-container{
    text-align: center;
    padding: 100px 50px 100px 50px;
    font-size: 40px;
    margin-bottom: 0px;
    margin-top: -15px;
    color: white;
    background-image: url(images/background/3.jpg);
    background-size: cover;
    animation: change 10s infinite ease-in-out;
    
}
@keyframes change{
  0%{
    background-image: url(images/background/1.jpg);
    background-size: cover;
  }
  50%{
    background-image: url(images/background/3.jpg);
    background-size: cover;
  }
  100%{
    background-image: url(images/background/1.jpg);
    background-size: cover;
  }
}
h1{
  color: #ec994b;
  font-family: 'Dancing Script', sans-serif;
  font-weight: 700;
  font-size: 100px;
 }
 .main-container .mt-5 h3{
  margin-bottom: -100px;
  margin-top: 100px;
  font-size : 50px;
 }
 .main-container h2{
    font-family: 'Poppins', sans-serif;
    font-weight: 400;
 }
 .main-container h3{
    font-weight: 100;
    color: #fff;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    font-style: italic;
 }

 .container_sub1{
  background-image: url(images/background/2.jpg);
  background-size: cover;
 }
 .container_sub2{
  background-image: url(images/background/2.jpg);
  background-size: cover;
  display: flex;
  justify-content: right;
  padding: 220px 0px 220px 0px;
 }
 .special {
    color: #ffbd42;
    font-family: 'Dancing Script', sans-serif;
    font-size: 3rem;
    font-weight: 100;
    text-align: center;
 }
 .special a{
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    font-size: 3rem;
    color: #e42424;
    text-decoration: none;
 }
 .special a:hover{
    color: #9b0202;
    text-decoration: underline;
 }
 .box1{
    background-image: url(images/background/1.jpg);
    background-size: cover;
 }
 .box2{
    background-image: url(images/background/1.jpg);
    background-size: cover;
 }
  .pi1{
    background-color: wheat;
    background-image: url(images/hotel/e2.jpg);
  }
  .pi2{
    background-color: wheat;
    background-image: url(images/hotel/e1.jpg);
  }
  .pi3{
    background-color: wheat;
    background-image: url(images/hotel/e3.jpg);
  }

  .mi1{
    background-color: rgb(141, 249, 249);
    background-image: url(images/foods/s2.png);
  }
  .mi2{
    background-color: rgb(141, 249, 249);
    background-image: url(images/foods/s1.jpg);
  }
  .mi3{
    background-color: rgb(141, 249, 249);
    background-image: url(images/foods/s3.jpg);
  }
  .nav-link:hover {
        color: #fff;
    }
    .active {
        color: #fff;
    }
    .nav-button:hover{
        color: #000;
    }
  @media only screen and (max-width: 1300px) {
    .logo{
      display: none;
    }
    .nav-items {
      flex-direction: column;
    }
    .nav-link {
      margin: 10px 0;
    }
    nav {
    position: relative;
    animation: none;
    align-items: right;
    }
    header{
    background-image: url(images/background/1.jpg);
    background-size: cover;
    }
   } 
</style>
<body>

<header>
    <nav>
        <ul class="nav-items">
           <li class="nav-item1"><a href="index.php" class="nav-link">Home</a></li>
           <li class="nav-item2"><a href="guest/menu.php" class="nav-link">Menu</a></li>
           <li class="nav-item3"><a href="guest/about_us.php" class="nav-link">About Us</a></li>
           <li class="nav-item3"><a href="guest/customer_reviews.php" class="nav-link">Reviews</a></li>
           <li class="nav-item4"><a href="guest/reservation.php" class="nav-link">Reservation</a></li>
           <li class="nav-item5"><a href="guest/pre_order.php" class="nav-link">Pre-Order</a></li>
           <li class="nav-item6"><a href="guest/contact_us.php" class="nav-link">Contact Us</a></li>
           <li class="nav-item8"><a href="login/login.php"><button class="nav-link nav-button">        
            <span></span>
            <span></span>
            <span></span>
            <span></span>Login</button></a></li>
        </ul>
        <div class="logo"><a href="index.php"><img src="images/logo.png" alt="logo"></a>The Gallery Cafe</div> 
    </nav>
</header>

<div class="main-container">
    <h2>Welcome</h2>
    <h1>The Gallery Cafe </h1>
    <h3>Discover a Unique Dining Experience With a Blend of Exquisite Cuisine and a Charming Atmosphere.</h3>
</div>

<!-- slider -->
<div class="container_sub1">
  
<div class="container_slider"><h1>Trending Foods</h1>
  <div class="slider-wrapper">
    <button id="prev-slide" class="slide-button material-symbols-rounded"><</button>
    <ul class="image-list">
      <img class="image-item" src="images/foods/s4.png" alt="img-1" />
      <img class="image-item" src="images/foods/s5.png" alt="img-2" />
      <img class="image-item" src="images/foods/s3.jpg" alt="img-3" />
      <img class="image-item" src="images/foods/s6.png" alt="img-4" />
      <img class="image-item" src="images/foods/s7.jpg" alt="img-5" />
      <img class="image-item" src="images/foods/s8.jpg" alt="img-6" />
      <img class="image-item" src="images/foods/s1.jpg" alt="img-7" />
      <img class="image-item" src="images/foods/s2.png" alt="img-8" />
    </ul>
    <button id="next-slide" class="slide-button material-symbols-rounded">></button>
  </div>
  <div class="slider-scrollbar">
    <div class="scrollbar-track">
      <div class="scrollbar-thumb"></div>
    </div>
  </div>
</div>
</div>


   
<div class="box1">   
    <section id="promotion">
          <h2>Promotions and Special Events</h2>
    </section>
  
    <div class="container">
      <div class="card">
          <div class="card__image pi1"></div>
          <div class="card__content p1">
            <p class="card__title">Happy Hour Specials</p>
            <p class="card__text">Attract the after-work crowd with Happy Hour specials on drinks and appetizers. Offer discounted prices on popular cocktails, beers, and small plates. <b>50%</b> off on selected cocktails and beers.</p>
            <a class="card__button" href="guest/promotion.php">See More...</a>
          </div>
      </div>
  
      <div class="card">
          <div class="card__image pi2"></div>
          <div class="card__content p2">
            <p class="card__title">Weekend Brunch Special</p>
            <p class="card__text">Offer a special brunch menu available exclusively on weekends. The menu includes a variety of breakfast and lunch favorites.<b> 10%</b> off for families of four or more.</p>
            <a class="card__button" href="guest/promotion.php">See More...</a>
          </div>
      </div>
  
      <div class="card">
          <div class="card__image pi3"></div>
          <div class="card__content p3">
            <p class="card__title">Gourmet Dinner Experience</p>
            <p class="card__text">We have an exclusive Chef’s Table event where guests can enjoy a multi-course gourmet dinner curated and prepared by the head chef. If you want more detailes, Contact us.</p>
            <a class="card__button" href="guest/promotion.php">See More...</a>
          </div>
      </div>
    </div> 
</div>

<div class="container_sub2">
        <section id="promotion">
            <h2 class="special"><a href="guest/promotion.php">Click Here</a> to See Our Special Events and Promotions</h2>
        </section>
    <div class="card_s2">
        <p class="card_s2-title">Why Choose Us?</p>
        <p class="small-desc">
          At The Gallery Cafe, we take pride in offering an exceptional culinary experience. Our menu is thoughtfully curated by expert chefs who use the finest, locally-sourced ingredients to create dishes that delicious and beautifully presented.</p>
    </div>
</div>
<div class="box2"> 
    <section id="menu">
          <h2>Our Special Foods For You</h2>
    </section>
      
    <div class="container">
          <div class="card">
              <div class="card__image mi1"></div>
              <div class="card__content m1">
                <p class="card__title">Spicy Beef Kottu</p>
                <p class="card__text">A Sri Lankan favorite made with shredded roti bread stir-fried with tender beef strips, onions, bell peppers for <b>$14.99</b> Only.</p>
                <a class="card__button" href="guest/menu.php">See Menu</a>
              </div>
          </div>
      
          <div class="card">
              <div class="card__image mi2"></div>
              <div class="card__content m2">
                <p class="card__title">Thai Fried Rice</p>
                <p class="card__text">Fragrant jasmine rice stir fried with tender chicken pieces, Thai basil leaves, bell peppers, and onions for <b>$12.99</b> Only.</p>
                <a class="card__button" href="guest/menu.php">See Menu</a>
              </div>
          </div>
      
          <div class="card">
              <div class="card__image mi3"></div>
              <div class="card__content m3">
                <p class="card__title">Seafood Pizza</p>
                <p class="card__text">A delicious pizza topped with a blend of mozzarella and feta cheese, adorned with Mediterranean seafood for <b>$16.99</b> Only.</p>
                <a class="card__button" href="guest/menu.php">See Menu</a>
              </div>
          </div>
      </div> 
</div>

<footer>
    <div class="footer-content">
        <div class="footer-section about">
            <h3>The Gallery Cafe</h3>
            <p>The Gallery Cafe offers a unique dining experience with a blend of exquisite cuisine and a charming atmosphere. Join us to enjoy our special meals, events, and promotions.</p>
        </div>
        <div class="footer-section links">
            <h3>Quick Links</h3>
            <ul>
              <li><a href="index.php">Home</a></li>
              <li><a href="guest/menu.php">Menu</a></li>
              <li><a href="guest/about_us.php">About Us</a></li>
              <li><a href="guest/customer_reviews.php">Reviews</a></li>
              <li><a href="guest/promotion.php">Special Events</a></li>
              <li><a href="guest/reservation.php">Reservation</a></li>
              <li><a href="guest/pre_order.php">Pre-Order</a></li>
              <li><a href="guest/contact_us.php">Contact Us</a></li>
              <li><a href="guest/parking_availability.php">Parking</a></li>
              <li><a href="guest/tables.php">Tables</a></li>
            </ul>
        </div>
        <div class="footer-section contact">
            <h3>Contact Us</h3>
            <p>Location: 12/24 D.S.Senanayake Street, Colombo, Sri Lanka</p>
            <p>Phone: +94 11 2345678</p>
            <p>Email: info@thegallerycafe.com</p>
        </div>
      </div>
    <div class="footer-bottom">
        <p>The Gallery Cafe</p>
    </div>
</footer>

<script src="guest/js/index.js"></script> 
<script>
    // Get the current page's URL
    const currentPage = window.location.pathname.split('/').pop();

    // Get all navigation links
    const navLinks = document.querySelectorAll('.nav-link');

    // Loop through each link and add 'active' class to the matching link
    navLinks.forEach(link => {
        const href = link.getAttribute('href').split('/').pop();
        if (href === currentPage) {
            link.classList.add('active');
        }
    });
</script>

</body>
</html>