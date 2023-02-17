"use strict"
//DOM para los filtros y muestra de los productos
const contenedor_productos = document.querySelector(".container-productos");
const contenedor_filtros = document.querySelector(".filtros")
const input_busqueda = document.getElementById("busqueda-nombre")
const input_precio = document.getElementById("precio")
const fecha_inicio = document.getElementById("fecha-inicio")
const fecha_tope = document.getElementById("fecha-tope")
const actualizar_fecha = document.getElementById("actualizar-fecha")

//DOM relacionado con el paginador
const anterior = document.querySelector("#anterior")
const siguiente = document.querySelector("#siguiente")

//DOM relacionado con el carrito
const mostrar_carrito = document.getElementById("abrir-carrito")
const cerrar_carrito = document.getElementById("cerrar-carrito")
const contenedor_carrito = document.querySelector(".contenedor-carrito")
const carrito = document.querySelector(".contenedor-productos-carrito")
const total_carrito = document.querySelector("#total-carrito")
const vaciar_carrito = document.querySelector(".vaciar-carrito")
const finalizar_compra = document.querySelector(".finalizar-compra")
let total_precio = 0

//DOM para el modal de los productos
const modal_productos = document.querySelector(".modal-productos")
const contenido_modal = document.querySelector(".contenido-modal")
const cerrar_modal = document.getElementById("cerrar-modal")

//DOM para mostrar mensajes
const contenedor_mensajes = document.querySelector(".contenedor-mensajes")
const container_animacion = document.querySelector(".container-animacion")

//DOM para estilo vertical
const modo_vertical = document.getElementById("vertical")
const seccion_productos_filtros = document.querySelector(".seccion-productos-filtros")
const container_filtros = document.querySelector(".container-filtros")
const filtros_sticky = document.querySelector(".filtros-sticky")

let lista = []

//Comprobación inicial con localStorage por si el carrito tiene elementos
let recuento_carrito = JSON.parse(localStorage.getItem("carrito") ?? "[]")
//Si los tiene, los imprimimos por pantalla
renderizar(recuento_carrito, carrito, crearProductoCarrito)

//Eventos para el carrito y modal
mostrar_carrito.addEventListener("click", ()=>{
    contenedor_carrito.classList.add("mostrar")
    container_filtros.classList.add("indexcero")
    
})
cerrar_carrito.addEventListener("click", ()=>{
    contenedor_carrito.classList.remove("mostrar")
})
cerrar_modal.addEventListener("click", ()=>{
    modal_productos.classList.remove("mostrar")
})

siguiente.addEventListener("click", cambiarPagina);
anterior.addEventListener("click", cambiarPagina);

function cambiarPagina(eventos){
    container_animacion.classList.add("mostrar-animacion")
    let url = eventos.target.getAttribute("data-link")
    InicializarTienda(url)
    setTimeout(()=>{
        container_animacion.classList.remove("mostrar-animacion")
    },1000)
}



//Sacar fecha actual para el filtro de fechas
const momento_actual = new Date()

const fecha_actual = `${momento_actual.getFullYear()}-${cerosFecha(momento_actual.getMonth()+1)}-${cerosFecha(momento_actual.getDate())}`
fecha_inicio.setAttribute("value", fecha_actual)
fecha_tope.setAttribute("value", fecha_actual) 



//Filtrar productos por nombre
input_busqueda.addEventListener("keyup", ()=>{
    let buscar = input_busqueda.value.trim().toLowerCase()
    let filtro;

    if(buscar===""){
        filtro = [...lista]
    }else{
        filtro = lista.filter(item => item.juego_nombre.toLowerCase().includes(buscar))
    }

    if(filtro.length===0){
        contenedor_productos.classList.add("no-resultados")
        contenedor_productos.innerHTML=`<h2>No hay productos con estas condiciones</h2>
                                        <img id="noprod-foto" src="../media/img_assets/noprod.jpg">`
    }else{
        contenedor_productos.classList.remove("no-resultados")
        renderizar(filtro, contenedor_productos, crearProducto)
    }
})


