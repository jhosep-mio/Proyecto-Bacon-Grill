
let carritoModal = document.querySelector('.cart-modal');
// let background = document.querySelector('.background');
let closeCarritoModal = document.querySelector('.cart-modal__close');
let botonActiveCarritoModal = document.querySelectorAll('.cart-shop');
const cambiarCarrito = document.querySelector('.cart_c');

closeCarritoModal.addEventListener('click', ocultarCarrito);

botonActiveCarritoModal.forEach(btn=>{
  btn.addEventListener("click", () => {
    carritoModal.classList.toggle('inactive_cart');
  });
});

function ocultarCarrito(){
  carritoModal.classList.toggle('inactive_cart');
}

