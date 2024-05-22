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
                <a href="likes.html" class="fas fa-heart"></a>
                <a href="cart.html" class="fas fa-shopping-cart"><span>(3)</span></a>
                <div id="login-btn" class="fas fa-user"></div>
            </div>
        </div>
    
    <div class="header-2">
        <div class="fas fa-bars"></div>
        <nav class="navbar">
        <ul>
            <li><a href="index.html#home">home</a></li>
            <li><a href="index.html#featured">featured</a></li>
            <li><a href="index.html#arrivals">arrivals</a></li>
            <li><a href="index.html#reviews">reviews</a></li>
            <li><a href="index.html#blogs">blogs</a></li>
            <li><a href="orders.html">orders</a></li>
            
        </ul>
    </nav>
</div>
       
</header>
<!--header section ends-->
    
    
    <!--bottom navbar-->
    <nav class="bottom-navbar">
        <a href="index.html" class="fas fa-home"></a>
        <a href="index.html#featured" class="fas fa-list"></a>
        <a href="index.html#arrivals" class="fas fa-tags"></a>
        <a href="index.html#reviews" class="fas fa-comments"></a>
        <a href="index.html#blogs" class="fas fa-blog"></a>
        <a href="orders.html" class="fas fa-cart-arrow-down"></a>
    
     </nav>
     <!--bottom navbar ends-->
    
     <!--login-form-->
     <div class="login-form-container">
    
        <div id="close-login-btn" class="fas fa-times"></div>
    
        <form action="profile.html">
            <h3>sign in</h3>
            <span>username</span>
            <input type="email" name="" class="box" placeholder="Enter your email" id="">
            <span>password</span>
            <input type="password" name="" class="box" placeholder="Enter your password" id="">
            <div class="checkbox">
                <input type="checkbox" name="" id="remember-me">
                <label for="remember-me">remember me</label>
            </div>
            <input type="submit" value="sign in" class="btn">
            <p>forget password ? <a href="forget_password.html">click here</a></p>
            <p>don't have an account ? <a href="register.html">create one</a></p>
            
    
        </form>
      
    </div>

    <div class="products">
        <h1 class="heading-1"> <span>Your likes</span> </h1>
    
            <section class="featured-1" id="featured-1">
    
    
            
                <div class="featured-slider-1">
                    
            
                        <div class="box-1">
                            <div class="image">
                                <img src="image/book-10.png" alt="">
                            </div>
                            <div class="content">
                                <h3>featured books</h3>
                                <div class="price">$15.99 <span>$20.99</span></div>
                                 <a href="#" class="btn">Remove</a> 
                            </div>
                        </div>
                        <div class="box-1">
                            <div class="image">
                                <img src="image/book8.png" alt="">
                            </div>
                            <div class="content">
                                <h3>featured books</h3>
                                <div class="price">$15.99 <span>$20.99</span></div>
                                <a href="#" class="btn">Remove</a>
                            </div>
                        </div>
                        <div class="box-1">
                            <div class="image">
                                <img src="image/book9.png" alt="">
                            </div>
                            <div class="content">
                                <h3>featured books</h3>
                                <div class="price">$15.99 <span>$20.99</span></div>
                                <a href="#" class="btn">Remove</a>
                            </div>
                            
                        </div>
                    
                   
                </div>
                <div class="more-btn">
                    <a href="#" class="btn">Remove all</a>
                </div>
    
                
            </section>
        </div>





































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
            <a href="index.html#home"> <i class="fas fa-arrow-right"> </i> home </a>
            <a href="index.html#featured"> <i class="fas fa-arrow-right"> </i> featured </a>
            <a href="index.html#arrivals"> <i class="fas fa-arrow-right"> </i> arrivals </a>
            <a href="index.html#reviews"> <i class="fas fa-arrow-right"> </i> reviews </a>
            <a href="index.html#blogs"> <i class="fas fa-arrow-right"> </i> blogs </a>
        </div>

        <div class="box">
            <h3>extra links</h3>
            <a href="profile.html"> <i class="fas fa-arrow-right"> </i> account info </a>
            <a href="orders.html"> <i class="fas fa-arrow-right"> </i> ordered items </a>
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
<div class="loader-container">
    <img src="image/loader-image.gif" alt="">
</div>
















<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--custom js file link-->
<script src="js/script.js"></script>
 

</body>
</html>