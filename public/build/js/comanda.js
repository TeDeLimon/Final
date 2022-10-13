let idPlato,patron=new RegExp("^[0-9]$"),carrito=[];function seleccionarTipo(){document.querySelectorAll(".tipo-plato").forEach(t=>{t.addEventListener("click",(function(t){mostrarTipo(t.target)}))})}function mostrarTipo(t){const o=t.id;seleccionarPlato(o);document.querySelector(".tipo-plato-activo").classList.remove("tipo-plato-activo");const e=document.querySelector("#"+o);papaNode=e.parentNode,papaNode.classList.add("tipo-plato-activo")}function seleccionarPlato(t){document.querySelectorAll(".platos").forEach(t=>{t.classList.add("oculto"),t.addEventListener("click",(function(o){idPlato=t.dataset.idPlato}))});document.querySelector("."+t).classList.remove("oculto")}function botonMas(){document.querySelectorAll("#boton-mas").forEach(t=>{t.addEventListener("click",(function(){index=t.dataset.masPlato;document.querySelector(`[data-cantidad-plato="${index}"]`).value++}))})}function botonMenos(){document.querySelectorAll("#boton-menos").forEach(t=>{t.addEventListener("click",(function(){index=t.dataset.menosPlato;const o=document.querySelector(`[data-cantidad-plato="${index}"]`);o.value>0&&o.value--}))})}function botonesCantidad(){document.querySelectorAll("#plato-cantidad").forEach(t=>{t.addEventListener("input",(function(){t.value<0&&(t.value=""),patron.test(t.value)||(t.value="")}))})}function botonesComanda(){document.querySelectorAll("#boton-comanda").forEach(t=>{t.addEventListener("click",(function(){idBoton=t.dataset.enviarPlato,agregarComanda(idBoton)}))})}function agregarComanda(t){var o={id:"",nombre:"",cantidad:"",precio:"",ruta:""};o.id=t,o.nombre=document.querySelector(`[data-nombre-plato="${t}"]`).innerText,o.cantidad=parseInt(document.querySelector(`[data-cantidad-plato="${t}"]`).value),o.precio=parseInt(document.querySelector(`[data-precio-plato="${t}"]`).innerText),o.ruta=document.querySelector(`[data-ruta-plato="${t}"]`).src,0!=o.cantidad&&(evaluarComanda(o),document.querySelector(`[data-cantidad-plato="${t}"]`).value=0)}function evaluarComanda(t){console.log("entrada",t),console.log("entrada carrito",carrito),carrito.some(o=>o.id==t.id)?(console.log("El objecto ya existe, actualizamos la cantidad"),carrito.forEach(o=>{o.id==t.id&&(o.cantidad=o.cantidad+t.cantidad)})):(console.log("El objeto no existe, lo agregamos al carrito"),carrito.push(t)),mostrarComanda()}function mostrarComanda(){console.log("Desde mostrarComanda",carrito);const t=document.querySelector(".objetos-carrito");for(;t.firstChild;)t.removeChild(t.firstChild);var o=0;carrito.forEach(e=>{const{id:a,nombre:n,cantidad:c,precio:d,ruta:r}=e;o+=d*c;const i=document.createElement("DIV");i.classList.add("contenedor-plato");const l=document.createElement("DIV");l.classList.add("contenedor-foto"),l.innerHTML=`\n                <img class="foto-plato" src="${r}" alt="Imagen ${n}"/>\n            `,i.appendChild(l);const s=document.createElement("DIV");s.classList.add("contenedor-informacion");const u=document.createElement("DIV");u.classList.add("nombre-boton-contenedor");const m=document.createElement("P");m.classList.add("nombre-plato"),m.textContent=n;const p=document.createElement("BUTTON");p.classList.add("boton-"+a),p.textContent="X",p.addEventListener("click",(function(){botonEliminarPlato(a)})),u.appendChild(m),u.appendChild(p);const f=document.createElement("DIV");f.classList.add("cantidad-precio-contenedor");const C=document.createElement("P");C.classList.add("cantidad-plato"),C.textContent="Cantidad: "+c;const v=document.createElement("P");v.classList.add("precio-plato"),v.textContent="Precio: "+c*d+"€",f.appendChild(C),f.appendChild(v),s.appendChild(u),s.appendChild(f),i.appendChild(s),t.appendChild(i)});const e=document.querySelector(".precio-total");for(;e.firstChild;)e.removeChild(e.firstChild);e.textContent=o+"€"}function botonEliminarPlato(t){carrito=carrito.filter(o=>o.id!=t),mostrarComanda()}document.addEventListener("DOMContentLoaded",(function(){botonMas(),botonMenos(),botonesComanda(),botonesCantidad(),seleccionarTipo();const t=document.querySelector("#idReserva").innerText;console.log(t)}));
//# sourceMappingURL=comanda.js.map
