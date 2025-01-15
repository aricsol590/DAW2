document.addEventListener("'DOMContentLoaded",()=>{

    let resultado=0;
    const resultadoDisplay=document.getElementById("resultado");

    const huecos=document.querySelector(".hole");
    function mostrarTopo(){
        //CREAR TOPO
        const topo=document.createElement("div");
        topo.classList.add("mole");
        const indiceHuecoAleatorio = Math.floor(Math.random()*huecos.length);
        const huecoElegido = huecos[indiceHuecoAleatorio];
        topo.appendChild(huecoElegido);
        topo.addEventListener('click',()=>{
            resultado++;
            resultadoDisplay.textContent= resultado;
            topo.remove();
            comenzar();
        });
    }
    setTimeout(()=>{
        topo.remove();
    },1500);
    function comenzar(){
        setInterval(mostrarTopo,1500);
    }
    comenzar();
});