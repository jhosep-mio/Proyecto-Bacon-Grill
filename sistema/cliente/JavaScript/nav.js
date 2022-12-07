const productDetails= document.querySelector('.products_detail');
const listProducts= document.querySelector('.list-productos');

const menuMobile= document.querySelector('.menu_list');
const navbarBot= document.querySelector('.navbar-bot');
const img_close = document.querySelector('.product-detail-close');


productDetails.addEventListener('click', mostrarListaProductos);
menuMobile.addEventListener('click', mostrarMenuMobile);
img_close.addEventListener('click', mostrarMenuMobile);


function mostrarListaProductos() {
    listProducts.classList.toggle('inactive_script');
}

function mostrarMenuMobile() {
    navbarBot.classList.toggle('on-active');
}




