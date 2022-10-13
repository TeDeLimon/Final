<?php  foreach($errores as $error): ?>
    <p class="alerta error"><?php echo $error; ?></p>
<?php endforeach; ?>

<div class="formulario"> 
    <h2>Inicia Sesión</h2>
    <form action="/user" method="POST">
        <label>
            Teléfono<span>*</span>
        </label>
        <input type="text" name="user[telefono]" required autocomplete="off" placeholder="Tu número..."/>
        <label>
            Contraseña<span>*</span>
        </label>
        <input type="password" name="user[password]" required autocomplete="off" placeholder="Tu contraseña..."/>
        <button type="submit" class="boton-blanco-negro"/>¡Vamos allá!</button>
    </form>
</div> <!-- /form -->

<div class="contenedor">
    <a class="enlace" href="/login">¿Aún no tienes cuenta? ¡Lo solucionamos ya!</a>
</div>