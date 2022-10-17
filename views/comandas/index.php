
<main class="contenedor-comanda">
    <a href="#seccion-carrito"><img src="build/img/bill.png"></a>
    <div class="seccion-platos">
        <div class="seccion-tipos-plato">
            <div class="tipos tipo-plato-activo"><img id="entrantes" class="tipo-plato" src="build/img/skewer.png" alt="entrantes"></div>
            <div class="tipos"><img id="principales" class="tipo-plato" src="build/img/main-dish.png" alt="principales"></div>
            <div class="tipos"><img id="postres" class="tipo-plato" src="build/img/cake.png" alt="postres"></div>
            <div class="tipos"><img id="bebidas" class="tipo-plato" src="build/img/cocktail.png" alt="bebidas"></div>
        </div>
        <div class="seccion-comanda">
            <section class="platos entrantes">
                <?php foreach($platos as $plato): ?>
                    <?php if($plato->tipo == 'entrante'): ?>
                        <div class="plato" data-id-plato="<?php echo $plato->id;?>">
                            <div class="plato-datos">
                                <div class="foto-plato"><img data-ruta-plato="<?php echo $plato->id;?>" src="build/img/<?php echo $plato->ruta;?>"></div>
                                <div class="plato-nombre-precio">
                                    <p class="plato-nombre" data-nombre-plato="<?php echo $plato->id;?>">
                                        <?php echo $plato->nombre; ?>
                                    </p>
                                    <p class="plato-precio" data-precio-plato="<?php echo $plato->id;?>">
                                        <?php echo $plato->precio; ?>€
                                    </p>
                                </div>
                                <div class="plato-descripcion" data-descripcion-plato="<?php echo $plato->id;?>">
                                    <?php echo $plato->descripcion; ?>
                                </div>
                            </div>
                            <div class="acciones">
                                <div class="acciones-botones">
                                    <button id="boton-menos" data-menos-plato="<?php echo $plato->id;?>"><img src="build/img/menos.png"></button>
                                    <input type="number" min="0" value="0" name="cantidad" class="plato-cantidad" id="plato-cantidad" data-cantidad-plato="<?php echo $plato->id;?>">
                                    <button id="boton-mas" data-mas-plato="<?php echo $plato->id;?>"><img src="build/img/mas.png"></button>
                                </div>
                                <button id="boton-comanda" data-enviar-plato="<?php echo $plato->id;?>">Añadir a la comanda</button>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </section>
            <section class="platos principales oculto">
                <?php foreach($platos as $plato): ?>
                    <?php if($plato->tipo == 'principal'): ?>
                        <div class="plato" data-id-plato="<?php echo $plato->id;?>">
                            <div class="plato-datos">
                                <div class="foto-plato"><img data-ruta-plato="<?php echo $plato->id;?>" src="build/img/<?php echo $plato->ruta;?>"></div>
                                <div class="plato-nombre-precio">
                                    <p class="plato-nombre" data-nombre-plato="<?php echo $plato->id;?>">
                                        <?php echo $plato->nombre; ?>
                                    </p>
                                    <p class="plato-precio" data-precio-plato="<?php echo $plato->id;?>">
                                        <?php echo $plato->precio; ?>€
                                    </p>
                                </div>
                                <div class="plato-descripcion" data-descripcion-plato="<?php echo $plato->id;?>">
                                    <?php echo $plato->descripcion; ?>
                                </div>
                            </div>
                            <div class="acciones">
                                <div class="acciones-botones">
                                    <button id="boton-menos" data-menos-plato="<?php echo $plato->id;?>"><img src="build/img/menos.png"></button>
                                    <input type="number" min="0" value="0" name="cantidad" class="plato-cantidad" id="plato-cantidad" data-cantidad-plato="<?php echo $plato->id;?>">
                                    <button id="boton-mas" data-mas-plato="<?php echo $plato->id;?>"><img src="build/img/mas.png"></button>
                                </div>
                                <button id="boton-comanda" data-enviar-plato="<?php echo $plato->id;?>">Añadir a la comanda</button>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </section>
            <section class="platos postres oculto">
                <?php foreach($platos as $plato): ?>
                    <?php if($plato->tipo == 'postre'): ?>
                        <div class="plato" data-id-plato="<?php echo $plato->id;?>">
                            <div class="plato-datos">
                                <div class="foto-plato"><img data-ruta-plato="<?php echo $plato->id;?>" src="build/img/<?php echo $plato->ruta;?>"></div>
                                <div class="plato-nombre-precio">
                                    <p class="plato-nombre" data-nombre-plato="<?php echo $plato->id;?>">
                                        <?php echo $plato->nombre; ?>
                                    </p>
                                    <p class="plato-precio" data-precio-plato="<?php echo $plato->id;?>">
                                        <?php echo $plato->precio; ?>€
                                    </p>
                                </div>
                                <div class="plato-descripcion" data-descripcion-plato="<?php echo $plato->id;?>">
                                    <?php echo $plato->descripcion; ?>
                                </div>
                            </div>
                            <div class="acciones">
                                <div class="acciones-botones">
                                    <button id="boton-menos" data-menos-plato="<?php echo $plato->id;?>"><img src="build/img/menos.png"></button>
                                    <input type="number" min="0" value="0" name="cantidad" class="plato-cantidad" id="plato-cantidad" data-cantidad-plato="<?php echo $plato->id;?>">
                                    <button id="boton-mas" data-mas-plato="<?php echo $plato->id;?>"><img src="build/img/mas.png"></button>
                                </div>
                                <button id="boton-comanda" data-enviar-plato="<?php echo $plato->id;?>">Añadir a la comanda</button>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </section>
            <section class="platos bebidas oculto">
                <?php foreach($platos as $plato): ?>
                    <?php if($plato->tipo == 'bebida'): ?>
                        <div class="plato" data-id-plato="<?php echo $plato->id;?>">
                            <div class="plato-datos">
                                <div class="foto-plato"><img data-ruta-plato="<?php echo $plato->id;?>" src="build/img/<?php echo $plato->ruta;?>"></div>
                                <div class="plato-nombre-precio">
                                    <p class="plato-nombre" data-nombre-plato="<?php echo $plato->id;?>">
                                        <?php echo $plato->nombre; ?>
                                    </p>
                                    <p class="plato-precio" data-precio-plato="<?php echo $plato->id;?>">
                                        <?php echo $plato->precio; ?>€
                                    </p>
                                </div>
                                <div class="plato-descripcion" data-descripcion-plato="<?php echo $plato->id;?>">
                                    <?php echo $plato->descripcion; ?>
                                </div>
                            </div>
                            <div class="acciones">
                                <div class="acciones-botones">
                                    <button id="boton-menos" data-menos-plato="<?php echo $plato->id;?>"><img src="build/img/menos.png"></button>
                                    <input type="number" min="0" value="0" name="cantidad" class="plato-cantidad" id="plato-cantidad" data-cantidad-plato="<?php echo $plato->id;?>">
                                    <button id="boton-mas" data-mas-plato="<?php echo $plato->id;?>"><img src="build/img/mas.png"></button>
                                </div>
                                <button id="boton-comanda" data-enviar-plato="<?php echo $plato->id;?>">Añadir a la comanda</button>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </section>
        </div>
    </div>
    <div class="seccion-carrito" id="seccion-carrito">
        <div class="carrito-logo">
            <img src="build/img/comanda.png" alt="imagen carrito">
            <h2>Tu Comanda</h2>
        </div>
        <div class="objetos-carrito">
            
        </div>
        <div class="finalizar-carrito">
            <div class="carrito-total">
                <p class="total">Total:</p>
                <p class="precio-total"></p>
            </div>
        </div>
        <div class="cocina oculto">
            <button class="boton-cocina" id="cocina">Enviar a Cocina</button>
        </div>
        <div class="pagar oculto">
            <h2>Sin presiones, a tu ritmo.</h2>
            <form action="/comandas" method="post">
                <input type="hidden" name="reserva" id="idReserva" value="<?php echo $idReserva;?>">
                <input type="submit" value="pagar" class="boton-pagar" id="pagar"/>
            </form>
        </div>
    </div>
</main>