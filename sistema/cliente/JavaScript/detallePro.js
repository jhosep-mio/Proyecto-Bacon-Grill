//sumar y restar cantidad

let minusBtn = document.querySelector('.input_minus');
let plusBtn = document.querySelector('.input_plus');
let userInput = document.querySelector('.input_number');

let userInputNumber = 0;

plusBtn.addEventListener('click',()=>{
  userInputNumber++;
  userInput.value = userInputNumber;
});

minusBtn.addEventListener('click',()=>{
  userInputNumber--;
  if(userInputNumber <=0){
    userInputNumber = 0;
  }
  userInput.value = userInputNumber;
});