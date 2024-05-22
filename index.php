<?php
include 'connect.php';

if(isset($_POST['submit'])){

    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $pass = sha1($_POST['pass']);
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);

    $select_users = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
    $select_users->execute([$email, $pass]);
    $row = $select_users->fetch(PDO::FETCH_ASSOC);

    if($select_users->rowCount() > 0){
        setcookie('user_id', $row['id'], time() + 60*60*24, '/'); 
        header('location:profile.php');             
    }else{
        $messagee[] = 'incorrect email or password!';
    }

}

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

<?php
    if(isset($messagee)){
        foreach($messagee as $messagee){
            echo '
            <div class="messagee">
                <span>'.$messagee.'</span>
                <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
            </div>
            ';
        }
    }
?> 

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
                <div id="login-btn" class="fas fa-user"></div>
            </div>
        </div>
    
    <div class="header-2">
        <div class="fas fa-bars"></div>
        <nav class="navbar">
        <ul>
            <li><a href="#home">home</a></li>
            <li><a href="#featured">featured</a></li>
            <li><a href="#arrivals">arrivals</a></li>
            <li><a href="#reviews">reviews</a></li>
            <li><a href="#blogs">blogs</a></li>
            <li><a href="orders.php">orders</a></li>
            
        </ul>
    </nav>
</div>
       
</header>
<!--header section ends-->
<!--bottom navbar-->
<nav class="bottom-navbar">
    <a href="#home" class="fas fa-home"></a>
    <a href="#featured" class="fas fa-list"></a>
    <a href="#arrivals" class="fas fa-tags"></a>
    <a href="#reviews" class="fas fa-comments"></a>
    <a href="#blogs" class="fas fa-blog"></a>
    <a href="orders.php" class="fas fa-cart-arrow-down"></a>

 </nav>
 <!--bottom navbar ends-->


  <!--login-form-->
 <section class="login-form-container">

    <div id="close-login-btn" class="fas fa-times"></div>

    <form action="" method="POST">
        <h3>sign in</h3>
        <span>Email</span>
        <input type="email" name="email" required placeholder="Enter your e-mail address" class="box" maxlength="50"oninput="this.value = this.value. replace(/\s/g, '')">
        <span>password</span>
        <input type="password" name="pass" required placeholder="Enter your password" class="box" maxlength="50"oninput="this.value = this.value. replace(/\s/g, '')">
        <div class="checkbox">
            <input type="checkbox" name="" id="remember-me">
            <label for="remember-me">remember me</label>
        </div>
        <input type="submit" name='submit' value="sign in" class="btn">
        <p>forget password ? <a href="forget_password.php">click here</a></p>
        <p>don't have an account ? <a href="register.php">create one</a></p>
        

    </form>
  
 </section>
<!--login form end-->

<!--home section starts-->
<section class="home" id="home">

    <div class="row">

        <div class="content">
            <h3>Up to 75% off</h3>
            <p>Our mission is to provide quality but affordable books for education, entertainment, self-development and self-fulfillment; to all when the need arises by: Providing a wide range of books to satisfy our clients. Exceeding our customers' expectation in their book requirements. Making our books accessible in the market.</p>        
            <a href="#" class="btn">Shop now</a>
        </div>

        <div class="swiper books-slider">
            <div class="swiper-wrapper">
                <a href="#" class="swiper-slide"><img src="image/book8.png" alt=""></a>
                <a href="#" class="swiper-slide"><img src="image/book10.png" alt=""></a>
                <a href="#" class="swiper-slide"><img src="image/book11.png" alt=""></a>
                <a href="#" class="swiper-slide"><img src="image/book4.png" alt=""></a>
                <a href="#" class="swiper-slide"><img src="image/book7.png" alt=""></a>
                <a href="#" class="swiper-slide"><img src="image/book-11.png" alt=""></a>
            </div>
            <img src="image/stand5.png" class="stand" alt="">
        </div>
   
    </div>

</section>
<!--home section ends-->

<!-- icons section starts-->
<section class="icons-container">

    <div class="icons">
        <i class="fas fa-plane"></i>
        <div class="content">
            <h3>Free shipping</h3>
            <p>Order over $100</p>
        </div>
    </div>

    <div class="icons">
        <i class="fas fa-lock"></i>
        <div class="content">
            <h3>Secure payment</h3>
            <p>100 secure payment</p>
        </div>
    </div>

    <div class="icons">
        <i class="fas fa-redo-alt"></i>
        <div class="content">
            <h3>Easy returns</h3>
            <p>10 days returns</p>
        </div>
    </div>

    <div class="icons">
        <i class="fas fa-headset"></i>
        <div class="content">
            <h3>24/7 support</h3>
            <p>Call us anytime</p>
        </div>
    </div>

</section>
<!-- icons section ends-->

