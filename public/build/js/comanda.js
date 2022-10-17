let idReserva,idPlato,patron=new RegExp("^[0-9]$"),carrito=[];function seleccionarTipo(){document.querySelectorAll(".tipo-plato").forEach(t=>{t.addEventListener("click",(function(t){mostrarTipo(t.target)}))})}function mostrarTipo(t){const o=t.id;seleccionarPlato(o);document.querySelector(".tipo-plato-activo").classList.remove("tipo-plato-activo");const e=document.querySelector("#"+o);papaNode=e.parentNode,papaNode.classList.add("tipo-plato-activo")}function seleccionarPlato(t){document.querySelectorAll(".platos").forEach(t=>{t.classList.add("oculto"),t.addEventListener("click",(function(o){idPlato=t.dataset.idPlato}))});document.querySelector("."+t).classList.remove("oculto")}function botonMas(){document.querySelectorAll("#boton-mas").forEach(t=>{t.addEventListener("click",(function(){index=t.dataset.masPlato;document.querySelector(`[data-cantidad-plato="${index}"]`).value++}))})}function botonMenos(){document.querySelectorAll("#boton-menos").forEach(t=>{t.addEventListener("click",(function(){index=t.dataset.menosPlato;const o=document.querySelector(`[data-cantidad-plato="${index}"]`);o.value>0&&o.value--}))})}function botonesCantidad(){document.querySelectorAll("#plato-cantidad").forEach(t=>{t.addEventListener("input",(function(){t.value<0&&(t.value=""),patron.test(t.value)||(t.value="")}))})}function botonesComanda(){document.querySelectorAll("#boton-comanda").forEach(t=>{t.addEventListener("click",(function(){idBoton=t.dataset.enviarPlato,agregarComanda(idBoton)}))})}function agregarComanda(t){var o={id:"",nombre:"",cantidad:"",precio:"",ruta:""};o.id=t,o.nombre=document.querySelector(`[data-nombre-plato="${t}"]`).innerText,o.cantidad=parseInt(document.querySelector(`[data-cantidad-plato="${t}"]`).value),o.precio=parseInt(document.querySelector(`[data-precio-plato="${t}"]`).innerText),o.ruta=document.querySelector(`[data-ruta-plato="${t}"]`).src,0!=o.cantidad&&(evaluarComanda(o),document.querySelector(`[data-cantidad-plato="${t}"]`).value=0)}function evaluarComanda(t){carrito.some(o=>o.id==t.id)?(console.log("El objecto ya existe, actualizamos la cantidad"),carrito.forEach(o=>{o.id==t.id&&(o.cantidad=o.cantidad+t.cantidad)})):carrito.push(t),mostrarComanda()}function mostrarComanda(){console.log("Desde mostrarComanda",carrito);const t=document.querySelector(".objetos-carrito");for(;t.firstChild;)t.removeChild(t.firstChild);var o=0;carrito.forEach(e=>{const{id:a,nombre:n,cantidad:c,precio:r,ruta:d}=e;o+=r*c;const i=document.createElement("DIV");i.classList.add("contenedor-plato");const s=document.createElement("DIV");s.classList.add("contenedor-foto"),s.innerHTML=`\n                <img class="foto-plato" src="${d}" alt="Imagen ${n}"/>\n            `,i.appendChild(s);const l=document.createElement("DIV");l.classList.add("contenedor-informacion");const u=document.createElement("DIV");u.classList.add("nombre-boton-contenedor");const m=document.createElement("P");m.classList.add("nombre-plato"),m.textContent=n;const p=document.createElement("BUTTON");p.classList.add("boton-"+a),p.textContent="X",p.addEventListener("click",(function(){botonEliminarPlato(a)})),u.appendChild(m),u.appendChild(p);const f=document.createElement("DIV");f.classList.add("cantidad-precio-contenedor");const v=document.createElement("P");v.classList.add("cantidad-plato"),v.textContent="Cantidad: "+c;const C=document.createElement("P");C.classList.add("precio-plato"),C.textContent="Precio: "+c*r+"€",f.appendChild(v),f.appendChild(C),l.appendChild(u),l.appendChild(f),i.appendChild(l),t.appendChild(i)});const e=document.querySelector(".precio-total");for(;e.firstChild;)e.removeChild(e.firstChild);e.textContent=o+"€";const a=document.querySelector(".cocina");0==carrito.length&&a.classList.add("oculto"),carrito.length>0&&a.classList.remove("oculto")}function botonEliminarPlato(t){carrito=carrito.filter(o=>o.id!=t),mostrarComanda()}function botonCocina(){document.querySelector(".cocina").addEventListener("click",(function(){enviarComanda()}))}async function enviarComanda(){datos=new FormData,datos.append("carrito",JSON.stringify(carrito)),datos.append("reserva",idReserva);try{const t="https://lit-escarpment-69425.herokuapp.com/api/comanda",o=await fetch(t,{method:"POST",body:datos});(await o.json()).resultado&&Swal.fire({position:"center",icon:"success",title:"¡Comanda enviada a cocina!",showConfirmButton:!1,timer:2500}).then(()=>{botonPagar(),carrito=[],mostrarComanda()})}catch(t){console.log("Desde error")}}function botonPagar(){const t=document.querySelector(".pagar");document.querySelector("#pagar");t.classList.remove("oculto")}async function comprobarCarrito(){datosReserva=new FormData,datosReserva.append("reserva",idReserva);try{const t="https://lit-escarpment-69425.herokuapp.com/api/existeComanda",o=await fetch(t,{method:"POST",body:datosReserva});(await o.json()).resultado&&botonPagar()}catch(t){}}document.addEventListener("DOMContentLoaded",(function(){const t=document.querySelector("#idReserva");idReserva=t.value,console.log(idReserva),comprobarCarrito(),botonMas(),botonMenos(),botonesComanda(),botonesCantidad(),botonCocina(),seleccionarTipo()}));
//# sourceMappingURL=comanda.js.map
