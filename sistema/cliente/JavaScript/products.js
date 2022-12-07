// ----------- MODELO 3D   ----------------

let model = document.querySelector('.modelvirtual');

let background = document.querySelector('.background');

let closebtn = document.querySelector('.modelvirtual__close');

let cerrarModal = document.querySelector('.sale__button-show');


//selecciona todos los botones con la clase
let mostrarModal = document.querySelectorAll('.modelvirtual__active');

closebtn.addEventListener('click', cerrar);

mostrarModal.forEach(btn=>{
  btn.addEventListener("click", () => {
    model.classList.toggle('inactivemodal');
    background.classList.toggle('inactivemodal');
    document.getElementById("formModel").reset();
  });
});

function cerrar(){
  model.classList.toggle('inactivemodal');
  background.classList.toggle('inactivemodal');
  document.getElementById("formModel").reset();

}


