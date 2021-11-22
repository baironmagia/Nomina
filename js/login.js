
let carro=document.getElementById("carro"); 
let sesion=document.getElementById("sesion"); 
let registro=document.getElementById("registro"); 

let conten_btn1=document.getElementById("conten-btn1"); 
let conten_btn2=document.getElementById("conten-btn2");
let btn1=document.getElementById("btn1");
let btn2=document.getElementById("btn2");

btn1.addEventListener("click",function(e){
    e.preventDefault();
    carro.classList.toggle("carro-c");
    
    sesion.classList.toggle("mostrar-sesion");
    sesion.classList.toggle("ocultar-sesion");

    registro.classList.toggle("ocultar-registro");
    registro.classList.toggle("mostrar-registro");
});
btn2.addEventListener("click",function(e){
    e.preventDefault();
    carro.classList.toggle("carro-c");
    
    sesion.classList.toggle("mostrar-sesion");
    sesion.classList.toggle("ocultar-sesion");

    registro.classList.toggle("ocultar-registro");
    registro.classList.toggle("mostrar-registro");
});


