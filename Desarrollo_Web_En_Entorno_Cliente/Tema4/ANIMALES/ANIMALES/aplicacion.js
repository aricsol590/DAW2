document.addEventListener("DOMContentLoaded",()=>
{
    const animales=[
        {
            nombre:'pez',
            img:'./imagenes/pez.png',
        },
        {
            nombre:'abeja',
            img:'./imagenes/abeja.png',
        },
        {
            nombre:'caballo',
            img:'./imagenes/caballo.png',
        },
        {
            nombre:'oveja',
            img:'./imagenes/oveja.png',
        },
        {
            nombre:'pinguino',
            img:'./imagenes/pinguino.png',
        },
        {
            nombre:'vaca',
            img:'./imagenes/vaca.png',
        },
        {
            nombre:'pez',
            img:'./imagenes/pez.png',
        },
        {
            nombre:'abeja',
            img:'./imagenes/abeja.png',
        },
        {
            nombre:'caballo',
            img:'./imagenes/caballo.png',
        },
        {
            nombre:'oveja',
            img:'./imagenes/oveja.png',
        },
        {
            nombre:'pinguino',
            img:'./imagenes/pinguino.png',
        },
        {
            nombre:'vaca',
            img:'./imagenes/vaca.png',
        }
    ];
    animales.sort(()=> 0.5-Math.random());
   /*  Math.random() -> entre 0 y 1
    resta de 0.5 y random:
        0,5-0.3 positivo
        0,5-0,8 negativo */
    const grid=document.querySelector(".grid");
    const mostrar_resultado=document.querySelector('#resultado');
    let cartaElegida=[];
    let cartasElegidaId=[];
    let cartasGanadoras=[];
    
    function crearTablero()
    {
        for(let i=0;i<animales.length;i++)
        {
            const animal=document.createElement('img');
            animal.setAttribute('src','./imagenes/animalitos.png');
            animal.setAttribute('data-id',i);
            animal.addEventListener('click',comprueba);
            grid.appendChild(animal);
        }
    };
function compruebeElegidas()
{
    const cartas= document.querySelectorAll('img');
    const id1=cartasElegidaId[0];
    const id2=cartasElegidaId[1];
    const nombre1=cartaElegida[0];
    const nombre2=cartaElegida[1];

    if(nombre1==nombre2)
    {
       console.log(`Acertaste ${nombre1} ${nombre2}`);
       cartas[id1].setAttribute('src','./imagenes/blanco.png');
       cartas[id2].setAttribute('src','./imagenes/blanco.png');
       cartas[id1].removeEventListener('click',comprueba);
       cartas[id2].removeEventListener('click',comprueba);
    }
    else{
        cartas[id1].setAttribute('src','./imagenes/animalitos.png');
        cartas[id2].setAttribute('src','./imagenes/animalitos.png');
    }
    cartaElegida=[];
    cartasElegidaId=[];
}
function comprueba()
{
    let carta= this.getAttribute('data-id');
    this.setAttribute('src',animales[carta].img);
    cartaElegida.push(animales[carta].nombre);
    cartasElegidaId.push(carta);
    if (cartaElegida.length===2)
    {
        setTimeout(compruebeElegidas,1500);   
    }
}
crearTablero();
})