//Filtrar por fecha
actualizar_fecha.addEventListener("click", ()=>{
    const fecha_inicial = formatoFecha(fecha_inicio.value)
    const fecha_final = formatoFecha(fecha_tope.value)

    let filtro = lista.filter(item => formatoFechaObjeto(item.fecha) >= fecha_inicial && formatoFechaObjeto(item.fecha) <= fecha_final )

    if(filtro.length === 0){
        contenedor_productos.classList.add("no-resultados")
        contenedor_productos.innerHTML=`<h2>No hay productos con estas condiciones</h2>
        <img id="noprod-foto" src="noprod.jpg">`
    }else{
        contenedor_productos.classList.remove("no-resultados")
        renderizar(filtro, contenedor_productos, crearProducto)
    }

})
//Filtrar productos por precio
input_precio.addEventListener("change", ()=>{
    let valor = input_precio.value
    let filtro;

    input_precio.nextElementSibling.innerText=`Filtro máximo de ${valor} €`
    filtro = lista.filter(item => parseFloat(item.precio) <= parseFloat(valor))
    console.log(filtro)

    if(filtro.length===0){
        contenedor_productos.classList.add("no-resultados")
        contenedor_productos.innerHTML=`<h2>No hay productos con estas condiciones</h2>
        <img id="noprod-foto" src="../media/img_assets/noprod.jpg">`
    }else{
        contenedor_productos.classList.remove("no-resultados")
        renderizar(filtro, contenedor_productos, crearProducto)
    }

})

InicializarTienda()

const filtros_sticky_ul = document.querySelector(".filtros > ul")

//Evento para colocar el menú de filtros en posición horizontal
// modo_vertical.addEventListener("click", ()=>{
//     if(!seccion_productos_filtros.classList.contains("vertical")){
//         seccion_productos_filtros.classList.add("vertical")
//         container_filtros.classList.add("vertical")
//         filtros_sticky.classList.add("vertical")
//         filtros_sticky_ul.classList.add("vertical")
//     }else{
//         seccion_productos_filtros.classList.remove("vertical")
//         container_filtros.classList.remove("vertical")
//         filtros_sticky.classList.remove("vertical")
//         filtros_sticky_ul.classList.remove("vertical")
//     }
    
// })

//Colocamos los elementos básicos de la tienda, productos y categorias para filtrar
async function InicializarTienda(url = "../bd/listaProds.php"){
    container_animacion.classList.add("mostrar-animacion")
    setTimeout(()=>{
        container_animacion.classList.remove("mostrar-animacion")
    },1000)
    const respuesta = await fetch(url)
    const datos = await respuesta.json();
    lista = datos["datos"];

    if(datos["next"] == "null"){
        siguiente.style.display="none"
    }else{
        siguiente.setAttribute("data-link", `http://${datos["next"]}`)
        siguiente.style.display="inline"
        
    }

    if(datos["previous"] == "null"){
        anterior.style.display="none"
    }else{
        anterior.setAttribute("data-link", `http://${datos["previous"]}`)
        anterior.style.display="inline"
    }

    //Array con categorías sin repetir
    const plataformas_no_rep = lista.map(item => item.plat).filter((c,i,array)=>array.indexOf(c)===i)
    const lista_plataformas = document.createElement("ul");
    contenedor_filtros.innerHTML=""
    contenedor_filtros.appendChild(lista_plataformas);
    lista_plataformas.innerHTML=`<li class="categoria">Todos</li>`
    plataformas_no_rep.forEach(cate => {
        lista_plataformas.innerHTML+=`<li class="categoria">${cate}</li>`
    })

    renderizar(lista, contenedor_productos, crearProducto)



    //Determinar el precio más alto para ajustar el rango del input
    const precio_mayor = lista.map(item => item.precio).sort((a,b)=>b-a)[0]
    input_precio.setAttribute("max", precio_mayor)


   

    lista_plataformas.addEventListener("click", (evento)=>{
        const pulsado = evento.target

        if(pulsado.matches(".categoria")){
            let filtro;
            contenedor_productos.classList.remove("no-resultados")
            
            if(pulsado.innerText==="Todos"){
                filtro = [...lista]
            }else{
                filtro = lista.filter(item => item.plat===pulsado.innerText)
            }
            renderizar(filtro, contenedor_productos, crearProducto)
        }
    })
    
}

