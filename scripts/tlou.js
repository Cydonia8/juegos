const abrir_menu = document.querySelector(".abrir-menu")
const menu = document.querySelector("header")
const banner = document.querySelector(".banner")
const audio = new Audio("../media/audio/unbroken.mp3")

abrir_menu.addEventListener("click", ()=>{
    if(menu.classList.contains("mostrar-menu")){
        menu.classList.remove("mostrar-menu")
        abrir_menu.classList.remove("fijar-mostrar-menu")
        menu.style.display="none"
    }else{
        menu.classList.add("mostrar-menu")
        abrir_menu.classList.add("fijar-mostrar-menu")
        menu.style.display="block"
    }
})


banner.addEventListener("mouseenter", ()=>{
    audio.play()
})