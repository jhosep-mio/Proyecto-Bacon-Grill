const signUp = document.querySelector('.sign-up');
const signIn  = document.querySelector('.sign-in');
const botonSecundarioIn  = document.querySelector('.boton_secundarioIn');
const botonSecundarioUp  = document.querySelector('.boton_secundarioUp');
const btnSignIn= document.querySelector('.sign-in-btn');
const btnSignUp = document.querySelector('.sign-up-btn');

btnSignIn.addEventListener('click', mostrarSignUp);
btnSignUp.addEventListener('click', mostrarSignUp);
botonSecundarioIn.addEventListener('click', mostrarSignUp);
botonSecundarioUp.addEventListener('click', mostrarSignUp);

function mostrarSignUp (){
    signIn.classList.toggle('inactive');
    signUp.classList.toggle('inactive');
};
