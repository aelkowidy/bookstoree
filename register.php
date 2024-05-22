<?php

include 'connect.php';

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $pass = sha1($_POST['pass']);
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);
    $cpass = sha1($_POST['cpass']);
    $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

    $select_users = $conn->prepare("SELECT * FROM `users` WHERE email = ?");
    $select_users->execute([$email]);

    if($select_users->rowCount() > 0){
        $message[] = 'email already taken!';
    }else{
        if($pass != $cpass) {
            $message[] = 'confirm password not matched!';
            }else{
                $insert_user = $conn->prepare("INSERT INTO `users` (name, email, password) VALUES 
                (?,?,?)");
                $insert_user->execute([$name, $email, $cpass]);
                if($insert_user){
                    $fetch_user= $conn->prepare("SELECT * FROM `users` WHERE email = ? AND
                    password = ?");
                    $fetch_user->execute([$email, $cpass]);
                    $row = $fetch_user->fetch(PDO::FETCH_ASSOC);
                    if($fetch_user->rowCount() > 0){
                        // 60*60*24 = 86400 seconds which is equals to 1 day;
                        // to set cookies for 1 month use 60*60*24*30
                        setcookie('user_id', $row['id'], time() + 60*60*24, '/'); 
                        header('location:profile.php');
                }
                    
            }   
        }
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
            <li><a href="orders.php">orders</a></li>
            
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






<?php
    if(isset($message)){
        foreach($message as $message){
            echo '
            <div class="message">
                <span>'.$message.'</span>
                <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
            </div>
            ';
        }
    }
?>



    <section class="forget">

        <h1 class="heading-3"> <span>register now</span> </h1>
        <section class="forget-container">
            <form action="" method="post">
                <h3>creat your account</h3>
                <input type="text" name="name" required placeholder="Enter your name" class="box" maxlength="50">
                <input type="email" name="email" required placeholder="Enter your e-mail address" class="box" maxlength="50"oninput="this.value = this.value. replace(/\s/g, '')">
                <input type="password" name="pass" required placeholder="Enter your password" class="box" maxlength="50"oninput="this.value = this.value. replace(/\s/g, '')">
                <input type="password" name="cpass" required placeholder="Confirm password" class="box" maxlength="50"oninput="this.value = this.value. replace(/\s/g, '')">
                <input type="submit" value="reister now" name="submit" class="btn">
                <p>already have an account? <a href="index.php">Login now</a></p>
            </form>
        </section>
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













<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--custom js file link-->
<script src="js/script.js"></script>
 
 

</body>
</html>