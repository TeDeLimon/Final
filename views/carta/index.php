<main class="main">
    <div class="carta">
        <h1>Bienvenido</h1>
        <p>A tu lugar de desconexión, Madrid</p>
        <button class="boton-amarillo"><a href="/reservas">Reserva una mesa</a></button>
    </div>
    <section class="descripcion">
        <h2>Experiencias sin interrupciones</h2>
        <p>Bienvenido a Chilli Mexico, donde ofrecemos una experiencia sin igual. Diviértete deleitándote de una gastronomía vanguardista donde quién marca los tiempos eres tú y nada más que tú.</p>
    </section>
    <section class="grid-carta">
            <div class="banner"></div>
            <div class="banner">
                <p>Ensalada de Guacamole<span class="precio">-10-</span></p>
                <p class="descripcion">Ensalada de aguacate con aliño de lima y aceite oliva superior, acompañado de una bas de berros de nuestro huerto y crujientes de pasta.</p>
            </div>
            <div class="banner"></div>
            <div class="banner">
                <p>Ceviche<span class="precio">-15-</span></p>
                <p class="descripcion">Camarones enfriados y vieiras con jugo de lima y tomate.</p>
            </div>
            <div class="banner"></div>
            <div class="banner">
                <p>Solomillo ahumado con cedro rojo<span class="precio">-55-</span></p>
                <p class="descripcion">320 gr de lomo de res, patatas Yukon, verduras asadas y demi-glaze de la casa.</p>
            </div>
            <div class="banner"></div>
            <div class="banner">
                <p>Lomo de cerdo<span class="precio">-30-</span></p>
                <p class="descripcion">Lomo de Cerdo asado al horno, corte grueso de 340gr, con hueso, con demi-glace de la casa, patatas Golden-Yukon y una pera escalfada con vino de Oporto. </p>
            </div>
            <div class="banner"></div>
            <div class="banner">
                <p>Lubina chilena<span class="precio">-35-</span></p>
                <p class="descripcion">Lubina con inscrustaciones de pecanas, espárragos salteados, patatas al cilantro y salsa de crema de piña.</p>
            </div>
            <div class="banner"></div>
            <div class="banner">
                <p>Crème brûlée<span class="precio">-9-</span></p>
                <p class="descripcion">Elegante crème brûlée de chocolate blanco y Grand Marnier cubierto con azúcar caramelizada.</p>
            </div>
            <div class="banner"></div>
            <div class="banner">
                <p>Pastel de Frambuesa y Chocolate<span class="precio">-9-</span></p>
                <p class="descripcion">Tres capas de chocolate con mermelada de frambuesa coronadas con mini chispas de chocolate.</p>
            </div>
    </section>
    
    <h2 class="carta-completa">Carta Completa</h2>
    <section class="menu-completo">
        <div class="tipo-plato">
            <h2>Entrantes</h2>
            <?php foreach($platos as $plato): ?>
                <?php if($plato->tipo == 'entrante'):?>
                    <div class="nombre-precio">
                        <p><?php echo $plato->nombre;?></p>
                        <p><?php echo $plato->precio;?></p>
                    </div>
                    <p class="descripcion-plato"><?php echo $plato->descripcion;?></p>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <div class="tipo-plato">
            <h2>Principales</h2>
            <?php foreach($platos as $plato): ?>
                <?php if($plato->tipo == 'principal'):?>
                    <div class="nombre-precio">
                        <p><?php echo $plato->nombre;?></p>
                        <p><?php echo $plato->precio;?></p>
                    </div>
                    <p class="descripcion-plato"><?php echo $plato->descripcion;?></p>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <div class="tipo-plato">
            <h2>Postres</h2>
            <?php foreach($platos as $plato): ?>
                <?php if($plato->tipo == 'postre'):?>
                    <div class="nombre-precio">
                        <p><?php echo $plato->nombre;?></p>
                        <p><?php echo $plato->precio;?></p>
                    </div>
                    <p class="descripcion-plato"><?php echo $plato->descripcion;?></p>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <div class="tipo-plato">
            <h2>Bebidas</h2>
            <?php foreach($platos as $plato): ?>
                <?php if($plato->tipo == 'bebida'):?>
                    <div class="nombre-precio">
                        <p><?php echo $plato->nombre;?></p>
                        <p><?php echo $plato->precio;?></p>
                    </div>
                    <p class="descripcion-plato"><?php echo $plato->descripcion;?></p>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </section>
</main>