<!--featured section starts-->
<section class="featured" id="featured">

<h1 class="heading"> <span>featured books</span> </h1>

<div class="swiper featured-slider">
    
    <div class="swiper-wrapper">

        <div class="swiper-slide box">
            <div class="icons">
                <a href="#" class="fas fa-search"></a>
                <a href="likes.php" class="fas fa-heart"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>
            <div class="image">
                <img src="image/book-1.png" alt="">
            </div>
            <div class="content">
                <h3>featured books</h3>
                <div class="price">$15.99 <span>$20.99</span></div>
                <a href="cart.php" class="btn">Add to cart</a>
            </div>
        </div>

        <div class="swiper-slide box">
            <div class="icons">
                <a href="#" class="fas fa-search"></a>
                <a href="likes.php" class="fas fa-heart"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>
            <div class="image">
                <img src="image/book-2.png" alt="">
            </div>
            <div class="content">
                <h3>featured books</h3>
                <div class="price">$15.99 <span>$20.99</span></div>
                <a href="cart.php" class="btn">Add to cart</a>
            </div>
        </div>

        <div class="swiper-slide box">
            <div class="icons">
                <a href="#" class="fas fa-search"></a>
                <a href="likes.php" class="fas fa-heart"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>
            <div class="image">
                <img src="image/book-3.png" alt="">
            </div>
            <div class="content">
                <h3>featured books</h3>
                <div class="price">$15.99 <span>$20.99</span></div>
                <a href="cart.php" class="btn">Add to cart</a>
            </div>
        </div>

        <div class="swiper-slide box">
            <div class="icons">
                <a href="#" class="fas fa-search"></a>
                <a href="likes.php" class="fas fa-heart"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>
            <div class="image">
                <img src="image/book-4.png" alt="">ik
            </div>
            <div class="content">
                <h3>featured books</h3>
                <div class="price">$15.99 <span>$20.99</span></div>
                <a href="cart.php" class="btn">Add to cart</a>
            </div>
        </div>

        <div class="swiper-slide box">
            <div class="icons">
                <a href="#" class="fas fa-search"></a>
                <a href="likes.php" class="fas fa-heart"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>
            <div class="image">
                <img src="image/book-5.png" alt="">
            </div>
            <div class="content">
                <h3>featured books</h3>
                <div class="price">$15.99 <span>$20.99</span></div>
                <a href="cart.php" class="btn">Add to cart</a>
            </div>
        </div>

        <div class="swiper-slide box">
            <div class="icons">
                <a href="#" class="fas fa-search"></a>
                <a href="likes.php" class="fas fa-heart"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>
            <div class="image">
                <img src="image/book-6.png" alt="">
            </div>
            <div class="content">
                <h3>featured books</h3>
                <div class="price">$15.99 <span>$20.99</span></div>
                <a href="cart.php" class="btn">Add to cart</a>
            </div>
        </div>

        <div class="swiper-slide box">
            <div class="icons">
                <a href="#" class="fas fa-search"></a>
                <a href="likes.php" class="fas fa-heart"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>
            <div class="image">
                <img src="image/book-7.png" alt="">
            </div>
            <div class="content">
                <h3>featured books</h3>
                <div class="price">$15.99 <span>$20.99</span></div>
                <a href="cart.php" class="btn">Add to cart</a>
            </div>
        </div>

        <div class="swiper-slide box">
            <div class="icons">
                <a href="#" class="fas fa-search"></a>
                <a href="likes.php" class="fas fa-heart"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>
            <div class="image">
                <img src="image/book-8.png" alt="">
            </div>
            <div class="content">
                <h3>featured books</h3>
                <div class="price">$15.99 <span>$20.99</span></div>
                <a href="cart.php" class="btn">Add to cart</a>
            </div>
        </div>

        <div class="swiper-slide box">
            <div class="icons">
                <a href="#" class="fas fa-search"></a>
                <a href="likes.php" class="fas fa-heart"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>
            <div class="image">
                <img src="image/book-9.png" alt="">
            </div>
            <div class="content">
                <h3>featured books</h3>
                <div class="price">$15.99 <span>$20.99</span></div>
                <a href="cart.php" class="btn">Add to cart</a>
            </div>
        </div>

        <div class="swiper-slide box">
            <div class="icons">
                <a href="#" class="fas fa-search"></a>
                <a href="likes.php" class="fas fa-heart"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>
            <div class="image">
                <img src="image/book-10.png" alt="">
            </div>
            <div class="content">
                <h3>featured books</h3>
                <div class="price">$15.99 <span>$20.99</span></div>
                <a href="cart.php" class="btn">Add to cart</a>
            </div>
        </div>

        <div class="swiper-slide box">
            <div class="icons">
                <a href="#" class="fas fa-search"></a>
                <a href="likes.php" class="fas fa-heart"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>
            <div class="image">
                <img src="image/book8.png" alt="">
            </div>
            <div class="content">
                <h3>featured books</h3>
                <div class="price">$15.99 <span>$20.99</span></div>
                <a href="cart.php" class="btn">Add to cart</a>
            </div>
        </div>

        <div class="swiper-slide box">
            <div class="icons">
                <a href="#" class="fas fa-search"></a>
                <a href="likes.php" class="fas fa-heart"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>
            <div class="image">
                <img src="image/book-11.png" alt="">
            </div>
            <div class="content">
                <h3>featured books</h3>
                <div class="price">$15.99 <span>$20.99</span></div>
                <a href="cart.php" class="btn">Add to cart</a>
            </div>
        </div>

        <div class="swiper-slide box">
            <div class="icons">
                <a href="#" class="fas fa-search"></a>
                <a href="likes.php" class="fas fa-heart"></a>
                <a href="#" class="fas fa-eye"></a>
            </div>
            <div class="image">
                <img src="image/book11.png" alt="">
            </div>
            <div class="content">
                <h3>featured books</h3>
                <div class="price">$15.99 <span>$20.99</span></div>
                <a href="cart.php" class="btn">Add to cart</a>
            </div>
        </div>
    </div>

    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>

