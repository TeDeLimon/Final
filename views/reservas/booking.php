<main class="reservas">
    <p class="nombre-usuario">Bienvenido <span><?php echo $_SESSION['nombre']." ".$_SESSION['apellidos'];?></span></p>
        <h1>Administrador de tus reservas</h1>
        <ul class="reserva">
            <?php 
                if(!empty($reservas)) {
                    foreach($reservas as $reserva): ?>
                        <li class="cita">
                            <div>Fecha: <span><?php echo date("d-M-Y", strtotime($reserva->fecha)); ?></span></div>
                            <div>Hora: <span><?php echo $reserva->hora; ?></span></div>
                            <div>Comensales: <span><?php echo $reserva->comensales; ?></span></div>
                            <div>Estado: <span><?php echo $reserva->estado; ?></span></div>
                            <div>Comentarios: <span><?php echo $reserva->comentarios; ?></span></div>
                            <div class="acciones">
                                <form method="POST" action="/comanda">
                                    <input type="hidden" name="id_reserva" value="<?php echo $reserva->id; ?>">
                                    <input class="boton-reserva" type="submit" value="¡A comer!">
                                </form>
                                <div class="eliminar">
                                    <form action="/api/eliminar" method="POST" class="w-100">
                                        <input type="hidden" name="clientes_id" value="<?php echo $reserva->clientes_id; ?>">
                                        <input type="hidden" name="mesas_id" value="<?php echo $reserva->mesas_id; ?>">
                                        <input type="hidden" name="fecha" value="<?php echo $reserva->fecha; ?>">
                                        <input type="hidden" name="hora" value="<?php echo $reserva->hora; ?>">
                                        <input type="hidden" name="estado" value="<?php echo $reserva->estado; ?>">
                                        <input type="hidden" name="comensales" value="<?php echo $reserva->comensales; ?>">
                                        <button type="submit" class="boton-eliminar">Cancelar</button>
                                    </form>
                                </div>
                            </div>
                        </li>
                    <?php endforeach;
                } else { ?>
        </ul>
        <p class="no-reserva">Actualmente no tienes ningún reserva realizada.</p>
        <div><a class="boton-negro" href="/reservas"/>¿Por qué no te unes y reservas una mesa?</a></div>
                <?php   }   
            ?>
        
</main>
<p class="gg">¡Disfruta y pásalo bien!</p>