//Funcion para crear el producto en el contenedor principal
function crearProducto(p){
    const producto = document.createElement("article");
    producto.className="producto"
    producto.classList.add("col-12", "col-md-4")
    producto.setAttribute("data-id", p.juego_id)
    producto.innerHTML = `  <div class="foto-producto">
                                <img id="img-prod" class="img-fluid" src="${p.caratula}" alt="">
                            </div>
                            <div class="datos-producto d-flex">
                            <h4>${p.juego_nombre}</h4>
                                <h4>${p.precio} €</h4>
                            </div>`;

    const imagen = producto.querySelector(".foto-producto");
    const img_prod = producto.querySelector("#img-prod")
    // img_prod.addEventListener("mouseenter", (evento)=>{
    //     evento.target.style.transform="scale(1.05)"
    // })
    // img_prod.addEventListener("mouseleave", (evento)=>{
    //     evento.target.style.transform="none"
    // })
    img_prod.addEventListener("click", (evento)=>{
        const padre = evento.currentTarget.parentElement.parentElement;
        const id = padre.getAttribute("data-id");
        contenido_modal.setAttribute("data-product", id)

        const producto_buscado = lista.find(item => item.juego_id === id);
        contenido_modal.innerHTML=`<img src="${producto_buscado.caratula}" alt="">
                                    <h3>${producto_buscado.juego_nombre}</h3>
                                    <h3>${producto_buscado.precio} €</h3>
                                    <h4>ID del producto: ${producto_buscado.juego_id}</h4>
                                    <div>
                                        <button class="añadir-producto">Añadir al carrito</button>
                                        <input id="unidades-añadir" type="number" value="1" min="1">
                                    </div>`;

        modal_productos.classList.add("mostrar")
        const añadir_carrito = contenido_modal.querySelector(".añadir-producto")
        const unidades_añadir = contenido_modal.querySelector("#unidades-añadir")

        añadir_carrito.addEventListener("click", (evento)=>{
            let unidades = unidades_añadir.value;
            //Si se introducen unidades negativas o cero, automáticamente se introducirá únicamente una
            if(unidades <= 0){
                unidades = 1
            }
            const product_id = evento.target.parentElement.parentElement.getAttribute("data-product")
            const producto_buscar = lista.find(item => item.juego_id===product_id)
            //Copia del producto con campo extra cantidad, en el que guardaremos las unidades añadidas
            let prod_campo_cantidad = {...producto_buscar, cantidad:unidades}
            
            //Mediante el filter comprobamos si en el array recuento_carrito había ya algún producto con el id del que se intenta añadir al carrito
            //Si no lo hay, lo añadimos. Si lo hay, significa que es un producto repetido y no lo permitimos
            const repetido = recuento_carrito.filter(item=>item.juego_id===prod_campo_cantidad.id)
            if(repetido.length==0){     
                recuento_carrito.push(prod_campo_cantidad)
                localStorage.setItem("carrito", JSON.stringify(recuento_carrito))

                const producto_creado = crearProductoCarrito(prod_campo_cantidad)
                carrito.appendChild(producto_creado)
                muestraMensaje("Producto añadido correctamente")
            }else{
                muestraMensaje("Este producto ya estaba añadido", "negativo")
            }
        })
    }) 
    return producto
}


//Funcion que crea los productos en el carrito
function crearProductoCarrito(producto){
    const prod_carrito = document.createElement("div")
    prod_carrito.classList.add("producto-carrito")
    prod_carrito.setAttribute("data-product", producto.juego_id)
    prod_carrito.innerHTML = `<img src="${producto.caratula}" alt="">
                        <div class="contenido">
                            <span class="nombre-producto">${producto.juego_nombre}</span>
                            <span class="precio-producto">${producto.precio} €</span>
                            <div class="botones-carrito">
                                    <div><span>Cantidad: </span><span class=\"cantidad-prod\">${producto.cantidad}</span></div> <i id="aumentar-cantidad" class="fa-solid fa-plus"></i> <i id="reducir-cantidad" class="fa-solid fa-minus"></i>
                                <button id="eliminar-producto">
                                    Eliminar <i class="fa-solid fa-xmark"></i>
                                </button>
                            </div>
                        </div>`
    total_precio+=producto.cantidad * producto.precio
    console.log(total_precio)
    actualizarPrecio(total_precio)

    const eliminar = prod_carrito.querySelector("#eliminar-producto")
    const aumentar_cantidad = prod_carrito.querySelector("#aumentar-cantidad")
    const reducir_cantidad = prod_carrito.querySelector("#reducir-cantidad")

    eliminar.addEventListener("click", ()=>{
        total_precio-=producto.cantidad * parseFloat(producto.price)      
        actualizarPrecio(parseFloat(total_precio))
        carrito.removeChild(prod_carrito)
        eliminarProductoLista(recuento_carrito, producto)
    })
    aumentar_cantidad.addEventListener("click", (evento)=>{
        producto["cantidad"]++
        evento.currentTarget.previousElementSibling.children[1].innerText=producto["cantidad"]
        console.log(producto["cantidad"])
        total_precio+=parseFloat(producto["precio"])
        actualizarPrecio(parseFloat(total_precio))
        actualizarLista(recuento_carrito, producto)
    })
    reducir_cantidad.addEventListener("click", (evento)=>{
        producto["cantidad"]--
        total_precio-=parseFloat(producto["precio"])
        actualizarPrecio(parseFloat(total_precio))
        if(producto["cantidad"] != 0){
            evento.currentTarget.previousElementSibling.previousElementSibling.children[1].innerText=producto["cantidad"]
            actualizarLista(recuento_carrito, producto)
        }else{
            eliminarProductoLista(recuento_carrito, producto)
            carrito.removeChild(prod_carrito)
        }
        
    })
    return prod_carrito;    
}
vaciar_carrito.addEventListener("click", ()=>{
    total_precio=0
    vaciarCarro(total_precio)
})
finalizar_compra.addEventListener("click", ()=>{
    if(recuento_carrito.length===0){
        muestraMensaje("No has añadido nada al carrito", "negativo")
    }else{
        muestraMensaje("Enhorabuena por tu compra, máquina. En dos días te llegará un macuto lleno de tazos, por espabilao")
        vaciarCarro(total_precio)
        total_precio=0
    }
})
//Funcion que imprime los productos en un contenedor con una estructura determinada
function renderizar(lista_productos, contenedor_dom, crear_dom){
    contenedor_dom.innerHTML="";
    lista_productos.forEach((item)=>{
        const dom_prod = crear_dom(item)
        contenedor_dom.appendChild(dom_prod)
    })
}

