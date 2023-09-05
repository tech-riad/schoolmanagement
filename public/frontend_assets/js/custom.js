$(function() {


  // Preloader
    
  $(window).on('load',function(){
    $('.preloader').delay(100).fadeOut(100);
  }); 
  

  // Banner Slider
  var swiper = new Swiper(".BannerSlider", {
    spaceBetween: 30,
    effect: "fade",
    navigation: {
      nextEl: ".next",
      prevEl: ".prev",
    },
    autoplay: {
      delay: 1500,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  });

  // Venubox
  new VenoBox({
    selector: '.my-image-links',
    numeration: true,
    infinigall: true,
    share: true,
    spinner: 'rotating-plane'
  });

  // backToTop
  var btn = $('#backToTop');

$(window).scroll(function() {
  if ($(window).scrollTop() > 300) {
    btn.addClass('show');
  } else {
    btn.removeClass('show');
  }
});

btn.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({scrollTop:0}, '300');
});


// Sticky Menu
$(window).scroll(function(){
  if($(this).scrollTop() > 100){
      $('.Menubar').addClass('sticky')
  } else{
      $('.Menubar').removeClass('sticky')
  }
});
    







});
