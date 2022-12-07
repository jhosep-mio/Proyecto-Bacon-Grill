$(document).ready(function() {
    $('#btnUsuarios').on('click', function() {
        $("#tabla-usuarios").load('usuarios.php');
        return false;
    });
});

$("#btnEliminar").click(function(){
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Your work has been saved',
        showConfirmButton: false,
        timer: 1500
    });
});
