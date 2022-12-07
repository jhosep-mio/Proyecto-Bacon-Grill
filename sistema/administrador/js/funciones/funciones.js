//PRESIONAR BOTON DE SELECCIONAR IMAGEN

function preview(e){

    console.log(e.target.files);
    // URL DE IMAGEN
    const url = e.target.files[0];
    // CREAR URL
    const urlTmp = URL.createObjectURL(url);
    // CARGAR PREVIEW IMG
    document.getElementById("img-preview").src = urlTmp;
    document.getElementById("icon-image").classList.add("d-none");
    document.getElementById("img-preview").classList.remove("d-none");
    document.getElementById("icon-cerrar").innerHTML = 
    `<button class="btn btn-danger mb-2" onclick = "deleteImg(event)">
        <i class="fas fa-times"> </i>
    </button>
    ${url['name']}`;
}

//PRESIONAR BOTON DE ELIMINAR IMG
function deleteImg(e){
    document.getElementById("icon-cerrar").innerHTML = '';
    document.getElementById("icon-image").classList.remove("d-none");
    document.getElementById("img-preview").classList.add("d-none");
    document.getElementById("imagen").value = '';
    document.getElementById("foto_delete").value = '';
}

// function editarImg(){
//     document.getElementById("icon-image").classList.add("d-none");
//     document.getElementById("icon-cerrar").innerHTML = 
//     `<button class="btn btn-danger mb-2" onclick = "deleteImg(event)">
//         <i class="fas fa-times"> </i>
//     </button>`;
//     document.getElementById("icon-image").classList.add("d-none");
// }

