const pantalla = document.querySelector(".pantalla");
const botones = document.querySelectorAll("button");
console.log(pantalla);
console.log(botones);
let calculos=[];
function calcular(boton){
    const valor = boton.textContent;
    if(valor =="Borrar"){
        calculos=[];
    }else if(valor == "="){
        pantalla.textContent=eval(acumulados)
    }
}
botones.forEach((button)=>button.addEventListener("click",()=>calcular(button)));