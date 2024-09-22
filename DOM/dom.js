//SELECCIONAR ELEMENTOS

//por ID
// let elementoPorID = document.getElementById('parrafo1')
// elementoPorID.innerHTML = 'HTML'

//por Clase
// let elementosPorClase = document.getElementsByClassName('parrafos')
// elementosPorClase[1].innerHTML = 'CSS'

//por tag

// let elementoPorTag = document.getElementsByTagName('p')
// elementoPorTag[2].innerHTML = 'Javascript'

//modificar estilos, estructura camelCase

// elementoPorID.style.background = 'rgba(255,255,255,0.4)'
// elementoPorID.style.border = '2px solid black'  
// elementoPorID.style.padding = '5px 10px'
// elementoPorID.style.borderRadius = '5px'

//CREAR NODOS

/*
1. Seleccionar al elemento padre
2. Crear un elemento
3. Agregarle su contenido
4. Agregarle sus atributos
5. Append del elemento al padre
 */
//1
let elementoPadre = document.getElementById('lista')
//2
let parrafoCuatro = document.createElement('p')
//3
parrafoCuatro.innerHTML = 'Parrafo 4'
// parrafoCuatro = document.createTextNode('Parrafo 4');
// const textoParrafo4 = document.createTextNode('Parrafo 4')
// parrafoCuatro = textoParrafo4
//4 
parrafoCuatro.setAttribute('class', 'parrafos')

//5
// elementoPadre.appendChild(parrafoCuatro)
// elementoPadre.insertAdjacentElement('afterbegin', parrafoCuatro) --> afterend, beforebegin, beforeend
elementoPadre.append(parrafoCuatro)


// ELIMINAR NODOS:
// 1. Hacer referencia al nodo padre 
// 2. Usar la propiedad removeChild()

//1. let elementoPadre = document.getElementById('lista')
//2. 
// elementoPadre.removeChild(parrafoCuatro)


//Metodo remove()

//se aplica sobre el elemento hijo, no sobre el elemento padre
// parrafoCuatro.remove()

//Usando la propiedad replaceChild, reemplaza 
 const parrafo3 = document.querySelector('#parrafo3')
// elementoPadre.replaceChild(/*Reemplazo */ parrafoCuatro,/*Original */ parrafo3)



//EVENT LISTENER

//Click izquierdo
parrafoCuatro.addEventListener('click',()=>{
    parrafoCuatro.innerHTML = 'Hola, hiciste click aquí'
})

//Click derecho
const boton = document.querySelector('#button')
boton.addEventListener('mouseover', ()=>{
    console.log('Hola')
})
