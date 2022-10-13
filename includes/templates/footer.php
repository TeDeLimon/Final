<footer class="footer">
    <div>
        <div class="contacto">
            <div>Llámanos</div>
            <div class="contacto__numero">914506050</div>
        </div>
        <div><a class="boton-amarillo" href="/reservas"/>Reserva una mesa</a></div>
    </div>
    <p>Síguenos</p>
    <div class="footer__social">
        <a href="#"><img src="build/img/facebook.png" alt="imagen de "></a>
        <a href="#"><img src="build/img/twitter-sign.png" alt="imagen de "></a>
        <a href="#"><img src="build/img/youtube.png" alt="imagen de "></a>
        <a href="#"><img src="build/img/symbols.png" alt="imagen de "></a>
    </div>
    <div class="footer__developer">
        <p class="copyright">&copy; <?php echo date('Y'); ?> Todos los Derechos Reservados</p>
        <p class="copyright">Diseñado y creado por Luis Villanueva</p>
    </div>
</footer>

<script src="build/js/form.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php if($_SERVER["PATH_INFO"] == '/reservas'):?>
    <script src="build/js/app.js"></script>
<?php endif; ?>
<?php if($_SERVER["PATH_INFO"] == '/comanda'):?>
    <script src="build/js/comanda.js"></script>
<?php endif; ?>
</body>
</html>