</div>

</section>
<!--featured section ends-->

<!-- newsletter section starts-->  
<section class="newsletter">

<form action="">
    <h3>Subscribe for lastest updates</h3>
    <input type="" name="" placeholder="Enter your email" id="" class="box">
    <input type="" value="Subscribe" class="btn">
</form>

</section>
<!-- newsletter section ends-->
<!--arrivals section starts-->
<section class="arrivals" id="arrivals">

    <h1 class="heading"> <span>new arrivals</span> </h1>

    <div class="swiper arrivals-slider">

        <div class="swiper-wrapper">

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="image/book1.png" alt="">
                </div>
                <div class="content">
                    <h3>new arrivals</h3>
                    <div class="price">$15.99 <span>$20.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="image/book2.png" alt="">
                </div>
                <div class="content">
                    <h3>new arrivals</h3>
                    <div class="price">$15.99 <span>$20.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="image/book3.png" alt="">
                </div>
                <div class="content">
                    <h3>new arrivals</h3>
                    <div class="price">$15.99 <span>$20.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="image/book4.png" alt="">
                </div>
                <div class="content">
                    <h3>new arrivals</h3>
                    <div class="price">$15.99 <span>$20.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="image/book5.png" alt="">
                </div>
                <div class="content">
                    <h3>new arrivals</h3>
                    <div class="price">$15.99 <span>$20.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>


            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="image/book6.png" alt="">
                </div>
                <div class="content">
                    <h3>new arrivals</h3>
                    <div class="price">$15.99 <span>$20.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>
        </div>
        
    </div>

    <div class="swiper arrivals-slider">

        <div class="swiper-wrapper">

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="image/book7.png" alt="">
                </div>
                <div class="content">
                    <h3>new arrivals</h3>
                    <div class="price">$15.99 <span>$20.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="image/book8.png" alt="">
                </div>
                <div class="content">
                    <h3>new arrivals</h3>
                    <div class="price">$15.99 <span>$20.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="image/book9.png" alt="">
                </div>
                <div class="content">
                    <h3>new arrivals</h3>
                    <div class="price">$15.99 <span>$20.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="image/book10.png" alt="">
                </div>
                <div class="content">
                    <h3>new arrivals</h3>
                    <div class="price">$15.99 <span>$20.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>

            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="image/book-11.png" alt="">
                </div>
                <div class="content">
                    <h3>new arrivals</h3>
                    <div class="price">$15.99 <span>$20.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>


            <a href="#" class="swiper-slide box">
                <div class="image">
                    <img src="image/book11.png" alt="">
                </div>
                <div class="content">
                    <h3>new arrivals</h3>
                    <div class="price">$15.99 <span>$20.99</span></div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                </div>
            </a>
        </div>
        
    </div>

</section>
<!--arrivals section ends-->

<!--deal section starts-->
<section class="deal">

    <div class="content">
        <h3>Deal of the day</h3>
        <h1>Up to 50% off</h1>
        <p>Make your own book! if you own the story, you can write every chapter in the book. Own your life; write the story the way you want it to read.</p>
        <a href="#" class="btn">Shop now</a>
        </div>
    <div class="image">
        <img src="image/deal-img3.jpg" alt="">
    </div>

</section>
<!--deal section ends-->

