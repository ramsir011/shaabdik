$(document).ready(()=>{
    $('.hero__inner .hero__slide').slick({
         autoplay: true,
         autoplayspeed: 2000,
         dots:true
    });
     
  });

  const navSlide = () =>{
       const burger = document.querySelector('.burger');
       const nav = document.querySelector('.nav__links');
       burger.addEventListener('click',()=>{
            nav.classList.toggle('nav__active');


       });

  }
  navSlide();

  