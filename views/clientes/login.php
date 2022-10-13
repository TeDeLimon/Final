<?php  foreach($errores as $error): ?>
    <p class="alerta error"><?php echo $error; ?></p>
<?php endforeach; ?>
    <div class="formulario"> 
        <h2>Regístrate</h2>
        <form action="/login" method="POST" enctype="multipart/form-data">
            <label>
                Nombre<span>*</span>
            </label>
            <input type="text" name="login[nombre]" required autocomplete="off" placeholder="Tu nombre..."/>
            <label>
                Apellidos<span>*</span>
            </label>
            <input type="text" name="login[apellidos]" required autocomplete="off" placeholder="Tus apellidos..."/>
            <label>
                E-mail<span>*</span>
            </label>
            <input type="email" name="login[email]" required autocomplete="off" placeholder="Tu email..."/>
            <label>
                Teléfono<span>*</span>
            </label>
            <input type="phone" name="login[telefono]" required autocomplete="off" placeholder="Tu número..."/>
            <label>
                Imagen Usuario<span>(opcional)</span>
            </label>
            <input type="file" name="login[ruta]"/>
            <label>
                Contraseña<span>*</span>
            </label>
            <input type="password" name="login[password]" required autocomplete="off" placeholder="Tu contraseña..."/>
            <button type="submit" class="boton-blanco-negro"/>¿Empezamos?</button>
        </form>
    </div> <!-- /form -->