//Funcion que vacia el local storage y el DOM que contiene los articulos añadidos
function vaciarCarro(precio){
    precio = 0
    localStorage.clear()
    recuento_carrito.length=0
    carrito.innerHTML=""
    total_carrito.innerText=`Total: ${precio}€`
}
//Funcion para agregar ceros al mes o dia si hace falta
function cerosFecha(fecha){
    if(fecha < 10){
        return `0${fecha}`
    }else{
        return fecha
    }
}

//Funcion para mostrar la fecha en formato español
function adaptarFecha(fecha){
    let array_fecha = fecha.split("-")
    let fecha_nueva = new Date(array_fecha[0], array_fecha[1]-1, array_fecha[2])
    return `${cerosFecha(fecha_nueva.getDate())}/${cerosFecha(fecha_nueva.getMonth()+1)}/${fecha_nueva.getFullYear()}`
}
//Funcion que transforma la fecha de los inputs a una marca de tiempo para poder compararse
function formatoFecha(fecha){
    let array_fecha = fecha.split("-")
    let fecha_nueva = new Date(array_fecha[0], array_fecha[1]-1, array_fecha[2])
    fecha_nueva.setHours(0,0,0,0)
    
    return fecha_nueva.getTime()
}

//Funcion que transforma la fecha de los objetos a una marca de tiempo para poder compararse
function formatoFechaObjeto(fecha){
    let array_fecha = fecha.split("-")
    let fecha_nueva = new Date(array_fecha[0], array_fecha[1]-1, array_fecha[2])
    fecha_nueva.setHours(0,0,0,0)
    
    return fecha_nueva.getTime()
}

//Funcion que muestra un mensaje por pantalla cada vez que se añade un producto al carrito
function muestraMensaje(mensaje, resultado="success"){
    contenedor_mensajes.innerHTML=`<span>${mensaje}</span>`;
    contenedor_mensajes.classList.add("mostrar-mensaje")
    contenedor_mensajes.classList.add(resultado)
    setTimeout(()=>{
        contenedor_mensajes.innerHTML=""
        contenedor_mensajes.classList.remove("mostrar-mensaje")
        contenedor_mensajes.classList.remove(resultado)
    },2500)
}

//Funcion que, a partir de un precio, lo actualiza en el contenedor correspondiente
function actualizarPrecio(precio){
    precio=Number(precio.toFixed(2))
    total_carrito.innerText=`Total: ${precio}€`
}

//Funcion que actualiza la lista del carrito para cuando se añadan o resten unidades a un producto, así como en el local storage
function actualizarLista(lista, producto){
    let indice = lista.findIndex(item=>item.juego_id===producto.juego_id)
    lista.splice(indice,1, producto)
    localStorage.setItem("carrito", JSON.stringify(lista))
}
//Funcion que elimina un producto de la lista y del local storage si la cantidad llega a 0
function eliminarProductoLista(lista, producto){
    let lista_actualizada = lista.filter(item => item.juego_id !== producto.juego_id)
    localStorage.setItem("carrito", JSON.stringify(lista_actualizada))
}