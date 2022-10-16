<h1>Reservas</h1>

<h2>Buscar Día disponible</h2>
<div class="busqueda ocultar">
    <form class="formulario" method="POST" action="/api/mesas">
        <div class="campo">
            <label for="fecha">Fecha</label>
            <input 
                type="date" 
                name="fecha" 
                id="fecha"
                min="<?php echo date("Y-m-d"); ?>"
                value=""
            />
            <input type="hidden" name="id" id="id" value="<?php echo $_SESSION['id']; ?>">
        </div>
    </form>
</div>

<section class="completar">
    <h2>Indica el número de comensales</h2>
    <div class="comensales ocultar">
        <button class="boton-blanco-negro comensal seleccionadoComensal">
            1
        </button>
        <button class="boton-blanco-negro comensal">
            2
        </button>
        <button class="boton-blanco-negro comensal">
            3
        </button>
        <button class="boton-blanco-negro comensal">
            4
        </button>
        <button class="boton-blanco-negro comensal">
            5
        </button>
        <button class="boton-blanco-negro comensal">
            6
        </button>
        <button class="boton-blanco-negro comensal">
            7
        </button>
        <button class="boton-blanco-negro comensal">
            8
        </button>
    </div>

    <h2>Indica la franja horaria</h2>
    <div class="fechas ocultar">
        <button class="boton-blanco-negro hora seleccionadoFecha">
            13:00
        </button>
        <button class="boton-blanco-negro hora">
            14:00
        </button>
        <button class="boton-blanco-negro hora">
            15:00
        </button>
        <button class="boton-blanco-negro hora">
            16:00
        </button>
        <button class="boton-blanco-negro hora">
            20:00
        </button>
        <button class="boton-blanco-negro hora">
            21:00
        </button>
        <button class="boton-blanco-negro hora">
            22:00
        </button>
        <button class="boton-blanco-negro hora">
            23:00
        </button>
    </div>

    <div id="mesas">
    </div>

    <h2>Sugerencias y comentarios</h2>
    <div class="comentarios">
        <textarea id="comentarios" name="comentarios" placeholder="Por favor sí tiene algún comentario o sugerencia, comuníquenoslo. Muchas gracias."></textarea>
    </div>

    <button class="boton-azul-block" id="sendAPI">Reservar Ahora</button>
</section>


