const campo_pass = document.getElementById("ver-pass")
const abrir_menu = document.querySelector(".abrir-menu")
const menu = document.querySelector("header")
const temporales = document.querySelector(".mensajes-temporales");

campo_pass.addEventListener("click", (evento)=>{
    const visible = evento.target.previousElementSibling.getAttribute("type")
    const input = evento.target.previousElementSibling
    if(visible === "text"){
        input.setAttribute("type", "password")
    }else{
        input.setAttribute("type", "text")
    }
})

abrir_menu.addEventListener("click", ()=>{
    if(menu.classList.contains("mostrar-menu")){
        menu.classList.remove("mostrar-menu")
        abrir_menu.classList.remove("fijar-mostrar-menu")
    }else{
        menu.classList.add("mostrar-menu")
        abrir_menu.classList.add("fijar-mostrar-menu")
    }
})

setTimeout(()=>{
    temporales.style.display="none"
},2000)