$(document).ready(function(){

    $('.fa-bars').click(function(){
        $(this).toggleClass('fa-times');
        $('.navbar').toggleClass('nav-toggle');
    });
$(window).on('load scroll',function(){
    $(fa-bars).removeClass('fa-times');
    $('.navbar').removeClass('nav-toggle');
});

});


searchForm = document.querySelector('.search-form');

document.querySelector('#search-btn').onclick = () =>{
    searchForm.classList.toggle('active');
}

let loginForm = document.querySelector('.login-form-container');

document.querySelector('#login-btn').onclick = () =>{
    loginForm.classList.toggle('active');
}

document.querySelector('#close-login-btn').onclick = () =>{
    loginForm.classList.remove('active');
}

window.onscroll = () =>{

    searchForm.classList.remove('active');

    if(window.scrollY > 80){
        document.querySelector('.header .header-2').classList.add('active');
    }else{
        document.querySelector('.header .header-2').classList.remove('active');
    }

}

window.onload = () =>{
    if(window.scrollY > 80){
        document.querySelector('.header .header-2').classList.add('active');
    }else{
        document.querySelector('.header .header-2').classList.remove('active');
    }

fadeOut();
}



$(window).on('load',function(){
  $(".loader-container").fadeOut(2000);

});


//function loader(){
  //document.querySelector('.loader-container').classList.add('active');
//}

//function fadeOut(){
  //setTimeout(loader, 600);
//}

//window.onload = fadeOut();

var swiper = new Swiper(".books-slider", {
    loop:true,
    conteredSliders: true,
    autoplay:{
        deplay: 9500,
        disableOnInteraction: false,
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
    },
  });

var swiper = new Swiper(".featured-slider", {
    spaceBetween: 10,
    loop:true,
    conteredSliders: true,
    autoplay:{
        deplay: 9500,
        disableOnInteraction: false,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      450: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 3,
      },
      
      1024: {
        slidesPerView: 4,
      },
    },
  });

var swiper = new Swiper(".arrivals-slider", {
  spaceBetween: 10,
  loop:true,
  conteredSliders: true,
  autoplay:{
      deplay: 9500,
      disableOnInteraction: false,
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 2,
    },
    1024: {
      slidesPerView: 3,
    },
    },
  });

var swiper = new Swiper(".reviews-slider", {
  spaceBetween: 10,
  grabCursor:true,
  loop:true,
  conteredSliders: true,
  autoplay:{
      deplay: 9500,
      disableOnInteraction: false,
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 2,
    },
    1024: {
      slidesPerView: 3,
    },
    },
  });

var swiper = new Swiper(".blogs-slider", {
  spaceBetween: 10,
  grabCursor:true,
  loop:true,
  conteredSliders: true,
  autoplay:{
      deplay: 9500,
      disableOnInteraction: false,
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 2,
    },
    1024: {
      slidesPerView: 3,
    },
    },
  });

  
  