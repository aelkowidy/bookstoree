<?php
include 'connect.php';

if(isset($_COOKIE['user_id'])){
    $user_id = $_COOKIE['user_id'];
}else{
    $user_id = '';
    header('location:index.php');
}

$select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
$select_profile->execute([$user_id]);
$fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="shortcut icon" type="image" href="image/logo.jpg">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width", initial-scale="1.0">
    <title>Bookly store</title>



    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!--font awesom cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!--custom css file link-->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

<!--header section starts-->
<header class="header">

        

        
        <div class="header-1">
            <a href="#" class="logo"> <i class="fas fa-book"></i> Bookly </a>
    
            <form action="" class="search-form">
                <input type="search" name="" placeholder="Search Bookly" id="search-box">
                <label for="search-box" class="fas fa-search"></label>
            </form>
    
            <div class="icons">
                <div id="search-btn" class="fas fa-search"></div>
                <a href="likes.php" class="fas fa-heart"></a>
                <a href="cart.php" class="fas fa-shopping-cart"></a>
            </div>
        </div>
    
    <div class="header-2">
        <div class="fas fa-bars"></div>
        <nav class="navbar">
        <ul>
            <li><a href="index.php#home">home</a></li>
            <li><a href="index.php#featured">featured</a></li>
            <li><a href="index.php#arrivals">arrivals</a></li>
            <li><a href="index.php#reviews">reviews</a></li>
            <li><a href="index.php#blogs">blogs</a></li>
            <li><a href="orders..php">orders</a></li>
        </ul>
    </nav>
</div>
       
</header>
<!--header section ends-->
    
    <!--bottom navbar-->
    <nav class="bottom-navbar">
        <a href="index.php#home" class="fas fa-home"></a>
        <a href="index.php#featured" class="fas fa-list"></a>
        <a href="index.php#arrivals" class="fas fa-tags"></a>
        <a href="index.php#reviews" class="fas fa-comments"></a>
        <a href="index.php#blogs" class="fas fa-blog"></a>
        <a href="orders.php" class="fas fa-cart-arrow-down"></a>
    
     </nav>
     <!--bottom navbar ends-->
    
     

    <section class="profile-title">

        <h1 class="heading-3"> <span>Your Profile</span> </h1>
    </section>

    <section class="user-details">

        <div class="user">
            <img src="image/profile.png" alt="">
            <h3>welcome : <span><?= $fetch_profile['name']; ?></span></h3>
            <a href="index.php" class="btn">Login</a>
            <a href="register.php" class="btn">Register</a>
            <a href="logout.php" class="delete-btn" onclick="return confirm('logout from the website?');">logout</a>
        </div>

    </section>

    





































<!--footer section starts-->
<section class="footer">

    <div class="box-container">
        <div class="box">
            <h3>Our location</h3>
            <a href=""> <i class="fas fa-map-marker-alt"> </i> Egypt </a>
            <a href=""> <i class="fas fa-map-marker-alt"> </i> USA </a>
            <a href=""> <i class="fas fa-map-marker-alt"> </i> Russia </a>
            <a href=""> <i class="fas fa-map-marker-alt"> </i> France </a>
            <a href=""> <i class="fas fa-map-marker-alt"> </i> Japan </a>
            <a href=""> <i class="fas fa-map-marker-alt"> </i> Africa </a>

        </div>

        <div class="box">
            <h3>quick links</h3>
            <a href="index.php#home"> <i class="fas fa-arrow-right"> </i> home </a>
            <a href="index.php#featured"> <i class="fas fa-arrow-right"> </i> featured </a>
            <a href="index.php#arrivals"> <i class="fas fa-arrow-right"> </i> arrivals </a>
            <a href="index.php#reviews"> <i class="fas fa-arrow-right"> </i> reviews </a>
            <a href="index.php#blogs"> <i class="fas fa-arrow-right"> </i> blogs </a>
        </div>

        <div class="box">
            <h3>extra links</h3>
            <a href="profile.php"> <i class="fas fa-arrow-right"> </i> account info </a>
            <a href="orders.php"> <i class="fas fa-arrow-right"> </i> ordered items </a>
            <a href=""> <i class="fas fa-arrow-right"> </i> privacy policy </a>
            <a href=""> <i class="fas fa-arrow-right"> </i> payment method </a>
            <a href=""> <i class="fas fa-arrow-right"> </i> our services </a>
        </div>

        <div class="box">
            <h3>contact info</h3>
            <a href=""> <i class="fas fa-phone"> </i> +021200222200 </a>
            <a href=""> <i class="fas fa-phone"> </i> +021000000111 </a>
            <a href=""> <i class="fas fa-envelope"></i> Bookly@gmail.com </a>
            <img src="image/worldmap1.png" class="map" alt="">
        </div>

    </div>
    <div class="share">
        <a href="#" class="fab fa-facebook-f"></a>
        <a href="#" class="fab fa-twitter"></a>
        <a href="#" class="fab fa-instagram"></a>
        <a href="#" class="fab fa-linkedin"></a>
        <a href="#" class="fab fa-pinterest"></a>
    </div>
    <div class="credit">creat by <span>Amr-Sherif-Abdallah</span> | all rights reserved</div>

</section>
<!--footer section ends-->

<!--loader-->
<!-- <div class="loader-container">
    <img src="image/loader-image.gif" alt="">
</div> -->
















<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--custom js file link-->
<script src="js/script.js"></script>
 

</body>
</html>