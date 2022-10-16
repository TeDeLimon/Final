let paso = 1;
let enlaceUsado = false;
const cita = {
    idUsuario: '', //id del usuario que hace la reserva
    idMesa: '1', //número de la mesa
    comensales: '1', //cantidad de comensales
    fecha: '', //fecha de la reserva
    hora: '',
    comentarios: 'Sin comentarios'
};
document.addEventListener('DOMContentLoaded', function() {
    usuario();

    fecha();
    comentarios();
    API();
    buscarPorHoraFechaComensal()
});
function API() {
    const sendAPI = document.querySelector('#sendAPI');
    sendAPI.addEventListener('click', guardarCita);
}
function comentarios() {
    const comentarios = document.querySelector('#comentarios');
    comentarios.addEventListener('input', function () {
        cita.comentarios = comentarios.value;
    });
}
function usuario() {
    const usuario = document.getElementById('id');
    cita.idUsuario = usuario.value;
}
async function consultarAPI() { //Dado que no sabemos el tiempo que demora la consulta debemos usar una función asíncrona
    try {
        const url = 'https://lit-escarpment-69425.herokuapp.com/api/mesas';
        const resultado = await fetch(url); //Esperamos el resultado
        const servicios = await resultado.json();
        await mostrarServicios(servicios);
    } catch(error) {
        console.log(error);
    }
}
function fecha() {
    const fechaInput = document.querySelector('#fecha');
    fechaInput.addEventListener('input', function () {
        if(fechaInput.value != '') {
            const completar = document.querySelector('.completar');
            completar.classList.remove('completar');
        }
    });
}
function buscarPorHoraFechaComensal() {
    const fechaInput = document.querySelector('#fecha');
    const botonesHora = document.querySelectorAll('.hora');
    const botonesComensal = document.querySelectorAll('.comensal');
    comensalSeleccionado = cita.comensales;
    botonesComensal.forEach( botonComensal => {
        botonComensal.addEventListener('click', function (e) {
            const botonComensalAnterior = document.querySelector('.seleccionadoComensal');
            botonComensalAnterior.classList.remove('seleccionadoComensal')
            botonComensal.classList.add('seleccionadoComensal');
            comensalSeleccionado = e.target.innerText;
            cita.comensales = comensalSeleccionado;
        })
    });
    botonesHora.forEach( (boton) =>  {
        boton.addEventListener('click', function (e) {
            botonesHora.forEach( (boton) => {
                boton.classList.remove('seleccionadoFecha');
            });
            boton.classList.add('seleccionadoFecha');
            horaSeleccionada = e.target.innerText;
            if(fechaInput.value != '') {
                cita.fecha = '';
                cita.hora = '';
                cita.idMesa = '';
                nuevoServicio(fechaInput.value, horaSeleccionada);
            }
        });
    });     
}
async function nuevoServicio(fecha, hora) {
    cita.fecha = fecha;
    cita.hora = hora;
    const datos = new FormData();
    datos.append('fecha',fecha);
    datos.append('hora',hora);
    // console.log([...datos]);
    //Petición hacia la API
    try {
        const url = 'https://lit-escarpment-69425.herokuapp.com/api/mesas';

        const respuesta = await fetch(url, { 
            method: 'POST',
            body: datos
        }); //Hacemos el fetch hacia la url y debemos añadir el metodo POST como atributos
        const servicios = await respuesta.json();
        const mesas = document.querySelector('#mesas');
        while(mesas.firstChild) {
            mesas.removeChild(mesas.firstChild);
        }
        await mostrarServicios(servicios);
        
    } catch (error) {
        console.log('desde error');
    }  
}
async function mostrarServicios(servicios) {
    servicios.mesas.forEach(servicio => {
        const{ id, capacidad, estado} = servicio;

        const capacidadMesa = document.createElement('P');
        capacidadMesa.classList.add('capacidad-mesas');
        capacidadMesa.textContent = capacidad;  

        const mesaDiv = document.createElement('DIV');
        mesaDiv.classList.add('mesa');
        mesaDiv.dataset.idServicio = id;

        if(estado == 'reservada')    {
            mesaDiv.classList.add('reservada');
        } else {
            if(capacidad > (parseInt(comensalSeleccionado) + 2)  || capacidad < comensalSeleccionado) {
                mesaDiv.classList.add('reservada');
            }
        }
        // if(comensalSeleccionado > capacidad && comensalSeleccionado % 2 != 0 || capacidad != comensalSeleccionado + 1) mesaDiv.classList.add('reservada');

        mesaDiv.appendChild(capacidadMesa);
        document.querySelector('#mesas').appendChild(mesaDiv);

        mesaDiv.onclick = function() { //Hacemos uso de un callback que es una respuesta a un evento
            seleccionarServicio(servicio);
        };
    });
}
function seleccionarServicio(servicio) {
    const { id } = servicio;
    const { estado } = servicio;
    
    const divMesa = document.querySelector(`[data-id-servicio="${id}"]`);
    if(estado == 'disponible' && !divMesa.classList.contains('seleccionadoMesa') && cita.idMesa == '') {
        divMesa.classList.add('seleccionadoMesa');
        cita.idMesa = id;
    } else if (estado == 'disponible' && cita.idMesa != ''){
        const seleccionada = document.querySelector('.seleccionadoMesa'); 
        seleccionada.classList.remove('seleccionadoMesa');
        divMesa.classList.add('seleccionadoMesa');
        cita.idMesa = id;
    }
    console.log(cita);
}
async function guardarCita() {
    let vacio = false; //Recorremos el objeto para comprobar sí alguna propiedad está vacía
    for(const [key, value] of Object.entries(cita)) {
        if(value == '') vacio = true;
    }
    if(vacio == false && enlaceUsado == false) {
        const datosCita = new FormData();
        datosCita.append('clientes_id',cita.idUsuario);
        datosCita.append('mesas_id',cita.idMesa);
        datosCita.append('comensales',cita.comensales);
        datosCita.append('fecha',cita.fecha);
        datosCita.append('hora',cita.hora);
        datosCita.append('comentarios',htmlEntities(cita.comentarios));
        enlaceUsado = true;
        try {
            const url = 'https://lit-escarpment-69425.herokuapp.com/api/guardar';
    
            const respuesta = await fetch(url, { 
                method: 'POST',
                body: datosCita
            }); //Hacemos el fetch hacia la url y debemos añadir el metodo POST como atributos
            const status = await respuesta.json();
            if(status.resultado) {
                 Swal.fire({
                 position: 'center',
                 icon: 'success',
                 title: 'Reserva confirmada',
                 showConfirmButton: false,
                 timer: 2500
                 }).then( () => {
                    window.location.replace("https://lit-escarpment-69425.herokuapp.com/bookings");
                 });
             }
        } catch (error) {
            console.log('desde error');
        }
    } else {
        Swal.fire('Por favor revisa que todos los campos estén completados o enlace ya usado');
    } 
}

function htmlEntities(str) {
    return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
}
/*
if(respuesta) {
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Se ha creado la resrerva',
                showConfirmButton: false,
                timer: 2500
            }).then( (respuesta) => {
                window.location.reload();
            });
        }

        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Hubo un error al hacer la reserva'
        });

*/