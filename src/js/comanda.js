let patron = new RegExp('^[0-9]$');
let idPlato;
let carrito = [];

document.addEventListener('DOMContentLoaded', function() { 
    botonMas();
    botonMenos();
    botonesComanda();
    botonesCantidad();
    seleccionarTipo(); //Seleccionamos los divs con los tipos de platos
    const idSesion = document.querySelector('#idReserva').innerText;
    console.log(idSesion);
});
function seleccionarTipo() {
    const tipos = document.querySelectorAll('.tipo-plato');
    tipos.forEach(tipo => {
        tipo.addEventListener('click', function(e){
            mostrarTipo(e.target);
        });
    });
}
function mostrarTipo(tipo) {
    const id = tipo.id;

    seleccionarPlato(id);
    
    const anteriorActivo = document.querySelector('.tipo-plato-activo');
    anteriorActivo.classList.remove('tipo-plato-activo');

    const tipoActivo = document.querySelector(`#${id}`);
    papaNode = tipoActivo.parentNode;
    papaNode.classList.add('tipo-plato-activo');
}
function seleccionarPlato(id) {
    const platos = document.querySelectorAll('.platos');
    platos.forEach( plato => {
        plato.classList.add('oculto');
        plato.addEventListener('click', function(e) {
            idPlato = plato.dataset.idPlato;
        });
    });
    const seleccionadoPlato =document.querySelector(`.${id}`);
    seleccionadoPlato.classList.remove('oculto');
}
function botonMas() {
    const botonesMas = document.querySelectorAll('#boton-mas');
    botonesMas.forEach( botonMas => {
        botonMas.addEventListener('click', function() {
            index = botonMas.dataset.masPlato;
            const input = document.querySelector(`[data-cantidad-plato="${index}"]`);
            input.value++;
        });
    });
}
function botonMenos() {
    const botonesMenos = document.querySelectorAll('#boton-menos');
    botonesMenos.forEach( botonMenos => {
        botonMenos.addEventListener('click', function() {
            index = botonMenos.dataset.menosPlato;
            const input = document.querySelector(`[data-cantidad-plato="${index}"]`);
            if(input.value > 0) input.value--;
        });
    });
}
function botonesCantidad() {
    const botonesCantidad = document.querySelectorAll('#plato-cantidad');
    botonesCantidad.forEach( botonCantidad => {
        botonCantidad.addEventListener('input', function() {;
            if(botonCantidad.value < 0) botonCantidad.value = '';
            if (!patron.test(botonCantidad.value)) botonCantidad.value = '';
        });
    });
}
function botonesComanda() {
    const botonesComanda = document.querySelectorAll('#boton-comanda');
    botonesComanda.forEach( botonComanda => {
        botonComanda.addEventListener('click', function() {
            idBoton = botonComanda.dataset.enviarPlato;
            agregarComanda(idBoton);
        });
    });
}
function agregarComanda(id) {
    var carritoPlato = {
        id : '',
        nombre : '',
        cantidad : '',
        precio : '',
        ruta : ''
    }
    carritoPlato.id = id;
    carritoPlato.nombre = document.querySelector(`[data-nombre-plato="${id}"]`).innerText;
    carritoPlato.cantidad = parseInt(document.querySelector(`[data-cantidad-plato="${id}"]`).value);
    carritoPlato.precio = parseInt(document.querySelector(`[data-precio-plato="${id}"]`).innerText);
    carritoPlato.ruta = document.querySelector(`[data-ruta-plato="${id}"]`).src;
    if(carritoPlato.cantidad != 0) {
        evaluarComanda(carritoPlato);
        document.querySelector(`[data-cantidad-plato="${id}"]`).value = 0;
    }
}
function evaluarComanda(objeto) {
    console.log('entrada',objeto);
    console.log('entrada carrito',carrito);
    if(carrito.some( values => values.id == objeto.id)) {
        console.log('El objecto ya existe, actualizamos la cantidad');
        carrito.forEach( item => {
            if(item.id == objeto.id) {
                item.cantidad = item.cantidad + objeto.cantidad;
            }
        });
    } else {
        console.log('El objeto no existe, lo agregamos al carrito');
        carrito.push(objeto);
    }
    mostrarComanda();
}
function mostrarComanda() {

    console.log('Desde mostrarComanda',carrito);
    const resumen = document.querySelector('.objetos-carrito');

    while(resumen.firstChild) {
        resumen.removeChild(resumen.firstChild);
    }
    var totalPrecio = 0;
    carrito.forEach( plato => {
        const { id, nombre, cantidad, precio, ruta } = plato;
        totalPrecio = totalPrecio + precio*cantidad;

        const contenedorPlato = document.createElement('DIV'); //Contenedor principal de los platos
        contenedorPlato.classList.add('contenedor-plato');

            const imagenPlato = document.createElement('DIV');
            imagenPlato.classList.add('contenedor-foto');
            imagenPlato.innerHTML = `
                <img class="foto-plato" src="${ruta}" alt="Imagen ${nombre}"/>
            `;

        contenedorPlato.appendChild(imagenPlato);

            const contenedorInformacion = document.createElement('DIV'); //Contenedor donde va el nombre, el precio, la cantidad y el botón de eliminar
            contenedorInformacion.classList.add('contenedor-informacion');

                const nombreBotonContenedor = document.createElement('DIV');
                nombreBotonContenedor.classList.add('nombre-boton-contenedor');

                    const nombrePlato = document.createElement('P');
                    nombrePlato.classList.add('nombre-plato');
                    nombrePlato.textContent = nombre;

                    const botonEliminar = document.createElement('BUTTON');
                    botonEliminar.classList.add(`boton-${id}`);
                    botonEliminar.textContent = 'X';
                    botonEliminar.addEventListener('click',function() {
                        botonEliminarPlato(id);
                    });
                    nombreBotonContenedor.appendChild(nombrePlato);
                    nombreBotonContenedor.appendChild(botonEliminar);
                
                const cantidadPrecioContenedor = document.createElement('DIV');
                cantidadPrecioContenedor.classList.add('cantidad-precio-contenedor');

                    const cantidadPlato = document.createElement('P');
                    cantidadPlato.classList.add('cantidad-plato');
                    cantidadPlato.textContent = 'Cantidad: ' + cantidad;

                    const precioPlato = document.createElement('P');
                    precioPlato.classList.add('precio-plato');
                    precioPlato.textContent = 'Precio: ' + cantidad*precio + '€';

                    cantidadPrecioContenedor.appendChild(cantidadPlato);
                    cantidadPrecioContenedor.appendChild(precioPlato);

            
            contenedorInformacion.appendChild(nombreBotonContenedor);
            contenedorInformacion.appendChild(cantidadPrecioContenedor);

        contenedorPlato.appendChild(contenedorInformacion);

        resumen.appendChild(contenedorPlato);
    });
    
    const divPrecioTotal = document.querySelector('.precio-total');
        while(divPrecioTotal.firstChild) {
            divPrecioTotal.removeChild(divPrecioTotal.firstChild);
        }
        divPrecioTotal.textContent = totalPrecio + '€';
}

function botonEliminarPlato(id) {
    carrito = carrito.filter( targets => targets.id != id);
    mostrarComanda();
}