<!--reviews section starts-->
<section class="reviews" id="reviews">

    <h1 class="heading"> <span>Client's reviews</span> </h1>
    <div class="swiper reviews-slider">
        <div class="swiper-wrapper">

            <div class="swiper-slide box">
                <img src="image/pic-1.png" alt="">
                <h3>John Deo</h3>
                <p>Can’t put the experience of working with the expert writers of Mczell book writing into words! I signed up with them and within the first two weeks, I was able to see the book shaping up. The service was top-notch and gave me the confidence to start working on my second book.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>

            <div class="swiper-slide box">
                <img src="image/pic-2.png" alt="">
                <h3>Albert Rogers</h3>
                <p>Sometimes all you need is an expert’s opinion on your manuscript. Lost Found book writing’s team was that expert for me. They pointed out the most basic errors that I made which made me realize how big a mistake I was going to do had I not gotten my manuscript edited. They made me a better writer than before.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>

            <div class="swiper-slide box">
                <img src="image/pic-3.png" alt="">
                <h3>Tom Hansen</h3>
                <p>Thoroughly enjoyed working with McZell Book Writing. They guided me step-by-step, elevating my book publishing experience. They had a solution to all of my problems and did not make me settle for something less than the best. I owe a big thank you to all the team of McZell Book Publishers.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>

            <div class="swiper-slide box">
                <img src="image/pic-4.jpg" alt="">
                <h3>Catalina Bravo</h3>
                <p>Vintage Book Writing has professional writers that has helped me big time. Being a writer myself but facing time restraints, had to hire professional services and found out that the writers were able to help me in creating my eBook. Highly impressive and flawless work.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>

            <div class="swiper-slide box">
                <img src="image/pic-5.png" alt="">
                <h3>Anne Jordan</h3>
                <p>The folks who run this place are wonderful and a treasure of knowledge! I got bored during the pandemic and had an idea of writing a book but didn’t know how to start it. I was referred to get it written by the team of McZell Book Writing and they did the best job possible. Loved their work and highly recommended.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>

            <div class="swiper-slide box">
                <img src="image/pic-6.png" alt="">
                <h3>Jennifer Lopes </h3>
                <p>For me, the most important aspect of getting content done right is the timely delivery and constant support. These are what I received from McZell Book Writing service. They completed the book tight on time when I requested it and their customer support team was always there to listen to me and assist me.</p>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half-alt"></i>
                </div>
            </div>
            
        </div>
    </div>

</section>
<!--reviews section ends-->

<!--blogs section starts-->
<section class="blogs" id="blogs">

    <h1 class="heading"> <span>our blogs</span> </h1>
    <div class="swiper blogs-slider">

        <div class="swiper-wrapper">

            <div class="swiper-slide box">
                <div class="image">
                    <img src="image/blog-5.jpg" class="image" alt="">
                </div>
                <div class="content">
                    <h3>Blog title goes here</h3>
                    <p>Offering a take on the literary world centered around millennial women, Bustle Books' poignant think pieces and spotlight on the unexpected influences of fanfiction provide a unique and meaningful perspective on the written word.</p>
                    <a href="#" class="btn">Read more</a>
                </div>
            </div>

            <div class="swiper-slide box">
                <div class="image">
                    <img src="image/blog-1.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Blog title goes here</h3>
                    <p>From First Page to Last is a colorful blog that spotlights books, authors, and publishers of all genres. You can search for reviews by reviewer or book title. If you enjoy getting the inside scoop on the makings and thoughts behind a novel, this is the blog for you!</p>
                    <a href="#" class="btn">Read more</a>
                </div>
            </div>

            <div class="swiper-slide box">
                <div class="image">
                    <img src="image/blog-2.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Blog title goes here</h3>
                    <p>Tidy and modern, Flavorwire offers several monthly articles that examine both time-honored classics and contemporary publications. Its fresh take on the literary world blends book culture with pop culture, lending an original flavor to its featured essays.</p>
                    <a href="#" class="btn">Read more</a>
                </div>
            </div>

            <div class="swiper-slide box">
                <div class="image">
                    <img src="image/blog-3.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Blog title goes here</h3>
                    <p>Blogger Alexandra's energetic voice enchants readers as she examines her favorite books and shares her impressions of and thoughts on her most recent reads. Literary with an aesthetic twist, this blog celebrates the beauty of books.</p>
                    <a href="#" class="btn">Read more</a>
                </div>
            </div>

            <div class="swiper-slide box">
                <div class="image">
                    <img src="image/blog-4.jpg" alt="">
                </div>
                <div class="content">
                    <h3>Blog title goes here</h3>
                    <p>The Millions is a spunky online magazine flush with articles that are unafraid to venture into off-the-wall and unconventional literary topics. You can search for your favorite books to view all the articles and essays that mention them.</p>
                    <a href="#" class="btn">Read more</a>
                </div>
            </div>

        </div>

    </div>

</section>
<!--blogs section ends-->

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
<div class="loader-container">
    <img src="image/loader-image.gif" alt="">
</div>




<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--custom js file link-->
<script src="js/script.js"></script>
 



</body>
</html>