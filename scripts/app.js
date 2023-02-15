"use strict"

const abrir_menu = document.querySelector(".abrir-menu")
const menu = document.querySelector("header")
const temporales = document.querySelector(".mensajes-temporales");
const img_plats = document.querySelectorAll(".img-plats")
const plats = document.querySelectorAll(".plat")

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

img_plats.forEach(img=>{
    img.addEventListener("mouseenter", (evento)=>{
        evento.currentTarget.nextElementSibling.classList.remove("d-lg-none");
    })
    // img.addEventListener("mouseleave", (evento)=>{
    //     evento.currentTarget.nextElementSibling.classList.add("d-lg-none");
    // })
})
plats.forEach(plat=>{
    plat.addEventListener("mouseleave", (evento)=>{
        evento.target.children[1].classList.add("d-lg-none")
    })
})