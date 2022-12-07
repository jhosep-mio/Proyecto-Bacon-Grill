
// --------------- SWIPER - HOME --------------------

let homeSwiper = new Swiper(".home-swiper", {
  spaceBetween: 30,
  loop: "true",
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
  },
});

/*=========NEW - OFERTAS=============*/

let newSwiper = new Swiper(".ofertas-swiper", {
  centeredSlides: true,
  slidesPerView: "auto",
  loop: "true",
  spaceBetween: 16,
  autoplay: {
    delay: 3500,
    disableOnInteraction: false,
  },
});


// ------------ Scroll reveal - HOME --------------

const sr = ScrollReveal({
  origin: "top",
  distance: "60px",
  duration: 2500,
  delay: 400,
});

sr.reveal(`.home-swiper,.ofertas-swiper, .newsletter__container`);
sr.reveal(`.category__data, .trick__content, .footer__content`, {
  interval: 100,
});
sr.reveal(`.about__data, .discount__img`, { origin: "left" });
sr.reveal(`.about__img, .discount__data`, { origin: "right" });



// //Sections active
// const sections = document.querySelectorAll("section[id]");
// function scrollActive(){
//     const scrollY = window.pageYOffset

//     sections.forEach(current =>{
//         const sectionHeight = current.offsetHeight,
//               sectionTop = current.offsetTop - 58,
//               sectionId = current.getAttribute('id')

//         if(scrollY > sectionTop && scrollY <= sectionTop + sectionHeight){
//             document.querySelector('.nav__menu a[href*=' + sectionId + ']').classList.add('active-link')
//         }else{
//             document.querySelector('.nav__menu a[href*=' + sectionId + ']').classList.remove('active-link')
//         }
//     })
// }
// window.addEventListener("scroll",scrollActive);


// --------- Advertencia - ADVERTENCIA DE CONSOLA -------------

(function () {
  if (typeof EventTarget !== "undefined") {
      let func = EventTarget.prototype.addEventListener;
      EventTarget.prototype.addEventListener = function (type, fn, capture) {
          this.func = func;
          if(typeof capture !== "boolean"){
              capture = capture || {};
              capture.passive = false;
          }
          this.func(type, fn, capture);
      };
  };
}());
