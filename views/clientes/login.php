<?php  foreach($errores as $error): ?>
    <p class="alerta error"><?php echo $error; ?></p>
<?php endforeach; ?>
    <div class="formulario"> 
        <h2>Regístrate</h2>
        <form action="/login" method="POST" enctype="multipart/form-data">
            <label>
                Nombre<span>*</span>
            </label>
            <input type="text" name="nombre" required autocomplete="off" placeholder="Tu nombre..." value="<?php echo $cliente->nombre;?>"/>
            <label>
                Apellidos<span>*</span>
            </label>
            <input type="text" name="apellidos" required autocomplete="off" placeholder="Tus apellidos..." value="<?php echo $cliente->apellidos;?>"/>
            <label>
                E-mail<span>*</span>
            </label>
            <input type="email" name="email" required autocomplete="off" placeholder="Tu email..." value="<?php echo $cliente->email;?>"/>
            <label>
                Teléfono<span>*</span>
            </label>
            <input type="phone" name="telefono" required autocomplete="off" placeholder="Tu número..." value="<?php echo $cliente->telefono;?>"/>
            <label>
                Contraseña<span>*</span>
            </label>
            <input type="password" name="password" required autocomplete="off" placeholder="Tu contraseña..."/>
            <button type="submit" class="boton-blanco-negro"/>¿Empezamos?</button>
        </form>
    </div> <!-- /form -->